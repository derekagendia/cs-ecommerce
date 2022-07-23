<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $input)
    {
        $image = $input->file('avatar');
        Auth::user()->update([
            'name' => isset($input['name']) && !is_null($input['name']) ? $input['name'] : auth()->user()->name,
            'email' => isset($input['email']) && !is_null($input['email']) ? $input['email'] : auth()->user()->email,
            'phone' => isset($input['phone']) && !is_null($input['phone']) ? $input['phone'] : auth()->user()->phone,
            'avatar' => isset($input['avatar']) ? $image->storeAs('users/', $image->getClientOriginalName(), 'public') : auth()->user()->avatar,
        ]);

        return back();
    }

    public function updatePassword(Request $input)
    {

        if (! isset($input['current_password']) || ! Hash::check($input['current_password'], auth()->user()->password)) {
            session()->flash('message', 'The provided password does not match your current password');
            return back();
        }

        Auth::user()->update([
            'password' =>  Hash::make($input['password']),
        ]);

        session()->flash('message', 'The password has successfully updated');
        return back();
    }
}
