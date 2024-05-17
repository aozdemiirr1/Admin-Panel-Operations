<?php

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
        
        // Kullanıcıya göre yönlendirme yap
        if(Auth::user()->isAdmin()) { // Örnek olarak, isAdmin() metodu kullanıcı admin mi diye kontrol eder
            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect()->intended('/user/dashboard');
        }
    } else {
        // Başarısız giriş durumunda mesajı göster
        Alert::error('Error', 'Login failed !');
        return redirect('/login');
    }
}

