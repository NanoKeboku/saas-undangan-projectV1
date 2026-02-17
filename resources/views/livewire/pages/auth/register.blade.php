<div class="min-h-screen flex items-center justify-center p-4 bg-gradient-to-br from-violet-50 via-white to-indigo-50">

    <div class="w-full max-w-md">

        <!-- Header -->
        <div class="text-center mb-8 animate-fade-in-up">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-violet-600 to-indigo-600 shadow-lg mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
            </div>

            <h1 class="text-2xl font-bold">Create an account</h1>
            <p class="text-slate-500 mt-1">Start building amazing invitations today</p>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 p-8 animate-fade-in-up animation-delay-200">

            <form wire:submit.prevent="register" class="space-y-5">
                @error('name')
                    <div class="p-3 text-sm text-red-600 bg-red-50 rounded-lg">{{ $message }}</div>
                @enderror
                @error('email')
                    <div class="p-3 text-sm text-red-600 bg-red-50 rounded-lg">{{ $message }}</div>
                @enderror
                @error('password')
                    <div class="p-3 text-sm text-red-600 bg-red-50 rounded-lg">{{ $message }}</div>
                @enderror

                <x-form.input-text
                    label="Full name"
                    name="name"
                    wire:model="name"
                    placeholder="Nama lengkap"
                    required
                />

                <x-form.input-text
                    label="Email address"
                    name="email"
                    type="email"
                    wire:model="email"
                    placeholder="email@email.com"
                    required
                />

                <x-form.input-password
                    label="Password"
                    name="password"
                    wire:model="password"
                    placeholder="Minimal 8 karakter"
                    required
                />

                <x-form.input-password
                    label="Confirm password"
                    name="password_confirmation"
                    wire:model="password_confirmation"
                    placeholder="Ulangi password"
                    required
                />

                <x-form.checkbox
                    name="terms"
                    wire:model="terms"
                    required
                >
                    <span class="text-sm text-slate-600">
                        Saya setuju dengan
                        <a href="#" class="text-indigo-600 font-semibold">S&K</a>
                        dan
                        <a href="#" class="text-indigo-600 font-semibold">Privacy Policy</a>
                    </span>
                </x-form.checkbox>

                <x-form.button-primary
                    type="submit"
                    :disabled="!$terms"
                    :full-width="true"
                >
                    Create account
                </x-form.button-primary>

            </form>

            <p class="mt-6 text-center text-sm text-slate-600">
                Already have an account?
                <a href="{{ route('login') }}" wire:navigate class="font-bold text-indigo-600">Sign in</a>
            </p>
        </div>

    </div>

</div>
