<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function resetPassword(Request $request) {
        return view('panel.settings.change-password');
    }

    public function resetPasswordAction(Request $request) {
        $input = $request->input();

        dd($input);
    }
}
