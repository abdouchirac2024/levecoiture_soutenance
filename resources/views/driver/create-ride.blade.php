@extends('layouts.Backend.Driver.main')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header btn btn-primary btn-lg text-white">
                    <h2 class="mb-0">Créer une annonce de covoiturage</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('driver.rides.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="departure" class="form-label">Departure</label>
                                    <input type="text" name="departure" id="departure" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="destination" class="form-label">Destination</label>
                                    <input type="text" name="destination" id="destination" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="departure_time" class="form-label">Departure Time</label>
                                    <input type="datetime-local" name="departure_time" id="departure_time" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="available_seats" class="form-label">Available Seats</label>
                                    <input type="number" name="available_seats" id="available_seats" class="form-control" required min="1">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price" class="form-label">Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" name="price" id="price" class="form-control" required min="0" step="0.01">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input type="tel" name="phone_number" id="phone_number" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Create Announcement</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection