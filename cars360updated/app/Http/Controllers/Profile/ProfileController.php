<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function profile() {
        $user = Auth::user();

        return view("panel.profile", [ 'user' => $user ]);
    }

    public function saveProfile(Request $request) {
        $input = $request->input();

        Auth::user()->update($input);

        return back();
        // dd($input);
    }
}
