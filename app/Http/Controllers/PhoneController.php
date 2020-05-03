<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Phone;
use Auth;
use Validator;
use App\Http\Requests\PhoneRequest;
class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        //validation
        // $this->validate($request, [
        //     'phone' => 'required|numeric|unique:phones|regex:/(01)[0-2]{1}[0-9]{8}/',
        // ]);


        // dd(Auth::user());
        // dd($request);
        $phone = new Phone;
        $phone->phone = $request->phone;
        $phone->user_id = Auth::id();
        $phone->save();

        return redirect()->route('home')->with('success','Phone has been added successfully');
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
        return view('phones.edit',['phone'=>Phone::find($id)]);
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
        // $this->authorize('update','App\Phone');
        $phone = Phone::find($id);
        $this->validate($request, [
            'phone' => ['required','numeric','digits:11',
            'regex:/(01)[0-2]{1}[0-9]{8}/',
            Rule::unique('phones')->ignore($phone->id),
            
        ]
        ]);

        
        $phone->phone = $request->phone;
        $phone->user_id = Auth::id();
        $phone->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone = Phone::find($id);
        // $this->validate($request, [
        //     'phone' => ['required','numeric',
        //     'regex:/(01)[0-2]{1}[0-9]{8}/',
        //     Rule::unique('phones')->where(function ($query) {
        //         $query->whereNull('deleted_at');
        //     }),    
        // ]
        // ]);
        $phone->delete();
        return redirect()->route('home');
    }
}
  