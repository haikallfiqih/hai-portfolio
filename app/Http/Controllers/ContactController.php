<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.bio', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $contact = $request->all();
        // return $contact;

        Contact::create($contact);

        return redirect()->route('admin.bio')->with('success', 'Contact added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request)
    {
        $data = $request->all();

        $id = $data['id'];
        $contact = Contact::findOrFail($id);
    
        $contact->icon = $data['icon'] ?? $contact->icon;
        $contact->description = $data['description'] ?? $contact->description;
    
        $contact->save();
    
        return redirect()->route('admin.bio')->with('success', 'Contact updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact, $id)
    {
        // Delete contact based on id
        // $id = $contact->id;
        Contact::destroy($id);
        
        return redirect()->route('admin.bio')->with('success', 'Contact deleted');
    }
    
}
