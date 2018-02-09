<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use JavaScript;

class MyProfileController extends Controller
{
    public function display(){

        $user = User::find(Auth::user()->id);

        JavaScript::put([

           'description' => $user->description,

        ]);


        return view('profile')->with('user', $user);
    }

    public function update(Request $request){

        $user = User::find(Auth::user()->id);

        $user->description = $request->description;

        $user->save();

    }
}
