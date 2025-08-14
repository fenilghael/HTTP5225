<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professors = Professor::with('course')->get();
        return view('professors.index', compact('professors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('professors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Professor::create($request->all());

        return redirect()->route('professors.index')->with('success', 'Professor created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Professor $professor)
    {
        $professor->load('course');
        return view('professors.show', compact('professor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Professor $professor)
    {
        return view('professors.edit', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Professor $professor)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $professor->update($request->all());

        return redirect()->route('professors.index')->with('success', 'Professor updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professor $professor)
    {
        if ($professor->course) {
            $professor->course->update(['professor_id' => null]);
        }
        $professor->delete();
        return redirect()->route('professors.index')->with('success', 'Professor deleted successfully!');
    }
}
