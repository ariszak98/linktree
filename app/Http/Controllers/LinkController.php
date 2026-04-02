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
        $links = auth()->user()
            ->links()
            ->orderBy('order', 'asc')
            ->get();
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

        // check if url is social media and get the name of social media
        $ar = ['facebook', 'instagram', 'youtube', 'twitter', 'snapchat', 'x.com', 'shopify', 'tiktok'];
        $found = null;

        foreach ($ar as $word) {
            if (str_contains($url, $word)) {
                $found = $word;
                break;
            }
        }

        if ($found == 'twitter' || $found == 'x.com') {
            $found = 'x';
        }

        // check if this is the first link of this user
        if (auth()->user()->links()->count() == 0) {
            $order = 1;
        } else {
            // find the link with the higher number in the 'order' column
            $lastLink = auth()->user()->links()->orderBy('order', 'desc')->first();
            $order = $lastLink->order + 1;
        }

        Link::create([
            'url' => $attributes['url'],
            'description' => $attributes['description'] ?? '',
            'user_id' => auth()->id(),
            'social' => $found,
            'order' => $order
        ]);

//        (auth()->user()->links()->max('order') + 1),

        return redirect()->route('home');
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
        if( $link->delete() ){
            $this->rearrange();
        }
        return redirect()->route('home');
    }

    public function reorder(HttpRequest $request, Link $link)
    {
        $this->rearrange();

        $direction = $request->input('direction');

        abort_if($link->user_id !== auth()->id(), 403);

        $targetOrder = match ($direction) {
            'up' => $link->order - 1,
            'down' => $link->order + 1,
            default => null,
        };

        if ($targetOrder === null) {
            return redirect()->route('home');
        }

        $swapWith = auth()->user()
            ->links()
            ->where('order', $targetOrder)
            ->first();

        if (! $swapWith) {
            return redirect()->route('home');
        }

        $currentOrder = $link->order;

        $link->order = $swapWith->order;
        $swapWith->order = $currentOrder;

        $link->save();
        $swapWith->save();

        $this->rearrange();

        return redirect()->route('home');
    }

    private function rearrange(): void
    {
        $links = auth()->user()
            ->links()
            ->orderBy('order')
            ->get();

        foreach ($links as $index => $link) {
            $newOrder = $index + 1;

            if ($link->order != $newOrder) {
                $link->order = $newOrder;
                $link->save();
            }
        }
    }
}
