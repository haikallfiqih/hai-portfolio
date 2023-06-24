<?php

namespace App\Http\Controllers;

use App\Models\PortoProfile;
use App\Models\Contact;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BioProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bio = PortoProfile::first();
        $contacts = Contact::all();
        // $bio = PortoProfile::all();
        return view('admin.bio', [
            'bio' => $bio,
            'contacts' => $contacts
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $newdata = $request->all(); 
        $id = $newdata['id'];
        $bio = PortoProfile::find($id);
    
        $image = $request->file('image');
    
        if ($image) {
            $path = $image->store('public/images');
            $newdata['image'] = $path; // Update the image path in the data
    
            // Store the image details directly in the BioProfile model
            $bio->image_path = $image->store('images');
            $bio->image_name = $image->getClientOriginalName();
            $bio->save();
        }
    
        $bio->update($newdata);
        return redirect()->route('admin.bio')->with('success', 'Profile updated');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
