<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ride;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    // Dashboard du conducteur : afficher les 3 dernières annonces
    public function index()
    {
        // Récupère les 3 dernières annonces du conducteur authentifié
        $rides = Auth::user()->rides()->latest()->take(3)->get();
        return view('driver.dashboard', compact('rides'));
    }

    // Profil du conducteur
    public function profile()
    {
        return view('driver.profile');
    }

    // Mise à jour du profil
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'required|string|max:20',
        ]);

        $user->update($validatedData);

        return redirect()->route('driver.profile')->with('success', 'Profil mis à jour avec succès');
    }

    // Création d'une nouvelle annonce (formulaire)
    public function createRide()
    {
        if (!Auth::user()->is_approved) {
            return redirect()->route('driver.dashboard')->with('error', 'Votre compte doit être approuvé avant de pouvoir créer des annonces.');
        }
        
        return view('driver.create-ride');
    }

    // Affichage des détails d'une annonce
    public function show(Ride $ride)
    {
        return view('rides.show', compact('ride'));
    }

    // Stockage d'une nouvelle annonce
    public function storeRide(Request $request)
    {
        if (!Auth::user()->is_approved) {
            return redirect()->route('driver.dashboard')->with('error', 'Votre compte doit être approuvé avant de pouvoir créer des annonces.');
        }

        $validatedData = $request->validate([
            'departure' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'departure_time' => 'required|date',
            'available_seats' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'phone_number' => 'required|string|max:20',
        ]);

        Ride::create([
            'driver_id' => Auth::id(),
            'departure' => $validatedData['departure'],
            'destination' => $validatedData['destination'],
            'departure_time' => $validatedData['departure_time'],
            'available_seats' => $validatedData['available_seats'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'phone_number' => $validatedData['phone_number'],
        ]);

        return redirect('/')->with('success', 'Annonce de covoiturage créée avec succès');
    }

    // Édition d'une annonce (formulaire)
    public function editRide(Ride $ride)
    {
        // Vérifie que l'annonce appartient au conducteur connecté
        if ($ride->driver_id != Auth::id()) {
            abort(403, 'Vous n\'êtes pas autorisé à modifier cette annonce.');
        }

        return view('driver.edit-ride', compact('ride'));
    }

    // Mise à jour d'une annonce
    public function updateRide(Request $request, Ride $ride)
    {
        // Vérifie que l'annonce appartient au conducteur connecté
        if ($ride->driver_id != Auth::id()) {
            abort(403, 'Vous n\'êtes pas autorisé à modifier cette annonce.');
        }

        // Valider les nouvelles données
        $validatedData = $request->validate([
            'departure' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'departure_time' => 'required|date',
            'available_seats' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'phone_number' => 'required|string|max:20',
        ]);

        // Mise à jour de l'annonce
        $ride->update($validatedData);

        return redirect()->route('driver.dashboard')->with('success', 'Annonce mise à jour avec succès.');
    }

    // Suppression d'une annonce
    public function deleteRide(Ride $ride)
    {
        // Vérifie que l'annonce appartient au conducteur connecté
        if ($ride->driver_id != Auth::id()) {
            abort(403, 'Vous n\'êtes pas autorisé à supprimer cette annonce.');
        }

        // Suppression de l'annonce
        $ride->delete();

        return redirect()->route('driver.dashboard')->with('success', 'Annonce supprimée avec succès.');
    }

    // Gestion des messages
    public function messages()
    {
        $messages = Message::where('sender_id', Auth::id())
            ->orWhere('recipient_id', Auth::id())
            ->latest()
            ->get();

        return view('driver.messages', compact('messages'));
    }

    // Envoi d'un message
    public function sendMessage(Request $request)
    {
        $validatedData = $request->validate([
            'recipient_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'recipient_id' => $validatedData['recipient_id'],
            'content' => $validatedData['content'],
        ]);

        return redirect()->route('driver.messages')->with('success', 'Message envoyé avec succès');
    }
}
