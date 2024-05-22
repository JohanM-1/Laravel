<?php

namespace App\Http\Controllers;

use App\Models\Studens;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stundents = Studens::all();
        return view('students.index', compact('stundents'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|min:5|max:100',
                'age' => 'required|integer|min:1'
            ]
            );

         Studens::create($request->all());   

         return redirect()->route('students.index');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Studens::findOrFail($id);
        return view('students.edit', compact('student'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required|string|min:5|max:100',
                'age' => 'required|integer|min:1'
            ]
            );

        
        $stundent = Studens::findOrFail($id);
        $stundent->update($request->all()); 
        return redirect()->route('students.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stundent = Studens::findOrFail($id);
        $stundent-> delete();
        return redirect()->route('students.index');
        //
    }
}
