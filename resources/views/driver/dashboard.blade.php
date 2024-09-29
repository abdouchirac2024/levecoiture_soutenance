@extends('layouts.Backend.Driver.main')

@section('title')
Driver Dashboard
@endsection

@section('content')
<section class="pt-0">
    <div class="container vstack gap-4">
        <!-- Title START -->
        <div class="row">
            <div class="col-12">
                <h1 class="fs-4 mb-0"><i class="bi bi-house-door fa-fw me-1"></i>Dashboard</h1>
            </div>
        </div>
        <!-- Title END -->

        <!-- Button to create a new ride START -->
        <div class="row mt-4">
            <div class="col-12">
                <a href="{{ route('driver.rides.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-1"></i> Créer une nouvelle annonce
                </a>
            </div>
        </div>
        <!-- Button to create a new ride END -->

        <!-- Display driver's rides START -->
        <div class="row mt-4">
            <div class="col-12">
                <h2>Mes Annonces</h2>
                <div class="row g-4">
                    @foreach($rides as $ride)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $ride->departure }} - {{ $ride->destination }}</h5>
                                <p class="card-text">Départ : {{ $ride->departure_time->format('Y-m-d H:i') }}</p>
                                <p class="card-text">Prix : {{ $ride->price }} XAF</p>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('driver.rides.edit', $ride) }}" class="btn btn-warning">Modifier</a>
                                    <form action="{{ route('driver.rides.delete', $ride) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Display driver's rides END -->

    </div>
</section>
@endsection
