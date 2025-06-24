<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Spatie\Permission\Models\Role;

class GoogleController extends Controller
{
    /**
     * Redirect user ke Google untuk autentikasi.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle callback dari Google setelah autentikasi.
     */
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Cek apakah user sudah ada, jika belum buat
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'password' => bcrypt(Str::random(24)), // password random karena tidak digunakan
            ]
        );

        // Assign role jika belum punya role
        if (!$user->hasAnyRole(['admin', 'customer'])) {
            $user->assignRole('customer'); // role default
        }

        // Login user
        Auth::login($user);

        // Redirect berdasarkan role
        if ($user->hasRole('admin')) {
            return redirect('/admin/page1');
        } elseif ($user->hasRole('customer')) {
            return redirect('/customer/page1');
        }

        // Jika tidak punya role sama sekali
        return redirect('/');
    }
}
