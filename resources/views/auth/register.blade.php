<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nama -->
        <div>
            <label for="name">Nama</label>
            <input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <label for="email">Email</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" required />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password">Password</label>
            <input id="password" class="block mt-1 w-full"
                   type="password"
                   name="password"
                   required autocomplete="new-password" />
        </div>

        <!-- Konfirmasi Password -->
        <div class="mt-4">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input id="password_confirmation" class="block mt-1 w-full"
                   type="password"
                   name="password_confirmation"
                   required />
        </div>

        <!-- Role (hidden) -->
        <input type="hidden" name="role" value="peserta">

        <!-- Tombol Register -->
        <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Register
            </button>
        </div>
    </form>
</x-guest-layout>
