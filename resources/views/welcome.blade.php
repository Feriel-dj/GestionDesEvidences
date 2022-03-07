<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <base href="{{\URL::to('/')}}">

       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
       <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
       <link rel="stylesheet" href="dist/css/adminlte.min.css">
    </head>

    <x-guest-layout>
        <x-jet-authentication-card>
            <x-slot name="logo">  
            </x-slot>
        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <div class="mb-4 font-medium text-lg text-black-600">
          <b><h1  class="border-b text-white"  align="center" font-size="900">Se connecter</h1></b>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mt-2">
                <x-jet-label for="email" value="{{ __('E-mail') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Entrez votre email" required  />
            </div>

            <div class="mt-2">
                <x-jet-label for="password" value="{{ __('Mot de passe') }}" />
                <x-jet-input id="password" class="block mt-1 w-full"  type="password" name="password"   autocomplete="current-password" placeholder="Entrez votre mot de passe" required/>
            </div>

            <div class="block mt-2">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-100">{{ __('Se souvenir de moi') }}</span>
                </label>
            </div>

            @endif
            <div class="block mt-2">
            <x-jet-button class="flex-shrink-0 flex items-center justify-center mt-1 w-full">
                {{ __("S'identifier") }}
            </x-jet-button>
        </div>
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-100 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié?') }}
                        </a>
                </div>
                <div class="flex items-center justify-end mt-2">

                            @if (Route::has('register'))
                            <p class="text-sm text-gray-100"> Vous n'avez pas un compte? </p>
                         <b><a class="underline text-sm text-green-500 hover:text-gray-900" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 "> S'inscrire</a></b>
                        @endif     
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
</body>
</html>

