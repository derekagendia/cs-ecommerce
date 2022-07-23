<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo/>
        </x-slot>

        <x-jet-validation-errors class="mb-4"/>

        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissable text-center text-black">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('message') }}.
            </div>
        @endif

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{--            <div class="d-grid gap-2 mb-3">--}}
            {{--                <a href="#"><button class="btn btn-white w-100  border" type="button"><span class="me-2">--}}
            {{--                <img src="{{ asset('assets/img/google.svg') }}" style="height: 20px; width:auto;" alt="">--}}
            {{--              </span>--}}
            {{--                        Connect with Google</button></a>--}}
            {{--            </div>--}}
            <div>
                <x-jet-label for="login" value="{{ __('Email') }}"/>
                <x-jet-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('email')"
                             required autofocus/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}"/>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                             autocomplete="current-password"/>
                <i class="far fa-eye" id="togglePassword"
                   style="margin-left: 369px;cursor: pointer;position: absolute;margin-top: -28px;"></i>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember"/>
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
