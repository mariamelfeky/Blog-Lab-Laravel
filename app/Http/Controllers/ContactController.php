<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user->contacts()->get());
        
        return view('contacts.index',['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Auth::user());
        // $contacts = Auth::user()->contacts;
        // ,['contacts'=>$contacts]
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        Auth::user()->contacts()->attach($request->id);   // add friend
        $contact = User::find($request->id);       // find your friend, and...
        $contact->contacts()->attach(Auth::id());
        // Auth::user()->contacts()->find($request->id);
        // $user->add_contact($request->id);
            return redirect()->route('contacts.index')->with('success','contact has been added successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        Auth::user()->contacts()->detach($id);   // remove friend
        $friend = User::find($id);       // find your friend, and...
        $friend->contacts()->detach(Auth::id());  // remove yourself, too
        return redirect()->route('contacts.index')->with('delete','contact has been deleted successfully');

    }
}
