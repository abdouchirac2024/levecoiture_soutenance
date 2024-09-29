@extends('layouts.Backend.Admin.main')

@section('title')
Éditer un Client
@endsection

@section('content')
<main>
    <div class="page-content">
        <div class="page-content-wrapper p-xxl-4">
            <div class="card shadow">
                <div class="card-header border-bottom">
                    <h5 class="mb-0">Éditer un Client</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.clients.update', $client) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $client->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $client->phone_number }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection