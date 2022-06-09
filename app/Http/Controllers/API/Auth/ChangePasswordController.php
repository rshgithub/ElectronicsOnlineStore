<?php

namespace App\Http\Controllers\API\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function auth;
use function response;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        $validated = $request->validate(
            [
                'current_password' => 'required',
                'password' => 'required|string|min:8',
            ]
        );

        if(!Hash::check($validated['current_password'],auth()->user()->password)){
            return response()->json(['message' => 'current password is not correct',],404);
        }

        auth()->user()->update(['password' => Hash::make($request->password)]);

    }
}
