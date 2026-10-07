<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau password tidak sesuai.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended('/dashboard');
    }

    public function showRegister(): View
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect('/dashboard');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    
public function showForgotPassword(): \Illuminate\View\View
{
    return view('auth.forgot-password');
}

public function sendOtp(Request $request): \Illuminate\Http\RedirectResponse
{
    $request->validate([
        'email' => ['required', 'email'],
    ]);

    $email = Str::lower(trim($request->email));
    $user = User::where('email', $email)->first();
    $sessionKey = 'password_reset_email';

    if (!$user) {
        session([$sessionKey => $email]);

        return redirect()->route('password.otp')
            ->with('status', 'Jika email terdaftar, kode verifikasi akan dikirim. Periksa kotak masuk dan folder spam.');
    }

    $rateKey = 'password-reset-email:' . $email;

    if (RateLimiter::tooManyAttempts($rateKey, 3)) {
        return back()->withErrors([
            'email' => 'Terlalu banyak permintaan kode. Silakan coba lagi beberapa saat.',
        ])->onlyInput('email');
    }

    RateLimiter::hit($rateKey, 300);

    $otp = (string) random_int(100000, 999999);

    DB::table('password_reset_otps')->where('email', $email)->delete();

    DB::table('password_reset_otps')->insert([
        'email' => $email,
        'otp_hash' => Hash::make($otp),
        'expires_at' => now()->addMinutes(5),
        'attempts' => 0,
        'verified_at' => null,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    try {
        Mail::raw(
            "Halo {$user->name},\n\nKode OTP untuk mengatur ulang password SkillPath kamu adalah: {$otp}\n\nKode berlaku selama 5 menit. Jangan bagikan kode ini kepada siapa pun.\n\nJika kamu tidak meminta reset password, abaikan email ini.",
            function ($message) use ($email) {
                $message->to($email)
                    ->subject('Kode OTP Reset Password - SkillPath');
            }
        );
    } catch (\Throwable $exception) {
        DB::table('password_reset_otps')->where('email', $email)->delete();

        report($exception);

        return back()->withErrors([
            'email' => 'Email belum berhasil dikirim. Periksa konfigurasi email lalu coba lagi.',
        ])->onlyInput('email');
    }

    session([
        $sessionKey => $email,
        'password_reset_verified' => false,
    ]);

    return redirect()->route('password.otp')
        ->with('status', 'Jika email terdaftar, kode verifikasi telah dikirim. Periksa kotak masuk dan folder spam.');
}

public function showVerifyOtp(): \Illuminate\View\View|\Illuminate\Http\RedirectResponse
{
    if (!session('password_reset_email')) {
        return redirect()->route('password.request');
    }

    return view('auth.verify-otp');
}

public function verifyOtp(Request $request): \Illuminate\Http\RedirectResponse
{
    $request->validate([
        'otp' => ['required', 'digits:6'],
    ]);

    $email = session('password_reset_email');

    if (!$email) {
        return redirect()->route('password.request');
    }

    $record = DB::table('password_reset_otps')
        ->where('email', $email)
        ->first();

    if (!$record || $record->verified_at || now()->greaterThanOrEqualTo($record->expires_at)) {
        return back()->withErrors([
            'otp' => 'Kode tidak valid atau sudah kedaluwarsa. Minta kode baru.',
        ]);
    }

    if ($record->attempts >= 5) {
        DB::table('password_reset_otps')->where('email', $email)->delete();

        return redirect()->route('password.request')
            ->withErrors(['email' => 'Batas percobaan OTP tercapai. Silakan minta kode baru.']);
    }

    if (!Hash::check($request->otp, $record->otp_hash)) {
        DB::table('password_reset_otps')
            ->where('email', $email)
            ->increment('attempts');

        return back()->withErrors([
            'otp' => 'Kode OTP salah. Periksa kembali kode yang kamu terima.',
        ]);
    }

    DB::table('password_reset_otps')
        ->where('email', $email)
        ->update([
            'verified_at' => now(),
            'expires_at' => now()->addMinutes(10),
            'updated_at' => now(),
        ]);

    session(['password_reset_verified' => true]);

    return redirect()->route('password.reset');
}

public function showResetPassword(): \Illuminate\View\View|\Illuminate\Http\RedirectResponse
{
    if (!session('password_reset_verified')) {
        return redirect()->route('password.request');
    }

    $record = DB::table('password_reset_otps')
        ->where('email', session('password_reset_email'))
        ->whereNotNull('verified_at')
        ->first();

    if (!$record || now()->greaterThanOrEqualTo($record->expires_at)) {
        return redirect()->route('password.request')
            ->withErrors(['email' => 'Sesi reset password berakhir. Silakan minta OTP baru.']);
    }

    return view('auth.reset-password');
}

public function resetPassword(Request $request): \Illuminate\Http\RedirectResponse
{
    if (!session('password_reset_verified')) {
        return redirect()->route('password.request');
    }

    $request->validate([
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $email = session('password_reset_email');

    $record = DB::table('password_reset_otps')
        ->where('email', $email)
        ->whereNotNull('verified_at')
        ->first();

    if (!$record || now()->greaterThanOrEqualTo($record->expires_at)) {
        session()->forget([
            'password_reset_email',
            'password_reset_verified',
        ]);

        return redirect()->route('password.request')
            ->withErrors(['email' => 'Sesi reset password berakhir. Silakan minta OTP baru.']);
    }

    $user = User::where('email', $email)->first();

    if (!$user) {
        return redirect()->route('password.request');
    }

    $user->password = Hash::make($request->password);
    $user->save();

    DB::table('password_reset_otps')->where('email', $email)->delete();

    session()->forget([
        'password_reset_email',
        'password_reset_verified',
    ]);

    return redirect()->route('login')
        ->with('success', 'Password berhasil diperbarui. Silakan masuk menggunakan password baru.');
}

}