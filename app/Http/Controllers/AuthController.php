<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login',
        ]);
    }
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // Kullanıcı doğrulaması
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Başarılı giriş durumunda mesajı göster
            Alert::success('Success', 'Login success !');
            return redirect()->intended('/layout');
        } else {
            // Başarısız giriş durumunda mesajı göster
            Alert::error('Error', 'Login failed !');
            return redirect('/login');
        }
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Register',
        ]);
    }

    public function process(Request $request)
    {
        // Form girişlerini doğrula
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'passwordConfirm' => 'required|same:password'
        ]);

        // Şifreyi hashle
        $validated['password'] = Hash::make($request['password']);

        // Kullanıcıyı oluştur
        $user = User::create($validated);

        // Başarılı kayıt durumunda mesajı göster
        Alert::success('Success', 'Register user has been successfully !');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        // Kullanıcıyı çıkış yap
        Auth::logout();

        // Oturumu geçersiz kıl ve yeni token oluştur
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        // Başarılı çıkış durumunda mesajı göster
        Alert::success('Success', 'Log out success !');
        return redirect('/login');
    }
}
