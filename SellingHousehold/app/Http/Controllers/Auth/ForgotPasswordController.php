<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    /**
     * Show the form for requesting a password reset link.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('admin.auth.forgot-password'); // Adjust the path if necessary
    }

    /**
     * Send a password reset link to the given user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function sendResetLinkEmail(Request $request)
    {
        // Validate the email address
        $this->validate($request, [
            'email' => 'required|email|exists:users,email', // Ensure email exists in your users table
        ]);


        // Send the password reset link 

        $response = Password::sendResetLink($request->only('email'));

        // Handle the response
        return $response == Password::RESET_LINK_SENT
            ? back()->with(['status' => trans($response)]) // Success
            : back()->withErrors(['email' => trans($response)]); // Failure
    }
}
