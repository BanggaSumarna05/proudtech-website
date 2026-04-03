<x-guest-layout>
    <x-auth-session-status class="mb-6 font-bold text-green-600 bg-green-50 p-4 border-[3px] border-green-600 shadow-[4px_4px_0_#16a34a]" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-extrabold uppercase tracking-widest text-black mb-2">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                class="w-full border-[3px] border-black px-4 py-3 bg-gray-50 text-black font-semibold focus:outline-none focus:ring-0 focus:border-[#0033a0] focus:shadow-[4px_4px_0_#0033a0] transition-all">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 font-bold text-xs uppercase" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-extrabold uppercase tracking-widest text-black mb-2">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" 
                class="w-full border-[3px] border-black px-4 py-3 bg-gray-50 text-black font-semibold focus:outline-none focus:ring-0 focus:border-[#0033a0] focus:shadow-[4px_4px_0_#0033a0] transition-all">
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 font-bold text-xs uppercase" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember" class="w-5 h-5 border-[3px] border-black text-[#0033a0] focus:ring-0 focus:ring-offset-0 rounded-none cursor-pointer">
            <label for="remember_me" class="ml-3 text-sm font-bold uppercase tracking-widest text-gray-700 cursor-pointer">
                Tetap Masuk
            </label>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-between gap-6 mt-4">
            @if (Route::has('password.request'))
                <a class="text-xs font-bold text-gray-500 hover:text-[#0033a0] uppercase tracking-widest transition-colors" href="{{ route('password.request') }}">
                    Lupa Password?
                </a>
            @endif

            <button type="submit" class="w-full sm:w-auto bg-[#0033a0] text-white px-8 py-4 text-sm font-extrabold uppercase tracking-widest hover:bg-black transition-colors border-[3px] border-transparent hover:border-black shadow-[4px_4px_0_#000] hover:shadow-none hover:translate-x-1 hover:translate-y-1">
                Akses Sekarang
            </button>
        </div>
    </form>
</x-guest-layout>
