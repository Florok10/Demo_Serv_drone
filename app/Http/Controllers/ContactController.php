<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'last_name' => "required|string|max:255|regex:^\s*[a-zA-Z0-9éèàê']+\s*$^",
            'first_name' => "required|string|max:255|regex:^\s*[a-zA-Z0-9éèàê']+\s*$^",
            'email' => 'required|string|email|max:255',
            'object' => "required|string|max:255|regex:^\s*[a-zA-Z0-9éèàê'.,]+\s*$^",
            'message' => "required|string|max:600|regex:^\s*[a-zA-Z0-9éèàê'.,]+\s*$^",
            'term' => 'required|accepted',
        ]);

        $contact = new Contact();
        $contact->last_name = addslashes($request->last_name);
        $contact->first_name = addslashes($request->first_name);
        $contact->email = $request->email;
        $contact->object = addslashes($request->object);
        $contact->message = addslashes($request->message);
        $contact->rgpd = true;

        $contact->save();

        session()->flash('msg', 'Votre demande a bien été prise en compte.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
