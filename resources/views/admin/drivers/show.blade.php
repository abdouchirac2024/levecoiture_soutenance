@extends('layouts.Backend.Admin.main')

@section('title', 'Détails du Conducteur')

@section('content')
<main>
    <div class="page-content">
        <h1>Détails du Conducteur</h1>
        <div class="driver-details">
            <p><strong>Nom :</strong> {{ $driver->name }}</p>
            <p><strong>Email :</strong> {{ $driver->email }}</p>
            <p><strong>Téléphone :</strong> {{ $driver->phone_number }}</p>
            <p><strong>Date de naissance :</strong> {{ $driver->birth_date }}</p>
            <p><strong>Numéro de carte d'identité :</strong> {{ $driver->id_card_number }}</p>
            <p><strong>Numéro de permis de conduire :</strong> {{ $driver->driver_license_number }}</p>
            <p><strong>Marque du véhicule :</strong> {{ $driver->vehicle_brand }}</p>

            <!-- Affichage des images -->
            <div class="images">
                <p><strong>Carte d'identité :</strong></p>
                <img src="{{ $driver->id_card_url }}" alt="Carte d'identité" style="width: 200px; height: auto;">
                
                <p><strong>Permis de conduire :</strong></p>
                <img src="{{ $driver->driver_license_url }}" alt="Permis de conduire" style="width: 200px; height: auto;">
            </div>

            <!-- Boutons Approuver ou Rejeter -->
            <form action="{{ route('admin.approveDriver', $driver->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Approuver</button>
            </form>

            <form action="{{ route('admin.rejectDriver', $driver->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Rejeter</button>
            </form>
        </div>
    </div>
</main>
@endsection
