<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>
<div >
    @if (Route::has('login'))
        <div>
        <div>
                    <!-- partial:../../partials/_navbar.html -->
                    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                        <div class="navbar-brand-wrapper d-flex align-items-center">
                            <a class="navbar-brand brand-logo" href="../../index.html">

                            </a>
                        </div>
                        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
                            <ul class="navbar-nav navbar-nav-right ml-auto">
                            </ul>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf

                                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 ml-2">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                            {{--@auth--}}

                               {{-- <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>--}}
                            {{--@elseauth()
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log In</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                @endif
                            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                                <span class="icon-menu"></span>
                            </button>--}}
                        </div>
                    </nav>
                    <!-- partial -->
                    <div class="container-fluid page-body-wrapper">
                        <!-- partial:../../partials/_sidebar.html -->
                     @include('layouts.nav')
                        <!-- partial -->
                        <div class="main-panel">
                            <div class="content-wrapper">
                                <div class="row">
                                    <div class="col-lg-12 grid-margin stretch-card">
                                        <div class="card">
<div class="card-body">
        <x-jet-authentication-card>
            <x-slot name="logo">
            </x-slot>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="phone" value="{{ __('Phone') }}" />
                    <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="vehicle_number" value="{{ __('Vehicle Number') }}" />
                    <x-jet-input id="vehicle_number" class="block mt-1 w-full" type="text" name="vehicle_number" :value="old('vehicle_number')" required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="route_number" value="{{ __('Route Number') }}" />
                    <x-jet-input id="route_number" class="block mt-1 w-full" type="text" name="route_number" :value="old('route_number')" required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>


                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms"/>

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-jet-button class="ml-4">
                        {{ __('Register') }}
                    </x-jet-button>
                </div>
            </form>
        </x-jet-authentication-card>

</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- content-wrapper ends -->
                            <!-- partial:../../partials/_footer.html -->
                        @include('layouts.footer')
                            <!-- partial -->
                        </div>
                        <!-- main-panel ends -->
                    </div>
                    <!-- page-body-wrapper ends -->
                </div>
    @endauth
    </div>
</div>
</body>
</html>
