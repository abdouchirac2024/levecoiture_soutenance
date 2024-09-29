<x-guest-layout>
    <div class="w-full max-w-md mx-auto">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <!-- Étape 1 : Informations de base -->
            <div id="step1">
                <h2 class="text-xl font-bold mb-4">{{ __('Step 1: register') }}</h2>

                <!-- Champ 1: Sélection du rôle (Conducteur ou Client) -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="role">
                        {{ __('Register as') }}
                    </label>
                    <select id="role" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="role" required>
                        <option value="client">{{ __('Client') }}</option>
                        <option value="driver">{{ __('Driver') }}</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2 text-red-500 text-xs italic" />
                </div>

                <!-- Champ 2: Nom -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        {{ __('Name') }}
                    </label>
                    <input id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-xs italic" />
                </div>

                <!-- Champ 3: Prénom -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                        {{ __('First Name') }}
                    </label>
                    <input id="first_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="first_name" :value="old('first_name')" required autocomplete="given-name" />
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2 text-red-500 text-xs italic" />
                </div>

                <!-- Champ 4: Email -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        {{ __('Email') }}
                    </label>
                    <input id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-xs italic" />
                </div>

                <!-- Champ 5: Numéro de téléphone -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone_number">
                        {{ __('Phone Number') }}
                    </label>
                    <input id="phone_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="tel" name="phone_number" :value="old('phone_number')" required autocomplete="tel" />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2 text-red-500 text-xs italic" />
                </div>

                <!-- Champ 6: Date de naissance -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="birth_date">
                        {{ __('Birth Date') }}
                    </label>
                    <input id="birth_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" name="birth_date" :value="old('birth_date')" required />
                    <x-input-error :messages="$errors->get('birth_date')" class="mt-2 text-red-500 text-xs italic" />
                </div>

                <!-- Champ 7: Mot de passe -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        {{ __('Password') }}
                    </label>
                    <input id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-xs italic" />
                </div>

                <!-- Champ 8: Confirmer le mot de passe -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
                        {{ __('Confirm Password') }}
                    </label>
                    <input id="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-xs italic" />
                </div>

                <div class="mt-6">
                    <button type="button" id="nextStep" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Next') }}
                    </button>
                </div>
            </div>

            <!-- Étape 2 : Informations du conducteur -->
            <div id="step2" style="display: none;">
                <h2 class="text-xl font-bold mb-4">{{ __('Step 2: Driver Information') }}</h2>

                <!-- Champs spécifiques au conducteur -->
                <div id="driver-fields">
                    <!-- Carte d'identité nationale (CNI) -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="id_card_number">{{ __('Numéro de CNI') }}</label>
                        <input id="id_card_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="id_card_number" />
                        <x-input-error :messages="$errors->get('id_card_number')" class="mt-2 text-red-500 text-xs italic" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="id_card_front">{{ __('Photo CNI (recto)') }}</label>
                        <input id="id_card_front" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" name="id_card_front" />
                        <x-input-error :messages="$errors->get('id_card_front')" class="mt-2 text-red-500 text-xs italic" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="id_card_back">{{ __('Photo CNI (verso)') }}</label>
                        <input id="id_card_back" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" name="id_card_back" />
                        <x-input-error :messages="$errors->get('id_card_back')" class="mt-2 text-red-500 text-xs italic" />
                    </div>

                    <!-- Informations sur le véhicule -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_registration">{{ __('Immatriculation du véhicule') }}</label>
                        <input id="vehicle_registration" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="vehicle_registration" />
                        <x-input-error :messages="$errors->get('vehicle_registration')" class="mt-2 text-red-500 text-xs italic" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_photo">{{ __('Photo du véhicule') }}</label>
                        <input id="vehicle_photo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" name="vehicle_photo" />
                        <x-input-error :messages="$errors->get('vehicle_photo')" class="mt-2 text-red-500 text-xs italic" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_brand">{{ __('Marque du véhicule') }}</label>
                        <input id="vehicle_brand" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="vehicle_brand" />
                        <x-input-error :messages="$errors->get('vehicle_brand')" class="mt-2 text-red-500 text-xs italic" />
                    </div>
                </div>

                <div class="mt-6 flex justify-between">
                    <button type="button" id="prevStep" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Previous') }}
                    </button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        const roleSelect = document.getElementById('role');
        const step1 = document.getElementById('step1');
        const step2 = document.getElementById('step2');
        const nextStepButton = document.getElementById('nextStep');
        const prevStepButton = document.getElementById('prevStep');
        const driverFields = document.getElementById('driver-fields');

        function showStep(stepNumber) {
            if (stepNumber === 1) {
                step1.style.display = 'block';
                step2.style.display = 'none';
            } else {
                step1.style.display = 'none';
                step2.style.display = 'block';
            }
        }

        function checkStep1Fields() {
            const requiredFields = step1.querySelectorAll('input[required], select[required]');
            for (let field of requiredFields) {
                if (!field.value.trim()) {
                    return false;
                }
            }
            return true;
        }

        nextStepButton.addEventListener('click', function() {
            if (checkStep1Fields()) {
                if (roleSelect.value === 'driver') {
                    showStep(2);
                } else {
                    // Si c'est un client, soumettez le formulaire directement
                    document.querySelector('form').submit();
                }
            } else {
                alert('Veuillez remplir tous les champs obligatoires.');
            }
        });

        prevStepButton.addEventListener('click', function() {
            showStep(1);
        });

        roleSelect.addEventListener('change', function() {
            if (this.value === 'driver') {
                driverFields.style.display = 'block';
            } else {
                driverFields.style.display = 'none';
            }
        });

        // Initialisation
        showStep(1);
        if (roleSelect.value === 'driver') {
            driverFields.style.display = 'block';
        }
    </script>
</x-guest-layout>