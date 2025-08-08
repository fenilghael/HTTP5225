<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        try {
            $faculty = Professor::all();
            return view('professors.index', compact('faculty'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load faculty data: ' . $e->getMessage());
        }
    }
}
