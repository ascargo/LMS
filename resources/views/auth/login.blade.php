<x-guest-layout>
    <section class="min-h-screen bg-soft flex items-center justify-center px-6 py-12">
        <div class="max-w-md w-full bg-accent rounded-2xl shadow-soft p-8 text-primary">

            <!-- 🪶 Logo + tagline -->
            <div class="text-center mb-8">
                <img src="{{ asset('images/logo_dom.png') }}" alt="Domus Libris logo" class="h-20 mx-auto mb-3">
                <h1 class="font-heading text-2xl font-bold text-primary">Welcome back to Domus Libris</h1>
                <p class="text-primary/70 text-sm italic mt-1">Where books find their place</p>
            </div>

            <!-- 🧾 Login form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-primary font-semibold" />
                    <x-text-input id="email" class="block mt-1 w-full bg-white border-primary/30 text-primary rounded-md"
                        type="email" name="email" value="{{ old('email') }}" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-primary font-semibold" />
                    <x-text-input id="password" class="block mt-1 w-full bg-white border-primary/30 text-primary rounded-md"
                        type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                </div>

                <!-- Remember me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-primary text-secondary focus:ring-secondary" name="remember">
                        <span class="ml-2 text-sm text-primary">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a class="text-sm text-secondary hover:text-primary underline" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
                </div>

                <!-- Submit -->
                <div class="flex justify-center">
                    <x-primary-button class="bg-secondary hover:bg-primary hover:text-accent text-white font-heading px-6 py-2 rounded-lg transition">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- 🪴 Footer links -->
            <div class="text-center text-sm text-primary/70 mt-6 space-y-2">
                <p>
                    {{ __("Don’t have an account?") }}
                    <a href="{{ route('register') }}"
                        class="font-semibold text-secondary hover:text-primary transition underline underline-offset-4">
                        {{ __('Register') }}
                    </a>
                </p>
                <p>
                    {{ __("Want to browse as a guest and request access?") }}
                    <a href="{{ route('patron.request') }}"
                        class="font-semibold text-secondary hover:text-primary transition underline underline-offset-4">
                        {{ __('Become a Patron') }}
                    </a>
                </p>
            </div>
        </div>
    </section>
</x-guest-layout>
