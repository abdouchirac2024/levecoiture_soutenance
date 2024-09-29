@extends('layouts.Backend.Admin.main')

@section('title')
Détails du Conducteur
@endsection

@section('content')
<main>
    <div class="page-content">
        <div class="page-content-wrapper p-xxl-4">
            <div class="card shadow">
                <div class="card-header border-bottom d-sm-flex justify-content-between align-items-center">
                    <h5 class="mb-3">Détails du Conducteur: {{ $driver->full_name }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Informations Personnelles</h6>
                            <p><strong>Nom:</strong> {{ $driver->name }}</p>
                            <p><strong>Prénom:</strong> {{ $driver->first_name }}</p>
                            <p><strong>Email:</strong> {{ $driver->email }}</p>
                            <p><strong>Téléphone:</strong> {{ $driver->phone_number }}</p>
                            <p><strong>Date de naissance:</strong> {{ $driver->birth_date }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Informations du Véhicule</h6>
                            <p><strong>Marque:</strong> {{ $driver->vehicle_brand }}</p>
                            <p><strong>Immatriculation:</strong> {{ $driver->vehicle_registration }}</p>
                            @if($driver->vehicle_photo)
                                <img src="{{ asset('storage/' . $driver->vehicle_photo) }}" alt="Photo du véhicule" class="img-fluid mb-3">
                            @endif
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h6>Documents d'Identité</h6>
                            <p><strong>Numéro de CNI:</strong> {{ $driver->id_card_number }}</p>
                            @if($driver->id_card_front)
                                <img src="{{ asset('storage/' . $driver->id_card_front) }}" alt="CNI Recto" class="img-fluid mb-3">
                            @endif
                            @if($driver->id_card_back)
                                <img src="{{ asset('storage/' . $driver->id_card_back) }}" alt="CNI Verso" class="img-fluid mb-3">
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h6>Permis de Conduire</h6>
                            <p><strong>Numéro de permis:</strong> {{ $driver->driver_license_number }}</p>
                            @if($driver->driver_license_front)
                                <img src="{{ asset('storage/' . $driver->driver_license_front) }}" alt="Permis Recto" class="img-fluid mb-3">
                            @endif
                            @if($driver->driver_license_back)
                                <img src="{{ asset('storage/' . $driver->driver_license_back) }}" alt="Permis Verso" class="img-fluid mb-3">
                            @endif
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-success" onclick="approveDriver({{ $driver->id }})">Approuver</button>
                        <button class="btn btn-danger" onclick="rejectDriver({{ $driver->id }})">Rejeter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
function approveDriver(driverId) {
    if (confirm('Êtes-vous sûr de vouloir approuver ce conducteur ?')) {
        fetch(`/admin/drivers/approve/${driverId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        }).then(response => response.json())
          .then(data => {
              if (data.status === 'approved') {
                  alert('Conducteur approuvé avec succès.');
                  window.location.href = '{{ route("admin.drivers") }}';
              }
          }).catch(error => console.error('Erreur:', error));
    }
}

function rejectDriver(driverId) {
    if (confirm('Êtes-vous sûr de vouloir rejeter ce conducteur ? Cette action est irréversible.')) {
        fetch(`/admin/drivers/reject/${driverId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        }).then(response => response.json())
          .then(data => {
              if (data.status === 'deleted') {
                  alert('Conducteur rejeté et supprimé avec succès.');
                  window.location.href = '{{ route("admin.drivers") }}';
              }
          }).catch(error => console.error('Erreur:', error));
    }
}
</script>
@endsection