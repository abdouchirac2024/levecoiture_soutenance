@extends('layouts.Backend.Driver.main')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header btn btn-primary btn-lg text-white">
                    <h2 class="mb-0">Modifier l'annonce de covoiturage</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('driver.rides.update', $ride) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="departure" class="form-label">Départ</label>
                                    <input type="text" name="departure" id="departure" class="form-control" value="{{ $ride->departure }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="destination" class="form-label">Destination</label>
                                    <input type="text" name="destination" id="destination" class="form-control" value="{{ $ride->destination }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="departure_time" class="form-label">Heure de départ</label>
                                    <input type="datetime-local" name="departure_time" id="departure_time" class="form-control" value="{{ $ride->departure_time->format('Y-m-d\TH:i') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="available_seats" class="form-label">Places disponibles</label>
                                    <input type="number" name="available_seats" id="available_seats" class="form-control" value="{{ $ride->available_seats }}" required min="1">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price" class="form-label">Prix</label>
                                    <div class="input-group">
                                        <span class="input-group-text">XAF</span>
                                        <input type="number" name="price" id="price" class="form-control" value="{{ $ride->price }}" required min="0" step="0.01">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Numéro de téléphone</label>
                                    <input type="tel" name="phone_number" id="phone_number" class="form-control" value="{{ $ride->phone_number }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4">{{ $ride->description }}</textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Mettre à jour l'annonce</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
