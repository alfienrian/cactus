 @extends('layouts.auth')

 @section('form')
     <!-- Session Status -->
     <x-auth-session-status class="mb-4" :status="session('status')" />

     {{-- Cactus Head --}}
     <x-cactus-logo-welcome />


     <form method="POST" action="{{ route('login') }}">
         @csrf

         <!-- Email Address -->
         <div>
             <x-input-label for="email" :value="__('Email')" />
             <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                 autofocus autocomplete="username" />
             <x-input-error :messages="$errors->get('email')" class="mt-2" />
         </div>

         <!-- Password -->
         <div class="mt-4">
             <x-input-label for="password" :value="__('Password')" />

             <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                 autocomplete="current-password" />

             <x-input-error :messages="$errors->get('password')" class="mt-2" />
         </div>

         <!-- Remember Me -->
         <div class="block mt-4">
             <label for="remember_me" class="inline-flex items-center">
                 <input id="remember_me" type="checkbox"
                     class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                     name="remember">
                 <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
             </label>
         </div>

         <x-primary-button class="w-full mt-2">LOGIN</x-primary-button>

         <a class="block w-max mt-4 text-sm text-gray-200 rounded-md focus:outline-none hover:underline"
             href="{{ route('register') }}">
             {{ __('Belum punya akun? Daftar akun') }}
         </a>
     </form>
 @endsection

 @section('title')
     Selamat Datang di Cactus
 @endsection

 @section('description')
     Forum Cactus, oasis pengetahuan untuk semua pertanyaan Anda.
 @endsection