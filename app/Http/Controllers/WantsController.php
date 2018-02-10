<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserIntent;
use Redirect;
use Validator;
use Auth;

class WantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Auth::user()->cards()->where('intent', 'want')->get();
        return view('wishlist', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = Auth::user();

      $validator = Validator::make($request->all(),[
        'intent' => 'required',
        'price' => 'required',
        'copies' => 'required'
      ]);

      if($validator->fail()){
        redirect('/')->withErrors($validator);
      }

      else {
        $registo = new UserIntent;

        $registo->price = request('price');
        $registo->intent = request('intent');
        $registo->copies = request('copies');

        $registo->syncWithoutDetaching();
      }
      return redirect('/');

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
        //
    }
}