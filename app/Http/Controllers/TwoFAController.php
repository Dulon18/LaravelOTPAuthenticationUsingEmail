<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\UserEmailOtp;
use Illuminate\Http\Request;

class TwoFAController extends Controller
{
    public function index()
    {
        return view('2fa');
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'otp'=>'required',
        ]);
  
        $find = UserEmailOtp::where('user_id', auth()->user()->id)
                        ->where('otp', $request->otp)
                        ->where('updated_at', '>=', now()->subMinutes(1))
                        ->first();
  
        if (!is_null($find)) {
            Session::put('user_2fa', auth()->user()->id);
            return redirect()->route('home');
        }
  
        return back()->with('error', 'You entered wrong code.');
    }

    public function resend()
    {
        auth()->user()->generateCode();
  
        return back()->with('success', 'We re-sent to code on your email.');
    }
}
