<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $user = Auth::user()->user_role->role->name;
        //echo $user;
        redirect('/' . $user . '/dashboard');
        //$this->redirectIntended(default: '/' . $user . '/dashboard', navigate: true);
    }
}; ?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="card card-plain mt-8">
        <div class="card-header pb-0 text-left bg-transparent">
            <h3 class="font-weight-black text-dark display-6">LOGIN </h3>
            <p class="mb-0">Welcome to BA-DI : Barangay Digitalization</p>
        </div>
        <div class="card-body">
            <form wire:submit="login">
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input wire:model="form.email" id="email" class="form-control" type="email" name="email" autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('form.email')" class="text-danger mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input wire:model="form.password" id="password" class="form-control" type="password" name="password" autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('form.password')" class="text-danger mt-2" />
                </div>

                {{-- <div class="d-flex align-items-center">
                    <div class="form-check form-check-info text-left mb-0">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="font-weight-normal text-dark mb-0" for="flexCheckDefault">
                            Remember for 14 days
                        </label>
                    </div>
                    <a href="javascript:;" class="text-xs font-weight-bold ms-auto">Forgot password</a>
                </div> --}}
                <div class="text-center">
                    <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">Sign in</button>
                    {{-- <x-primary-button class="btn btn-dark w-100 mt-4 mb-3">
                        {{ __('Log in') }}
                    </x-primary-button> --}}
                </div>
            </form>
        </div>
    </div>
    {{-- <form wire:submit="login">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
    </label>
</div>

<div class="flex items-center justify-end mt-4">
    @if (Route::has('password.request'))
    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}" wire:navigate>
        {{ __('Forgot your password?') }}
    </a>
    @endif

    <x-primary-button class="ms-3">
        {{ __('Log in') }}
    </x-primary-button>
</div>
</form> --}}
</div>