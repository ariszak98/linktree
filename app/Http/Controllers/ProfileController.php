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
        $profile = $user->profile;
        $links = $user->links()
            ->where('is_active', 1)
            ->latest()
            ->get();

        if ($profile->background_color !== 'white' && $profile->background_color !== 'black') {
            $nav_colors = ['linktree' => '', 'border' => ''];
            $body_colors = ['main_paragraph' => '', 'link_card' => ''];
            $footer_colors = ['border' => '', 'text' => ''];

            $background_color = "bg-" . $profile->background_color . "-500";
            $outer_color = "bg-" . $profile->background_color . "-600";

        } else {

            $nav_colors = ['linktree' => 'text-blue-600', 'border' => 'border-gray-200'];
            $body_colors = ['main_paragraph' => 'text-gray-700', 'link_card' => 'flex items-center justify-center gap-2 w-full rounded-lg border-2 border-dashed border-black bg-white px-6 py-5 font-medium text-gray-800 shadow-sm transition hover:-translate-y-1 hover:shadow-lg hover:text-blue-600'];
            $footer_colors = ['border' => 'border-gray-200', 'text' => 'text-gray-500'];

            $background_color = "bg-" . $profile->background_color;
            $outer_color = "bg-" . $profile->background_color;
        }
        return view('profile.show', ['user' => $user, 'profile' => $profile, 'links' => $links, 'background_color' => $background_color, 'outer_color' => $outer_color]);
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
