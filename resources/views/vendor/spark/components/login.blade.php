<div class="flex self-center h-full">
    <div class="relative p-12 bg-white w-full max-w-sm m-auto flex-col ">
        <div class="modal-content">
            <div class="modal-heading">
                <h2>Log In</h2>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <a href="">
                        <img src="/img/facebook-login.png" />
                    </a>
                </div>

                <div class="form-group mb-4">
                    <a href="{{ url('/auth/google') }}">
                        <img src="/img/google-login.png" />
                    </a>
                </div>
                <div class="form-group mb-4">
                    <div class="fancy">
                        <span>or</span>
                    </div>
                </div>
                @include('spark::shared.errors')
                <form role="form" method="POST" action="/login">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <input class="form-control focus:bg-white" name="email" type="text" placeholder="Email Address" value="{{ old('email') }}" autofocus />
                    </div>

                    <div class="form-group">
                        <input class="form-control focus:bg-white" name="password" type="password" placeholder="Password" />
                    </div>

                    <div class="form-group flex mt-4 mb-4 justify-between">
                        <div>
                            <label>
                                <input type="checkbox" name="remember" />
                                <span class="text-sm">{{__('Remember me')}}</span>
                            </label>
                        </div>
                        <div class="text-sm">
                            <a href="" class="text-teal-400">Show password</a>
                        </div>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer flex justify-center">
                        <button type="submit" class="btn btn-teal-400 mt-0 lg:text-sm py-3 w-full">
                            {{__('Log in')}}
                        </button>
                    </div>
                    <div class="modal-footer flex justify-center pt-4 pb-3">
                        <a href="{{ url('/password/reset') }}" class="text-sm text-teal-400">
                            {{__('Forgot Password?')}}
                        </a>
                    </div>
                </form>

                <hr class="border-gray-400 border-t-2 mb-4">

                <div class="text-center text-sm">
                            <span>
                                Don't have an account? <a href="#" class="text-teal-400">Sign Up</a>
                            </span>
                </div>
            </div>
        </div>
    </div>
</div>
