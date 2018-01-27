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
class UpdateController extends Controller
{

    public function create(Request $request)
    {
        $user = User::find(1);

        $user->description = $request->description;
        $user->city = $request->city;
        $user->orientation = $request->option;

        Storage::disk('user')->put($request->file, 'Contents');




    }



}