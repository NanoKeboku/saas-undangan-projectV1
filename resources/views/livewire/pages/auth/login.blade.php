

<div class="min-h-screen flex items-center justify-center p-4 bg-gradient-to-br from-indigo-50 via-white to-purple-50">

    <div class="w-full max-w-md">

        <!-- Logo -->
        <div class="text-center mb-8 animate-fade-in-up">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-indigo-600 shadow-lg shadow-indigo-500/30 mb-4">
                🔐
            </div>

            <h1 class="text-2xl font-bold text-gray-900">Welcome back 👋</h1>
            <p class="text-gray-600 mt-1">Login dulu, jangan ghosting sistem 😌</p>
        </div>

        <!-- Card -->
        <div
            class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl border border-gray-200/60 p-8 animate-fade-in-up animation-delay-200">

            <!-- Google Login -->
            <button type="button" wire:click="handleGoogleLogin"
                class="w-full flex items-center justify-center gap-3 px-6 py-3 text-sm font-semibold text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition shadow-sm">
                Continue with Google
            </button>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
                <div class="relative flex justify-center text-xs uppercase tracking-widest">
                    <span class="px-4 bg-white text-gray-400">or</span>
                </div>
            </div>

            <!-- Form -->
            <form wire:submit.prevent="login" class="space-y-5">

                @error('email')
                    <div class="p-3 text-sm text-red-600 bg-red-50 rounded-lg">
                        {{ $message }}
                    </div>
                @enderror

                <!-- Email -->
                <div class="space-y-1">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest">
                        Email
                    </label>
                    <input type="email" wire:model.lazy="email" autofocus required
                        class="w-full px-5 py-4 bg-slate-50 border-2 border-transparent focus:border-indigo-500 focus:bg-white rounded-2xl text-sm font-semibold transition outline-none"
                        placeholder="email@domain.com">
                </div>

                <!-- Password -->
                <div class="space-y-1" x-data="{ show:false }">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest">
                        Password
                    </label>

                    <div class="relative">
                        <input :type="show ? 'text' : 'password'" wire:model.lazy="password" required
                            class="w-full px-5 py-4 bg-slate-50 border-2 border-transparent focus:border-indigo-500 focus:bg-white rounded-2xl text-sm font-semibold transition outline-none"
                            placeholder="Minimal 8 karakter">

                        <button type="button" @click="show = !show"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-indigo-600">
                            👁️
                        </button>
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit" wire:loading.attr="disabled" wire:target="login"
                    class="w-full py-4 rounded-2xl bg-indigo-600 text-white font-bold hover:bg-indigo-700 transition flex items-center justify-center gap-2">
                    <span wire:loading.remove wire:target="login">Sign In</span>
                    <span wire:loading wire:target="login">Loading...</span>
                </button>

            </form>

            <!-- Register -->
            {{-- <p class="mt-6 text-center text-sm text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" wire:navigate class="font-bold text-indigo-600 hover:text-indigo-500">
                    Daftar sekarang
                </a>
            </p> --}}
        </div>

        <!-- Footer -->
        <p class="mt-8 text-center text-xs text-gray-500">
            By continuing, you agree to our Terms & Privacy Policy.
        </p>
    </div>

</div>
