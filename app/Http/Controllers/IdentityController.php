<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Identitie;
use App\Http\Controllers\Controller;

class IdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add_identity');
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
        $identity = new Identitie;
        $identity->name = $request->name;
        $identity->nrdb_code = $request->nrdb_code;
        $identity->faction = $request->faction;
        $identity->tier = $request->tier;
        $identity->save();
        return view('add_identity');
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

    public function autoPop()
    {
        $cards = file_get_contents('https://netrunnerdb.com/api/2.0/public/cards');
        $cards = json_decode($cards);
        //return ($cards->data);
        foreach ($cards->data as $card)
        {
            if(($card->type_code == "identity") && ($card->pack_code != "draft"))
            {
                echo $card->title;
                echo "<br/>";
                $identity = new Identitie;
                $identity->name = $card->title;
                $identity->nrdb_code = $card->code;
                $identity->faction = $card->side_code;
                $identity->save();
            }
        }

    }
}
