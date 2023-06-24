<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialMedia = SocialMedia::all();
        return view('admin.social-media', [
            'socialMedia' => $socialMedia
        ]);
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
    public function store(Request $request)
    {
        $socialmedia = $request->all();
        // return $socialmedia;

        SocialMedia::create($socialmedia);

        return redirect()->route('admin.social.media')->with('success', 'Account added');
    }

    /**
     * Display the specified resource.
     */
    public function show(SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialMedia $socialMedia)
    {
        $data = $request->all();

        $id = $data['id'];
        $socialmedia = SocialMedia::findOrFail($id);
    
        $socialmedia->icon = $data['icon'] ?? $socialmedia->icon;
        $socialmedia->name = $data['name'] ?? $socialmedia->name;
        $socialmedia->url = $data['url'] ?? $socialmedia->url;
    
        $socialmedia->save();
    
        return redirect()->route('admin.social.media')->with('success', 'Account updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialMedia $socialMedia, $id)
    {
        // $socialmedia = SocialMedia::findOrFail($id);
        // $socialmedia->delete();

        SocialMedia::destroy($id);

        return redirect()->route('admin.social.media')->with('success', 'Account deleted');
    }
}
