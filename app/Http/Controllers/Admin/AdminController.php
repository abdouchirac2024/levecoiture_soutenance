<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Méthode pour afficher le tableau de bord
    public function index()
    {
        return view('admin.dashboard');
    }

    // Méthode pour récupérer et afficher la liste des conducteurs non approuvés
    public function drivers()
    {
        $drivers = User::whereHas('role', function ($query) {
            $query->where('title', 'driver');
        })->where('is_approved', false)->get();
        return view('admin.drivers.list', compact('drivers'));
    }

    // Méthode pour afficher les détails d'un conducteur
    public function viewDriverDetails($id)
    {
        $driver = User::findOrFail($id);
        return view('admin.drivers.details', compact('driver'));
    }

    // Méthode pour approuver un conducteur
    public function approveDriver($id)
    {
        $driver = User::findOrFail($id);
        $driver->is_approved = true;
        $driver->save();
        return response()->json(['status' => 'approved', 'message' => 'Conducteur approuvé avec succès.']);
    }

    // Méthode pour rejeter un conducteur
    public function rejectDriver($id)
    {
        $driver = User::findOrFail($id);
        $driver->delete();
        return response()->json(['status' => 'deleted', 'message' => 'Conducteur rejeté et supprimé avec succès.']);
    }

    // ... (autres méthodes existantes)
}