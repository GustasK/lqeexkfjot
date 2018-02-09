<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 24-01-2018
 * Time: 14:13
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;

class UpdateController extends Controller
{

    public function create(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $this->validate($request, [
            'description' => 'required|min:150|max:600',
            'city' => 'required',
            'file' => 'required|max:2000|mimes:png,jpg,jpeg'

        ],[
            'description.required' => 'Please write at least 150 char about yourself.',
            'city.required' => 'Please select a city',
            'file.required' => 'Please select a picture of yourself',
            'file.max' => 'Please select a file with less than 2MB',

        ]);

        $user->description = $request->description;
        $user->city = $request->city;
        $user->orientation = $request->option;

        $request->file('file')->storeAs('/', $request->file->getClientOriginalName(), 'uploads');

        $user->picture = $request->file->getClientOriginalName();

        $user->save();

    }

}