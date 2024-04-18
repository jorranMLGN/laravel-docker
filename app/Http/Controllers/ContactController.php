<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Contact::all();

        if (Auth::check()) {
            $user = Auth::user(); // Get the currently authenticated user
            $role = $user->role; // Get the role of the currently authenticated user
            return view('contacts.index', compact('messages', 'role'));
        } else {
            // Handle the case where no user is authenticated
            // For example, redirect to the login page
            return view('contacts.create', compact('messages'));
        }


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'message' => 'required|string',
        ]);
        Contact::create($request->all());
        return view('contacts.dashboard')
            ->with('success', 'Message sent successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = Contact::find($id);
        return view('contacts.show', compact('message'));
    }

    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

    }

    public function dashboard()
    {

        return view('contacts.dashboard');
    }



    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = Contact::find($id);
        $message->delete();
        return redirect()->route("contacts.index")
            ->with('success', 'message deleted successfully.');
    }
}
