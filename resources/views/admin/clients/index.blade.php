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
                    <a href="{{ route('admin.clients.create') }}" class="btn btn-sm btn-primary mb-0">Ajouter un client</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->phone_number }}</td>
                                    <td>
                                        <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-sm btn-info">Éditer</a>
                                        <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection