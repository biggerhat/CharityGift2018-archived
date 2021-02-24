<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pick;
use App\Identitie;

class PickController extends Controller
{
    public function getIndex()
    {
        return view('make_picks');
    }

    public function keyIndex()
    {
        $pairings = Pick::orderBy('picker_name','ASC')->get();
        return view('make_key',compact('pairings'));
    }

    public function createKey(request $request)
    {
        $pick = new Pick;
        $pick->key = sha1(time());
        $pick->picker_name = $request->picker_name;
        $pick->save();
        $pairings = Pick::orderBy('picker_name','ASC')->get();
        return view('make_key',compact('pairings'));
    }

    public function pickIndex()
    {
        $identities = Identitie::where('picked','!=','1')->orderBy('tier','ASC')->orderBy('name','ASC')->get();
        return view('make_picks', compact('identities'));
    }

    public function pickCreate(request $request)
    {
        $keycheck = Pick::where('key','=',$request->key)->count();
        $identities = Identitie::where('picked','!=','1')->orderBy('tier','ASC')->orderBy('name','ASC')->get();
        if ($keycheck == 1)
        {
            $picker = Pick::where('key','=',$request->key)->first();
            $pick_corp = Identitie::findorFail($request->pick_corp);
            $pick_runn = Identitie::findorFail($request->pick_runn);
            if (($pick_corp->tier == '1') && ($pick_runn->tier == '1'))
            {
                $flash = "You Selected Two Tier 1 ID's. Please Select Only 1.";
                return view('make_picks', compact('flash','identities'));
            }
            elseif (($pick_corp->picked == '1') || ($pick_runn->picked == '1'))
            {
                $flash = "Someone has already chosen one or more of those identities. Please pick again.";
                return view('make_picks', compact('flash','identities'));
            }
            elseif (($picker->pick_corp != '') || ($picker->pick_runn != ''))
            {
                $flash = "You've already chosen your ID's.";
                return view('make_picks', compact('flash','identities'));
            }
            else {
                $picker->team_name = filter_var( $request->team_name, FILTER_SANITIZE_STRING);
                $picker->pick_corp = $pick_corp->name;
                $picker->pick_runn = $pick_runn->name;
                $picker->save();
                $pick_corp->picked = '1';
                $pick_corp->save();
                $pick_runn->picked = '1';
                $pick_runn->save();
                $flash = "Congratulations! You have made your pairings for Charity Gift 2018!";
                return view('make_picks', compact('flash','identities'));
            }
        } else {
            $flash = "The Key You Provided is Invalid";
            return view('make_picks', compact('flash','identities'));
        }

    }
}
