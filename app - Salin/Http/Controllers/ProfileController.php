<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
<<<<<<< Updated upstream
     *
     * @return \Illuminate\View\View
=======
     */
    public function show(): View
    {
        return view('profile');
    }

    /**
     * Display the user's profile form.
>>>>>>> Stashed changes
     */
    public function show()
    {
        // For now, we'll use the first user since we don't have authentication yet
        $user = User::first();
        
        if (!$user) {
            abort(404, 'User not found');
        }
        
        return view('profile.show', compact('user'));
    }

    /**
     * Show the form for editing the user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        // For now, we'll use the first user since we don't have authentication yet
        $user = User::first();
        
        if (!$user) {
            abort(404, 'User not found');
        }
        
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'nullable|string|max:20',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // For now, we'll update the first user since we don't have authentication yet
        $user = User::first();
        
        if (!$user) {
            abort(404, 'User not found');
        }

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }
            
            // Store new image
            $path = $request->file('profile_image')->store('profile-images', 'public');
            $user->profile_image = $path;
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'] ?? null;
        $user->save();

        return redirect()->route('profile.edit')
            ->with('success', 'Profile updated successfully');
    }
}
