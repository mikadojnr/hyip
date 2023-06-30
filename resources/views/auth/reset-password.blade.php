{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
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
                                    <h4 class="btm-sep pb-3 mb-5">Reset Password</h4>

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

                                    <x-validation-errors class="mb-4 alert alert-danger"/>

                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            <strong>{{ session('status') }}</strong>
                                        </div>
                                    @endif


                                    <form method=POST name=mainform class="form" action="{{ route('password.update') }}">
                                        @csrf
                                        <div class="row">



                                            <div class="col-12">
                                                <div class="form-group position-relative">
                                                    <span class="zmdi zmdi-account"></span>

                                                    <input type="hidden" name="token" value="{{ $request->route('token') }}" class="form-control">
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <label for="" class="col-md-4 control-label">Email</label>

                                                <div class="form-group position-relative">
                                                    <span class="zmdi zmdi-account"></span>
                                                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" class="form-control" placeholder="Username" required autofocus>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <label for="" class="col-md-4 control-label">New Password</label>

                                                <div class="form-group position-relative">
                                                    <span class="zmdi zmdi-key"></span>
                                                    <input id="password" type="password" name="password" class="form-control" placeholder="New Password" required autocomplete="new-password" >
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <label for="" class="col-md-4 control-label">Confirm Password</label>

                                                <div class="form-group position-relative">
                                                    <span class="zmdi zmdi-key"></span>
                                                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder=" Confirm Password" required autocomplete="new-password">
                                                </div>
                                            </div>

                                            <div class="col-12 mt-30">
                                                <button type="submit" value="Login" class="btn btn-lg btn-custom btn-dark btn-block">Reset
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="content text-center">
                                    <div class="pb-5 mb-5">
                                        <h3 class="c-black">First time here?</h3>
                                        <a href="{{ route('register')}}" class="btn btn-custom">Sign up</a>
                                    </div>
                                    <hr>
                                    <div class=" pb-5 mb-5">
                                        <h3 class="c-black">Already have an account?</h3>
                                        <a href="{{route('login')}}" class="btn btn-custom">sign In</a>
                                    </div>
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
