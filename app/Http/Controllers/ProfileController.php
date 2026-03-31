<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $profile = $user->profile();
        $links = $user->links()
            ->where('is_active', 1)
            ->latest()
            ->get();
        return view('profile.show', ['user' => $user, 'profile' => $profile, 'links' => $links]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        return view('profile.edit');
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'description' => ['nullable', 'max:255'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'background_color' => ['nullable', 'string', 'max:15'],
        ]);

        $profile = auth()->user()->profile;

        if ($request->hasFile('avatar')) {

            $avatarPath = $request->file('avatar')->store('avatars', 'public');

            // delete AFTER successful upload
            if ($profile->avatar) {
                Storage::disk('public')->delete($profile->avatar);
            }

            $attributes['avatar'] = $avatarPath;
        }

        $profile->update($attributes);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
