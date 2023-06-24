{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
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
                                    <h4 class="btm-sep pb-3 mb-5">Forgot Password</h4>

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

                                    <x-validation-errors class="mb-4" style="color: red;"/>
                                    <form method=POST name="mainform" onsubmit="return checkform()" class="form" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group position-relative">
                                                    <span class="zmdi zmdi-account"></span>
                                                    <input type="email" name="email" value='' class="form-control" placeholder="Enter your email" :value="old('email')" required autofocus autocomplete="username">
                                                </div>
                                            </div>

                                            <div class="col-12 mt-30">
                                                <button type="submit" value="Login" class="btn btn-lg btn-custom btn-dark btn-block">
                                                    Email Password Reset Link
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-6 order-md-first">
                                <div class="content text-center">
                                    <div class="border-bottom pb-5 mb-5">
                                        <h3 class="c-black">Remember Account?</h3>
                                        <a href="{{route('login')}}" class="btn btn-custom">Sign In</a>
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
