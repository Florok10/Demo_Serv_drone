<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserInfoController extends Controller
{
    public function updatePhones(Request $request){

        $request->validate([
            'mobile_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10|unique:App\Models\User,mobile_phone',
            'home_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10|unique:App\Models\User,home_phone',
        ]);

        $id = Auth::user()->id;

        $user = User::findOrFail($id);

        $user->mobile_phone = $request->mobile_phone;
        $user->home_phone = $request->home_phone;

        $user->save();

        return redirect('user/profile');
    }

}
