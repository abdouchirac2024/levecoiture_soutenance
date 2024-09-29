@extends('layouts.Frontend.main')

@section('title', 'Détails de l\'annonce')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2>Détails de l'annonce de covoiturage</h2>
                </div>
                <div class="card-body">
                    <h4 class="mb-3"><i class="bi bi-pin-map"></i> Trajet: {{ $ride->departure }} - {{ $ride->destination }}</h4>
                    <p><strong>Conducteur:</strong> {{ $ride->driver->name }}</p>
                    <p><strong>Description:</strong> {{ $ride->description }}</p>
                    <p><strong>Date de départ:</strong> {{ $ride->departure_time->format('Y-m-d H:i') }}</p>
                    <p><strong>Nombre de places disponibles:</strong> {{ $ride->available_seats }}</p>
                    <p><strong>Prix:</strong> {{ $ride->price }} XAF</p>
                    <p><strong>Contact:</strong> {{ $ride->phone_number }}</p>

                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Retour</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
