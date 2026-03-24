<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use http\Client\Request;
use Illuminate\Http\Request as HttpRequest;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all links of auth user

        $links = auth()->user()->links()->latest()->get();
        $activeLinksCount = auth()->user()->activeLinksCount();
        $inactiveLinksCount = auth()->user()->inactiveLinksCount();
        return view('links.index', ['links' => $links, 'activeLinksCount' => $activeLinksCount, 'inactiveLinksCount' => $inactiveLinksCount]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HttpRequest $request)
    {
        $url = $request->url;

        if ($url && !preg_match('~^https?://~i', $url)) {
            $url = 'https://' . $url;
        }

        $request->merge([
            'url' => $url,
        ]);

        $attributes = $request->validate([
            'url' => ['required','url','max:255', 'url:http,https'],
            'description' => ['max:255'],
        ]);

        Link::create([
            'url' => $attributes['url'],
            'description' => $attributes['description'] ?? '',
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        return view('links.edit', ['link' => $link]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HttpRequest $request, Link $link)
    {

        $url = $request->url;

        if ($url && !preg_match('~^https?://~i', $url)) {
            $url = 'https://' . $url;
        }

        $request->merge([
            'url' => $url,
        ]);

        $attributes = $request->validate([
            'url' => ['required','url','max:255', 'url:http,https'],
            'description' => ['max:255', 'nullable'],
            'is_active' => ['nullable', 'integer', 'between:0,1'],
        ]);

        $link->update([
            'url' => $attributes['url'],
            'description' => $attributes['description'] ?? '',
            'is_active' => $attributes['is_active'] ?? 0,
        ]);


        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->route('home');
    }
}
