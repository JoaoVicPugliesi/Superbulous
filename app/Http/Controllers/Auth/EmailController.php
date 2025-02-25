<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EmailVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Illuminate\Support\Str;

class EmailController extends Controller
{
    public function notice()
    {
        return Inertia::render('Auth/VerifyEmail', [
            'status' => session('status')
        ]);
    }

    public function send(Request $request)
    {
        $user = $request->user();

        $token = Str::upper(Str::random(6));
        $expiresAt = now()->addMinutes(10);

        EmailVerification::updateOrCreate(
            ['user_id' => $user->id],
            ['token' => $token, 'expires_at' => $expiresAt]
        );

        Mail::raw("Seu código de verificação é: $token", function ($message) use ($user) {
            $message->to($user->email)->subject('Código de Verificação de E-mail');
        });

        return back()->with('status', 'Código de verificação enviado para seu e-mail.');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'token' => 'required|string|size:6',
        ]);

        $verification = EmailVerification::where('token', strtoupper($request->token))->first();

        if (!$verification || $verification->expires_at->isPast()) {
            return back()->withErrors(['token' => 'Código inválido ou expirado.']);
        }

        $user = $verification->user;
        $user->email_verified_at = now();
        $user->save();

        $verification->delete();

        return redirect()->route('dashboard')->with('status', 'Conta verificada com sucesso!');
    }
}
