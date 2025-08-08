<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        try {
            $learners = User::all();
            return view('users.index', compact('learners'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load learner data: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6'
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return redirect()->route('learners.index')->with('success', 'Learner registration completed successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Registration failed: ' . $e->getMessage())->withInput();
        }
    }

    public function show(User $user)
    {
        try {
            return view('users.show', compact('user'));
        } catch (\Exception $e) {
            return redirect()->route('learners.index')->with('error', 'Unable to load learner profile.');
        }
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:6'
            ]);

            $updateData = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            if ($request->password) {
                $updateData['password'] = Hash::make($request->password);
            }

            $user->update($updateData);

            return redirect()->route('learners.index')->with('success', 'Learner information updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Update operation failed: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('learners.index')->with('success', 'Learner record removed successfully.');
        } catch (\Exception $e) {
            return redirect()->route('learners.index')->with('error', 'Deletion failed: ' . $e->getMessage());
        }
    }
} 