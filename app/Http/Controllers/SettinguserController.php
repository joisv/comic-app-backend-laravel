<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class SettinguserController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view('dashboard.settings.index',[
            'title' => 'settings',
            'user' => $user
        ]);
    }
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'nullable|max:255',
            'email' => 'nullable|email|min:3|max:255',
            'image' => 'nullable|image|file|max:1048',
            'oldPassword' => 'nullable',
            'password' => 'nullable|confirmed'
        ];

        $request->validate($rules);

        if($request->password){
        if (!Hash::check($request->oldPassword, $user->password)) {
            return back()->withErrors(['oldPassword' => 'The old password does not match.']);
        }
        $user->password = Hash::make($request->password);
        }

        if($request->name) $user->name = $request->name;
        if($request->email) $user->email = $request->email;
        if($request->file('image')){
            if ($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $path = $request->file('image')->store('profiles-images');
            $user->image = $path;
        }
        $user->save();
        return redirect('/dashboard')->with('succes', 'User updated successfully!');
    }

}
