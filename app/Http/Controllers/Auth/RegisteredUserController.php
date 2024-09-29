<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'first_name' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'phone_number' => ['required', 'string', 'max:255'],
            // Validation spécifique au conducteur
            'id_card_number' => 'nullable|string|max:255',
            'id_card_front' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'id_card_back' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'driver_license_number' => 'nullable|string|max:255',
            'driver_license_front' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'driver_license_back' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'vehicle_registration' => 'nullable|string|max:255',
            'vehicle_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'vehicle_brand' => 'nullable|string|max:255',
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'birth_date' => $request->birth_date,
            'phone_number' => $request->phone_number,
            'role_id' => Role::where('title', $request->role)->first()->id,
            'is_approved' => $request->role === 'client', // Clients approuvés automatiquement
        ];

        // Gérer les fichiers pour les conducteurs
        if ($request->role === 'driver') {
            $userData['id_card_number'] = $request->id_card_number;
            $userData['driver_license_number'] = $request->driver_license_number;
            $userData['vehicle_registration'] = $request->vehicle_registration;
            $userData['vehicle_brand'] = $request->vehicle_brand;

            // Upload des fichiers
            if ($request->hasFile('id_card_front')) {
                $userData['id_card_front'] = $request->file('id_card_front')->store('uploads');
            }
            if ($request->hasFile('id_card_back')) {
                $userData['id_card_back'] = $request->file('id_card_back')->store('uploads');
            }
            if ($request->hasFile('driver_license_front')) {
                $userData['driver_license_front'] = $request->file('driver_license_front')->store('uploads');
            }
            if ($request->hasFile('driver_license_back')) {
                $userData['driver_license_back'] = $request->file('driver_license_back')->store('uploads');
            }
            if ($request->hasFile('vehicle_photo')) {
                $userData['vehicle_photo'] = $request->file('vehicle_photo')->store('uploads');
            }
        }

        $user = User::create($userData);

        event(new Registered($user));

        Auth::login($user);

        // Redirection après enregistrement
        return redirect()->route($user->isDriver() ? 'driver.dashboard' : 'dashboard');
    }
}
