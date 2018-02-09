<?php

namespace App\Http\Controllers;

use App\User;
use Auth;


class SearchController extends Controller
{
    public function get(){

        $user= User::find(Auth::user()->id);

        $userCity = $user->city;

        $users = User::all()->except($user->id)->where('city', $userCity);

        $user->age = date("Y") - date("Y", strtotime($user->dob));



        return view('search')->with('users', $users);

    }
}
