@extends('layouts.Frontend.main')

@section('title')
Easy Way
@endsection


@section('content')
<section class="relative flex items-center justify-center min-h-screen bg-center bg-cover"
         style="background-image: url('{{ asset('assets/images/bg/01.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <div class="absolute inset-0 bg-black opacity-60"></div> <!-- Overlay pour un meilleur contraste -->
    <div class="relative w-full max-w-3xl p-8 text-center transition duration-300 ease-in-out transform rounded-lg shadow-lg bg-opacity-80 hover:scale-105">
        <h1 class="mb-6 text-4xl font-bold text-black lg:text-5xl drop-shadow-lg">
            Prêt à partir ?
        </h1>


    </div>
</section>



<!-- Section des annonces -->
<section>
    <div class="container mx-auto">
        <!-- Titre -->
        <div class="mb-4 row">
            <div class="col-12">
                <h4 class="mb-0 text-xl font-semibold">Annonces</h4>
            </div>
        </div>

        <!-- Liste des annonces -->
        <div class="row overflow-x-auto flex-nowrap g-4" style="scroll-snap-type: x mandatory; -webkit-overflow-scrolling: touch;">
            @foreach($rides as $ride)
            <div class="col-sm-6 col-lg-4 col-xl-3 flex-shrink-0" style="scroll-snap-align: start;">
                <div class="p-4 transition-transform duration-300 transform card bg-success bg-opacity-10 h-100 hover:scale-105 hover:shadow-lg hover:cursor-pointer">
                    <div class="p-0 mt-4 card-body">
                        <span class="mb-1 text-gray-700"><i class="bi bi-person"></i> Conducteur: {{ $ride->driver->name }}</span>
                        <h4 class="mb-1 text-gray-900"><i class="bi bi-pin-map"></i> Trajet: {{ $ride->departure }} - {{ $ride->destination }}</h4>
                        <p class="text-gray-600"><i class="bi bi-card-text"></i> Description: {{ Str::limit($ride->description, 50) }}</p>
                        <h6 class="text-gray-800"><i class="bi bi-clock"></i> Départ: {{ $ride->departure_time->format('Y-m-d H:i') }}</h6>
                        <h6 class="text-gray-800"><i class="bi bi-cash"></i> Prix: {{ $ride->price }} XAF</h6>
                        <p class="text-gray-600"><i class="bi bi-telephone"></i> Contact: {{ $ride->phone_number }}</p>

                        <div class="flex items-center justify-between mt-4">
                            <div class="px-3 py-2 border border-2 border-dashed bg-primary bg-opacity-10 border-primary rounded-2">
                                <h5 class="mb-0 text-gray-900">Annonce #{{ $ride->id }}</h5>
                            </div>
                            <a href="{{ route('rides.show', $ride) }}" class="transition-colors duration-300 btn btn-lg btn-white btn-round text-primary hover:bg-primary hover:text-white">
                                <i class="bi bi-arrow-right"></i> Voir détails
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Section des destinations populaires -->
<section class="pt-0 pt-lg-5">
    <div class="container">
        <!-- Titre -->
        <div class="mb-4 row">
            <div class="text-center col-12">
                <h2 class="mb-0">Destinations Populaires</h2>
            </div>
        </div>

        <!-- Liste des destinations -->
        <div class="row g-4">
            <!-- Destination item -->
            <div class="col-sm-6 col-lg-3">
                <div class="overflow-hidden bg-transparent card card-img-scale">
                    <div class="rounded-lg overflow-hidden">
                        <img src="assets/images/category/flight/yaounde.jpg" class="w-full h-48 object-cover" alt="Yaoundé image">
                    </div>
                    <div class="px-2 card-body">
                        <h5 class="card-title"><a href="#" class="stretched-link">Yaoundé</a></h5>
                        <p class="mb-0">Covoiturage quotidien de 8h00 à 18h00</p>
                    </div>
                </div>
            </div>

            <!-- Destination item -->
            <div class="col-sm-6 col-lg-3">
                <div class="overflow-hidden bg-transparent card card-img-scale">
                    <div class="rounded-lg overflow-hidden">
                        <img src="assets/images/category/flight/bafoussan.jpg" class="w-full h-48 object-cover" alt="Bafoussan image">
                    </div>
                    <div class="px-2 card-body">
                        <h5 class="card-title"><a href="#" class="stretched-link">Bafoussan</a></h5>
                        <p class="mb-0">Covoiturage quotidien tous les jours</p>
                    </div>
                </div>
            </div>

            <!-- Destination item -->
            <div class="col-sm-6 col-lg-3">
                <div class="overflow-hidden bg-transparent card card-img-scale">
                    <div class="rounded-lg overflow-hidden">
                        <img src="assets/images/category/flight/foumban.jpeg" class="w-full h-48 object-cover" alt="Foumban image">
                    </div>
                    <div class="px-2 card-body">
                        <h5 class="card-title"><a href="#" class="stretched-link">Foumban</a></h5>
                        <p class="mb-0">Covoiturage disponible de 9h00 à 20h00</p>
                    </div>
                </div>
            </div>

            <!-- Destination item -->
            <div class="col-sm-6 col-lg-3">
                <div class="overflow-hidden bg-transparent card card-img-scale">
                    <div class="rounded-lg overflow-hidden">
                        <img src="assets/images/category/flight/douala.jpg" class="w-full h-48 object-cover" alt="Douala image">
                    </div>
                    <div class="px-2 card-body">
                        <h5 class="card-title"><a href="#" class="stretched-link">Douala</a></h5>
                        <p class="mb-0">Covoiturage disponible de 9h00 à 20h00</p>
                    </div>
                </div>
            </div>
        </div> <!-- Fin des destinations -->
    </div>
</section>

<!-- Section des étapes -->
<section class="pt-0">
    <div class="container">
        <div class="row g-4 g-lg-5 justify-content-center">
            <!-- Étape 1 -->
            <div class="text-center col-sm-6 col-md-4 position-relative">
                <div class="px-4">
                    <img src="assets/images/element/step-1.svg" class="mb-3 w-150px" alt="">
                    <h5>Réserver facilement</h5>
                    <p class="mb-0">Processus simple et rapide pour acheter vos billets</p>
                </div>
            </div>

            <!-- Étape 2 -->
            <div class="text-center col-sm-6 col-md-4">
                <div class="px-4">
                    <img src="assets/images/element/step-2.svg" class="mb-3 w-150px" alt="">
                    <h5>Choisir une destination</h5>
                    <p class="mb-0">Plus de 630 destinations disponibles</p>
                </div>
            </div>

            <!-- Étape 3 -->
            <div class="text-center col-sm-6 col-md-4">
                <div class="px-4">
                    <img src="assets/images/element/step-3.svg" class="mb-3 w-150px" alt="">
                    <h5>Chercher une option</h5>
                    <p class="mb-0">Trouver facilement votre prochain trajet</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
