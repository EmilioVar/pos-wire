<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReCAPTCHAController extends Controller
{
    public function show()
    {
        return view('recaptcha.verify');
    }

    public function verify(Request $request)
    {
        $recaptchaToken = $request->input('g-recaptcha-response');

        if (!$recaptchaToken) {
            return redirect()->route('recaptcha.verify')->withErrors('reCAPTCHA verification failed.');
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $recaptchaToken,
        ]);

        $verification = $response->json();

        if (!$verification['success'] || $verification['score'] < 0.5) {
            return redirect()->route('recaptcha.verify')->withErrors('reCAPTCHA verification failed.');
        }

        session(['recaptcha_verified' => true]);

        return to_route('index');
    }
}
