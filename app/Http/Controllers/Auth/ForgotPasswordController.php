<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{


    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }
    public function submitForgotPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->input('email'),
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        Mail::send('auth.emailforgotPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->input('email'));
            $message->subject('Reset Password');
        });
        return redirect()->back()->with('message', 'we have emailed you reset password link');
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.forgot-password-link', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6',
        ]);
        $password_reset_request = DB::table('password_resets')
            ->where('email', $request->input('email'))
            ->where('token', $request->token)
            ->first();

        if (!$password_reset_request) {
            return back()->with('error', 'Invalid!');
        }

        User::where('email', $request->input('email'))
            ->update(['password' => Hash::make($request->input('password'))]);
        DB::table('password_resets')
            ->where('email', $request->input('email'))
            ->delete();

        return redirect()->route('show-login')->with('message', 'Your password has been changed!');
        // return redirect()->route('role.index');
    }

}
