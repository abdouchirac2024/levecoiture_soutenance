<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(auth()->user()->isAdmin())
                        <h3 class="font-bold text-lg mb-4">Welcome, Admin {{ auth()->user()->name }}!</h3>
                        <p>As an admin, you can:</p>
                        <ul class="list-disc list-inside mt-2">
                            <li>Manage users</li>
                            <li>Approve driver registrations</li>
                            <li>View system statistics</li>
                            <li>Assist drivers via chat</li>
                        </ul>
                    @elseif(auth()->user()->isDriver())
                        <h3 class="font-bold text-lg mb-4">Welcome, Driver {{ auth()->user()->name }}!</h3>
                        <p>As a driver, you can:</p>
                        <ul class="list-disc list-inside mt-2">
                            <li>Create ride offers</li>
                            <li>Manage your rides</li>
                            <li>Chat with customers</li>
                            <li>Update your profile and vehicle information</li>
                        </ul>
                    @elseif(auth()->user()->isClient())
                        <h3 class="font-bold text-lg mb-4">Welcome, {{ auth()->user()->name }}!</h3>
                        <p>As a client, you can:</p>
                        <ul class="list-disc list-inside mt-2">
                            <li>View available rides</li>
                            <li>Book a ride</li>
                            <li>Chat with drivers</li>
                            <li>Manage your profile</li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>