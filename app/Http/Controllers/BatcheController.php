<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\Batche;
use App\Models\Course;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BatcheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $batches = Batche::all();
        return view ('batches.index')->with('batches' , $batches);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $courses = Course::pluck('name' , 'id');
        return view('batches.create' , compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Batche::create($input);
        return redirect('batches')->with('flash_message' , 'Batches Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $batches = Batche::find($id);
        return view('batches.show')->with('batches' , $batches);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $batches = Batche::find($id);
        return view('batches.edit')->with('batches' , $batches);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $batche = Batche::find($id);
        $input = $request->all();
        $batche->update($input);
        return redirect('batches')->with('flash_message' , 'Batches Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Batche::destroy($id);
        return redirect('batches')->with('flash_message' , 'batche deleted');
    }
}
