<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" onclick="event.preventDefault(); return false;"
                class="flex items-center mb-6 text-lg font-semibold text-gray-900 dark:text-white">
                Admin Panel {{ env('APP_NAME') }}
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                        @csrf
                        <x-input id="email" label="Email" name="email" type="email" :value="old('email')"
                            required />
                        <x-input id="password" label="Password" name="password" type="password" required />
                        <x-primary-button type="submit" class="w-full">Masuk</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
