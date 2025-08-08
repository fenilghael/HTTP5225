<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        try {
            $programs = Course::all();
            return view('courses.index', compact('programs'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load program data: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string'
            ]);

            Course::create([
                'name' => $request->name,
                'description' => $request->description
            ]);

            return redirect()->route('programs.index')->with('success', 'Educational program created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Program creation failed: ' . $e->getMessage())->withInput();
        }
    }

    public function show(Course $course)
    {
        try {
            return view('courses.show', compact('course'));
        } catch (\Exception $e) {
            return redirect()->route('programs.index')->with('error', 'Unable to load program details.');
        }
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string'
            ]);

            $course->update([
                'name' => $request->name,
                'description' => $request->description
            ]);

            return redirect()->route('programs.index')->with('success', 'Program information updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Program update failed: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(Course $course)
    {
        try {
            $course->delete();
            return redirect()->route('programs.index')->with('success', 'Program removed successfully.');
        } catch (\Exception $e) {
            return redirect()->route('programs.index')->with('error', 'Program deletion failed: ' . $e->getMessage());
        }
    }
}
