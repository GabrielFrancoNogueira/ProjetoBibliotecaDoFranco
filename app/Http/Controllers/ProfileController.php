<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'sometimes|nullable|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }


    public function destroy(Request $request)
    {
        $user = Auth::user();
        Auth::logout();

        $user->delete();

        return redirect('/')->with('success', 'Account deleted successfully.');
    }
}
