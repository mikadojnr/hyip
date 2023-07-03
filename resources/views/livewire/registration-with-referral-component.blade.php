<div>
        <!-- START Section Sign Up -->
        <section class="bg-gradi sp-100 login-section overflow-hidden d-flex align-items-center min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-11 mt-60 mx-md-auto">
                        <div class="login-box bg-white pr-lg-5 pr-0">
                            <div class="row no-gutters align-items-center">
                                <div class="col-md-6 order-md-last">
                                    <div class="form-wrap bg-white">
                                        <h4 class="btm-sep pb-3 mb-5">Register</h4>

                                        <script>

                                                // Retrieve the form element
                                                var form = document.getElementById('regform');

                                                // Add a submit event listener to the form
                                                form.addEventListener('submit', function(event) {

                                                // Retrieve the name element
                                                var name = document.getElementById('name');
                                                if (name.value == '') {
                                                    event.preventDefault();
                                                    alert("Please enter your full name!");
                                                    document.name.focus();
                                                }

                                                // Retrieve the email element
                                                var email = document.getElementById('email');
                                                if (!email.value == '') {
                                                    event.preventDefault();
                                                    alert("Please enter your email!");
                                                    document.email.focus();
                                                    return false;
                                                }
                                                if (!email.value.match(/^[A-Za-z0-9_\-]+$/@)) {
                                                    event.preventDefault();
                                                    alert("For email you should use English letters and digits only!");
                                                    document.email.focus();
                                                    return false;
                                                }

                                                // Retrieve the password element
                                                var password = document.getElementById('password');
                                                var password_confirmation = document.getElementById('password_confirmation');

                                                if(password !== password_confirmation) {
                                                    event.preventDefault();
                                                    alert("Password do not match!")
                                                }

                                                // Retrieve the checkbox element
                                                var checkbox = document.getElementById('agree');
                                                if (!checkbox.checked) {
                                                    // Prevent the form submission
                                                    event.preventDefault();

                                                    // Display an error message or perform any desired action
                                                    alert('You have to agree with the Terms and Conditions!');
                                                }
                                                });

                                            // function checkform() {
                                            //     if (document.regform.name.value == '') {
                                            //         alert("Please enter your full name!");
                                            //         document.regform.name.focus();
                                            //         return false;
                                            //     }



                                            //     if (document.regform.password.value == '') {
                                            //         alert("Please enter your password!");
                                            //         document.regform.password.focus();
                                            //         return false;
                                            //     }
                                            //     if (document.regform.password.value != document.regform.password_confirmation.value) {
                                            //         alert("Please check your password!");
                                            //         document.regform.password_confirmation.focus();
                                            //         return false;
                                            //     }


                                            //     if (document.regform.email.value == '') {
                                            //         alert("Please enter your e-mail address!");
                                            //         document.regform.email.focus();
                                            //         return false;
                                            //     }
                                            //     if (document.regform.email.value != document.regform.email1.value) {
                                            //         alert("Please retupe your e-mail!");
                                            //         document.regform.email.focus();
                                            //         return false;
                                            //     }

                                            //     // for (i in document.regform.elements) {
                                            //     //     f = document.regform.elements[i];
                                            //     //     if (f.name && f.name.match(/^pay_account/)) {
                                            //     //     if (f.value == '') continue;
                                            //     //     var notice = f.getAttribute('data-validate-notice');
                                            //     //     var invalid = 0;
                                            //     //     if (f.getAttribute('data-validate') == 'regexp') {
                                            //     //         var re = new RegExp(f.getAttribute('data-validate-regexp'));
                                            //     //         if (!f.value.match(re)) {
                                            //     //         invalid = 1;
                                            //     //         }
                                            //     //     } else if (f.getAttribute('data-validate') == 'email') {
                                            //     //         var re = /^[^\@]+\@[^\@]+\.\w{2,4}$/;
                                            //     //         if (!f.value.match(re)) {
                                            //     //         invalid = 1;
                                            //     //         }
                                            //     //     }
                                            //     //     if (invalid) {
                                            //     //         alert('Invalid account format. Expected '+notice);
                                            //     //         f.focus();
                                            //     //         return false;
                                            //     //     }
                                            //     //     }
                                            //     // }

                                            //     if (!document.regform.agree.checked) {
                                            //         alert("You have to agree with the Terms and Conditions!");
                                            //         return false;
                                            //     }

                                            //     return true;
                                            // }

                                            function IsNumeric(sText) {
                                            var ValidChars = "0123456789";
                                            var IsNumber=true;
                                            var Char;
                                            if (sText == '') return false;
                                            for (i = 0; i < sText.length && IsNumber == true; i++) {
                                                Char = sText.charAt(i);
                                                if (ValidChars.indexOf(Char) == -1) {
                                                IsNumber = false;
                                                }
                                            }
                                            return IsNumber;
                                            }
                                        </script>

                                        <x-validation-errors class="mb-4" style="color: red;"/>

                                        @if(Session::has('error_message'))
                                            <p class="alert alert-danger"><strong>{{Session::get('error_message')}}</strong></p>
                                        @endif

                                        <form method="POST" name="regform" id="regform" class="form" action="" wire:submit.prevent="saveUser">

                                            @csrf
                                            <div class="row">

                                                <div class="col-12">
                                                    <label for="" class="col-md-4 control-label">Name</label>
                                                    <div class="form-group position-relative">
                                                        <span class="zmdi zmdi-account"></span>
                                                        <input id="name" type="text" name="name" wire:model="name" class="form-control" placeholder="Full name" :value="old('name')" required  autocomplete="name">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label for="" class="col-md-4 control-label">Email</label>
                                                    <div class="form-group position-relative">
                                                        <span class="zmdi zmdi-account"></span>
                                                        <input id="email" type="email" name="email" wire:model="email" class="form-control" placeholder="Email" :value="old('email')" required autocomplete="username"/>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label for="" class="col-md-4 control-label">Password</label>
                                                    <div class="form-group position-relative">
                                                        <span class="zmdi zmdi-key"></span>
                                                        <input id="password" type="password" name="password"  wire:model="password" class="form-control" placeholder="Password" required autocomplete="new-password">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label for="" class="col-md-4 control-label">Confirm&nbsp;Password</label>
                                                    <div class="form-group position-relative">
                                                        <span class="zmdi zmdi-key"></span>
                                                        <input id="password_confirmation" type="password" name="password_confirmation" wire:model="password_confirmation" value='' class="form-control" placeholder="Retype Password" required autocomplete="new-password">
                                                    </div>
                                                </div>

                                                @if($referral_code)
                                                    <div class="col-12">
                                                        <label for="" class="col-md-4 control-label">Referral&nbsp;Code (Optional)</label>
                                                        <div class="form-group position-relative">
                                                            <span class="zmdi zmdi-key"></span>
                                                            <input disabled id="referrer" type="text" name="referrer" wire:model="referral_code" class="form-control">
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-12">
                                                        <label for="" class="col-md-4 control-label">Referral&nbsp;Code</label>
                                                        <div class="form-group position-relative">
                                                            <span class="zmdi zmdi-key"></span>
                                                            <input id="referrer" type="text" name="referrer" wire:model="referral_code" class="form-control">
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="col-12">
                                                    {{-- <input type=checkbox name="agree" id="agree" > I agree with <a href="">Terms and Conditions</a> --}}
                                                    <button type="submit" value="Register" class="btn btn-lg btn-custom btn-dark btn-block">
                                                        Sign Up
                                                    </button>
                                                </div>
                                        </div>
                                        </form>

                                    </div>
                                </div>

                                <div class="col-md-6 order-md-first">
                                    <div class="content text-center">
                                        <div class="border-bottom pb-5 mb-5">
                                            <h3 class="c-black">Already have an account?</h3>
                                            <a href="{{route('login')}}" class="btn btn-custom">sign In</a>
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
        <!-- END Section Sign Up -->
</div>
