<div class="flex self-center h-full">
    <div class="relative p-12 bg-white w-full max-w-sm m-auto flex-col ">
        <div class="modal-content">
            <div class="modal-close absolute top-0 right-0 m-6 opacity-50 cursor-pointer">
                <svg @click.prevent="closeModal()" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" class="w-4 h-4"><path d="M6.943 6l4.195 4.195a.667.667 0 01-.943.943L6 6.943l-4.195 4.195a.667.667 0 01-.943-.943L5.057 6 .862 1.805a.667.667 0 01.943-.943L6 5.057 10.195.862a.667.667 0 11.943.943L6.943 6z" fill-rule="nonzero"/></svg>
            </div>
            <div class="modal-heading">
                <h2>Sign Up</h2>
            </div>
            <div class="modal-body">
                <div class="form-group mb-4 text-center font-medium">
                    <span>Sign up with </span>
                    <a class="text-teal-400 cursor-pointer" href="{{ url('/auth/facebook') }}">facebook</a>
                    <span> or </span>
                    <a class="text-teal-400 cursor-pointer" href="{{ url('/auth/google') }}">google</a>
                </div>
                <div class="form-group mb-4">
                    <div class="fancy">
                        <span>or</span>
                    </div>
                </div>

                @include('spark::shared.errors')
                <form role="form" method="POST" action="/login" class="pb-6">
                    {{ csrf_field() }}

                    <div class="form-group relative">
                        <input class="form-control focus:bg-white mb-0" name="email" type="text" placeholder="Email Address" autofocus />
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 13" class="fill-current h-4 w-4">
                                <path d="M1.714 0C.772 0 0 .786 0 1.745v9.31c0 .959.772 1.745 1.714 1.745h12.572c.942 0 1.714-.786 1.714-1.745v-9.31C16 .786 15.228 0 14.286 0H1.714zm0 1.164h12.572c.04 0 .071.013.107.022L8 5.691 1.607 1.186c.036-.009.067-.022.107-.022zm-.571 1.109L8 7.109l6.857-4.836v8.782a.57.57 0 01-.571.581H1.714a.57.57 0 01-.571-.581V2.273z" fill-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>

                    <div class="form-group relative">
                        <input class="form-control focus:bg-white mb-0" name="first_name" type="text" placeholder="First Name" />
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 16" class="fill-current h-4 w-4">
                                <path d="M7.273 0a4.372 4.372 0 00-4.364 4.364 4.372 4.372 0 004.364 4.363 4.372 4.372 0 004.363-4.363A4.372 4.372 0 007.273 0zm0 8.727C3.267 8.727 0 11.994 0 16h1.455a5.808 5.808 0 015.818-5.818A5.808 5.808 0 0113.09 16h1.454c0-4.006-3.267-7.273-7.272-7.273zm0-7.272a2.9 2.9 0 012.909 2.909 2.9 2.9 0 01-2.91 2.909 2.9 2.9 0 01-2.908-2.91 2.9 2.9 0 012.909-2.908z" fill-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>

                    <div class="form-group relative">
                        <input class="form-control focus:bg-white mb-0" name="last_name" type="text" placeholder="Last Name" />
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 16" class="fill-current h-4 w-4">
                                <path d="M7.273 0a4.372 4.372 0 00-4.364 4.364 4.372 4.372 0 004.364 4.363 4.372 4.372 0 004.363-4.363A4.372 4.372 0 007.273 0zm0 8.727C3.267 8.727 0 11.994 0 16h1.455a5.808 5.808 0 015.818-5.818A5.808 5.808 0 0113.09 16h1.454c0-4.006-3.267-7.273-7.272-7.273zm0-7.272a2.9 2.9 0 012.909 2.909 2.9 2.9 0 01-2.91 2.909 2.9 2.9 0 01-2.908-2.91 2.9 2.9 0 012.909-2.908z" fill-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>

                    <div class="form-group relative">
                        <input class="form-control focus:bg-white mb-0" name="password" type="password" placeholder="Create a password" />
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 18" class="fill-current h-4 w-4">
                                <path d="M8 0a5.344 5.344 0 00-5.333 5.333v1.334H2c-1.099 0-2 .9-2 2v6.666c0 1.1.901 2 2 2h12c1.099 0 2-.9 2-2V8.667c0-1.1-.901-2-2-2h-.667V5.333A5.344 5.344 0 008 0zm0 1.333c2.219 0 4 1.782 4 4v1.334H4V5.333c0-2.218 1.781-4 4-4zM2 8h12c.375 0 .667.292.667.667v6.666A.658.658 0 0114 16H2a.658.658 0 01-.667-.667V8.667C1.333 8.292 1.625 8 2 8zm2 2.667c-.734 0-1.333.599-1.333 1.333S3.266 13.333 4 13.333 5.333 12.734 5.333 12 4.734 10.667 4 10.667zm4 0c-.734 0-1.333.599-1.333 1.333S7.266 13.333 8 13.333 9.333 12.734 9.333 12 8.734 10.667 8 10.667zm4 0c-.734 0-1.333.599-1.333 1.333s.599 1.333 1.333 1.333 1.333-.599 1.333-1.333-.599-1.333-1.333-1.333z" fill-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>

                    <div class="form-group relative">
                        <input class="form-control focus:bg-white mb-0" name="phone_number" type="text" placeholder="Phone Number" />
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="fill-current h-4 w-4">
                                <path d="M2.918 0L.98 1.937C-.082 3-.313 4.654.446 5.952c.846 1.452 1.539 2.524 4.438 5.418 2.894 2.9 3.683 3.293 5.11 4.13a3.311 3.311 0 004.01-.534l1.942-1.937-3.75-3.745-1.524 1.524a6.353 6.353 0 01-.774-.428 13.67 13.67 0 01-2.226-1.798 16.912 16.912 0 01-1.961-2.395 8.656 8.656 0 01-.548-.913l-.01-.02 1.51-1.509L2.918 0zm0 1.74l2.004 2.005-.88.885a.652.652 0 00-.197.5c0 .11.02.187.039.26.043.148.1.278.173.432.149.298.365.654.634 1.058a18.514 18.514 0 002.106 2.577c.813.807 1.707 1.49 2.443 1.956.365.236.687.414.961.534.14.063.264.11.414.14.072.014.153.024.264.014a.657.657 0 00.437-.197l.88-.88 2.01 2.005-1.072 1.072a2.082 2.082 0 01-2.52.337c-1.451-.852-2.004-1.077-4.865-3.933-2.856-2.86-3.404-3.74-4.24-5.173a2.082 2.082 0 01.336-2.52L2.918 1.74z" fill-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>

                    <div class="form-group relative">
                        <input class="form-control focus:bg-white mb-0" name="company" type="text" placeholder="Company" />
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 18" class="fill-current h-4 w-4">
                                <path d="M2 0C.901 0 0 .901 0 2v15.333h6.667v-2.666h2.666v2.666H16V2c0-1.099-.901-2-2-2H2zm0 1.333h12c.375 0 .667.292.667.667v14h-4v-2.667H5.333V16h-4V2c0-.375.292-.667.667-.667zM2.667 4h2.666V2.667H2.667V4zm4 0h2.666V2.667H6.667V4zm4 0h2.666V2.667h-2.666V4zm-8 2.667h2.666V5.333H2.667v1.334zm4 0h2.666V5.333H6.667v1.334zm4 0h2.666V5.333h-2.666v1.334zm-8 2.666h2.666V8H2.667v1.333zm4 0h2.666V8H6.667v1.333zm4 0h2.666V8h-2.666v1.333zm-8 2.667h2.666v-1.333H2.667V12zm4 0h2.666v-1.333H6.667V12zm4 0h2.666v-1.333h-2.666V12zm-8 2.667H4v-1.334H2.667v1.334zm9.333 0h1.333v-1.334H12v1.334z" fill-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>

                    <div class="form-group relative">
                        <label class="block text-gray-700 pb-2 relative form-checkbox pl-8">
                            <span class="text-sm">
                               I don’t want to receive marketing messeges from sharedspace.
                            </span>
                            <input class="mr-2 leading-tight" type="checkbox">
                            <span class="checkmark mt-1"></span>
                        </label>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer flex justify-center">
                        <button type="submit" class="btn btn-teal-400 mt-0 lg:text-sm py-2 w-full">
                            {{__('Sign Up')}}
                        </button>
                    </div>
                </form>

                <hr class="border-gray-400 border-t-2 mb-4">

                <div class="text-center text-sm">
                    <span>
                        Already have a sharedspace account? <a @click.prevent="showLoginModal()" class="text-teal-400 cursor-pointer">Log In</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
