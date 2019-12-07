<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user){
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){

        $this->authorize('update', $user->profile);

        $data= request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => '',
            'image' => '',
        ]);


        if(request('image')){
            $imagepath= request('image')->store('uploads', 'profiles');
            $imageArray=['image'=>$imagepath];
        }
        auth()->user()->profile->update(array_merge($data, $imageArray ?? []));

        return redirect("/profile/{$user->id}");

    }
}
