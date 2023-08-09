{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}

<x-guest-layout>
    <!-- START Section Login -->
    <section class="bg-gradi sp-100 login-section overflow-hidden d-flex align-items-center min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mt-60 mx-md-auto">
                    <div class="login-box bg-white pl-lg-5 pl-0">
                        <div class="row no-gutters align-items-center">
                            <div class="col-md-6">
                                <div class="form-wrap bg-white">
                                    <h4 class="btm-sep pb-3 mb-5">Login</h4>

                                    <script language=javascript>
                                        function checkform() {
                                        if (document.mainform.username.value=='') {
                                            alert("Please type your username!");
                                            document.mainform.username.focus();
                                            return false;
                                        }
                                        if (document.mainform.password.value=='') {
                                            alert("Please type your password!");
                                            document.mainform.password.focus();
                                            return false;
                                        }
                                        return true;
                                        }
                                    </script>

                                    <x-validation-errors class="mb-4" style="color: red"/>

                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form method=POST name=mainform onsubmit="return checkform()" class="form" action="{{route('login')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group position-relative">
                                                    <span class="zmdi zmdi-account"></span>
                                                    <input type="email" name="email" value='' class="form-control" placeholder="Username" :value="old('email')" required autofocus autocomplete="username">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group position-relative">
                                                    <span class="zmdi zmdi-key"></span>
                                                    <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="current-password">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="float-left" >
                                                    <input type="checkbox" name="remember" id="remember">
                                                    <span class="c-black">Remember me</span>
                                                </div>

                                                <div class="float-right">
                                                    <a href="{{ route('password.request')}}" class="c-black">Forgot password?</a>
                                                </div>
                                            </div>

                                            {{-- <div class="col-12 text-lg-left">
                                                <input type="checkbox" name="remember" id="remember">
                                                <span>Remember me</span>
                                            </div>

                                            <div class="col-12 text-lg-center">
                                                <a href="{{ route('password.request')}}" class="c-black">Forgot password ?</a>

                                            </div> --}}

                                            <div class="col-12 mt-30">
                                                <button type="submit" value="Login" class="btn btn-lg btn-custom btn-dark btn-block">Sign In
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="content text-center">
                                    <div class="border-bottom pb-5 mb-5">
                                        <h3 class="c-black">First time here?</h3>
                                        <a href="{{ route('register')}}" class="btn btn-custom">Sign up</a>
                                    </div>
                                    <h5 class="c-black mb-4 mt-n1"></h5>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- END Section Login -->
</x-guest-layout>
