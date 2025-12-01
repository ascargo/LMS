<x-guest-layout>
    <section class="min-h-screen bg-soft flex items-center justify-center px-6 py-12">
        <div class="max-w-md w-full bg-accent rounded-2xl shadow-soft p-8 text-primary">

            <!-- 🪶 Logo + tagline -->
            <div class="text-center mb-8">
                <img src="{{ asset('images/logo_dom.png') }}" alt="Domus Libris logo" class="h-20 mx-auto mb-3">
                <h1 class="font-heading text-2xl font-bold text-primary">Crea tu cuenta en Domus Libris</h1>
                <p class="text-primary/70 text-sm italic mt-1">Para gestionar tu biblioteca y tus patrons</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-primary font-semibold" />
                    <x-text-input id="name" class="block mt-1 w-full bg-white border-primary/30 text-primary rounded-md"
                        type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-primary font-semibold" />
                    <x-text-input id="email" class="block mt-1 w-full bg-white border-primary/30 text-primary rounded-md"
                        type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-primary font-semibold" />
                    <x-text-input id="password" class="block mt-1 w-full bg-white border-primary/30 text-primary rounded-md"
                        type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-primary font-semibold" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full bg-white border-primary/30 text-primary rounded-md"
                        type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 pt-2">
                    <a class="text-sm text-secondary hover:text-primary underline underline-offset-4"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="bg-secondary hover:bg-primary hover:text-accent text-white font-heading px-6 py-2 rounded-lg transition">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </section>
</x-guest-layout>
