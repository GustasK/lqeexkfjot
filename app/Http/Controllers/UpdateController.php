<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 24-01-2018
 * Time: 14:13
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;



use App\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Auth;
class UpdateController extends Controller
{

    public function create(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $this->validate($request, [
            'description' => 'required|min:150|max:600',
            'city' => 'required',
            'file' => 'required|mimes:jpeg,png,jpg|max:2048|'

        ],[
            'description.required' => 'Please write at least 150 char about yourself.',
            'city.required' => 'Please select a city',
            'file.required' => 'Please select a picture of yourself',
            'file.max' => 'Please select a file with less than 2MB',

        ]);

        $user->description = $request->description;
        $user->city = $request->city;
        $user->orientation = $request->option;

        Storage::disk('user')->put($request->file, 'Contents');

        $user->picture = $request->file;

        $user->save();


    }


}