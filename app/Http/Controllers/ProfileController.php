<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
{
    // Validate incoming request data
    $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        'address' => ['nullable', 'string', 'max:255'],
        'gender' => ['nullable', 'in:male,female'],
        'phone_number' => ['nullable', 'string', 'regex:/^\+62\s?8\d{2,3}[-\s]?\d{3,4}[-\s]?\d{3,4}$/']
    ]);

    $user = $request->user();

    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if ($user->image) {
            Storage::delete('public/images/' . $user->image);
        }

        // Store new image in the public/images directory
        $path = $request->file('image')->store('public/images');
        $validatedData['image'] = basename($path);
    }

    // Update user information
    $user->fill($validatedData);

    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();

    return Redirect::route('profile.edit')->with('status', 'profile-updated');
}



    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Delete the user's image if it exists
        if ($user->image) {
            Storage::delete($user->image);
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}