@extends('layouts.Backend.Admin.main')

@section('title')
Liste des Conducteurs en Attente d'Approbation
@endsection

@section('content')
<main>
    <div class="page-content">
        <div class="page-content-wrapper p-xxl-4">
            <div class="card shadow">
                <div class="card-header border-b d-sm-flex justify-between items-center">
                    <h5 class="mb-3">Liste des Conducteurs en Attente d'Approbation</h5>
                </div>
                <div class="card-body">
                    <!-- Ajout du conteneur avec scroll en utilisant Tailwind CSS -->
                    <div class="overflow-y-auto max-h-96">
                        <table class="table-auto w-full text-left">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2">Nom Complet</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Téléphone</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($drivers as $driver)
                                <tr id="driver-{{ $driver->id }}" class="border-b">
                                    <td class="px-4 py-2">{{ $driver->full_name }}</td>
                                    <td class="px-4 py-2">{{ $driver->email }}</td>
                                    <td class="px-4 py-2">{{ $driver->phone_number }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('admin.drivers.details', $driver->id) }}" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm">
                                            Voir Détails
                                        </a>
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
