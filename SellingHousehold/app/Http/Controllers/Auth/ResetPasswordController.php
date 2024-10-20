<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Support\Facades\Password; // Import the Password facade

class ResetPasswordController extends Controller
{
    use CanResetPassword; // Use the correct trait

    protected $redirectTo = '/admin/dashboard'; // Redirect to your dashboard after reset

    protected function sendResetResponse(Request $request, $response)
    {
        return redirect()->route('admin.login')->with('status', trans($response));
    }

    // Method to show the password reset form
    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.auth.reset-password')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    // Method to reset the password
    public function reset(Request $request)
    {
        // Validate the request
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8', // You can adjust validation rules
        ]);

        // Attempt to reset the password
        $response = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();
        });

        // Redirect based on the outcome
        if ($response == Password::PASSWORD_RESET) {
            return $this->sendResetResponse($request, $response);
        }

        return back()->withErrors(['email' => trans($response)]);
    }
}
