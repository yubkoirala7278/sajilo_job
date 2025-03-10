<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    public function verify(Request $request)
    {
        // Check if the URL is invalid due to an expired or tampered signature
        if (!URL::hasValidSignature($request)) {
            return redirect()->route('email.link.expire');
        }
        $user = $request->user();
        if ($user->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }
        return redirect($this->redirectPath())->with('verified', true);
    }

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
