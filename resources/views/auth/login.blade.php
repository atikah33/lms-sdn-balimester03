<x-guest-layout>
    <div class="mb-4 text-center">
        <h2 class="text-3xl font-bold text-gray-900">
            <i class="bi bi-book-fill text-blue-600"></i> LMS SD
        </h2>
        <p class="mt-2 text-sm text-gray-600">Silakan login untuk melanjutkan</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Demo Credentials -->
    <div class="mt-6 p-4 bg-gray-50 border border-gray-200 rounded-lg">
        <p class="text-xs font-semibold text-gray-700 mb-2">Demo Login:</p>
        <div class="space-y-1 text-xs text-gray-600">
            <div><strong>Admin:</strong> admin@lms.com / password</div>
            <div><strong>Guru:</strong> siti@lms.com / password</div>
            <div><strong>Siswa:</strong> ahmad@siswa.com / password</div>
        </div>
    </div>
</x-guest-layout>