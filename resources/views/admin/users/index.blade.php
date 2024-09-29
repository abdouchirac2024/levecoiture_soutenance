@extends('layouts.Backend.Admin.main')

@section('title')
    Liste des Clients
@endsection

@section('content')
<main>
    <div class="page-content">
        <div class="page-content-wrapper p-xxl-4">
            <div class="card shadow">
                <div class="card-header border-bottom d-sm-flex justify-content-between align-items-center">
                    <h5 class="mb-3">Liste des Clients</h5>
                </div>
                <div class="card-body">
                    @if($clients->isEmpty())
                        <p>Aucun client trouvé.</p>
                    @else
                        @foreach($clients as $client)
                        <div class="row align-items-center border-bottom px-2 py-4">
                            <div class="col">{{ $client->name }}</div>
                            <div class="col">{{ $client->email }}</div>
                            <div class="col">{{ $client->phone_number }}</div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
