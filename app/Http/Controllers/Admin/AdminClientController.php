<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminClientController extends Controller
{
    public function index()
    {
        $clients = User::where('role_id', 3)->get();
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string|max:20',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'role_id' => 3, // Client role
        ]);

        return redirect()->route('admin.clients.index')->with('success', 'Client créé avec succès.');
    }

    public function edit(User $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, User $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $client->id,
            'phone_number' => 'required|string|max:20',
        ]);

        $client->update($request->only(['name', 'email', 'phone_number']));

        return redirect()->route('admin.clients.index')->with('success', 'Client mis à jour avec succès.');
    }

    public function destroy(User $client)
    {
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', 'Client supprimé avec succès.');
    }
}