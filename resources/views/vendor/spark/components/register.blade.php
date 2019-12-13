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
                <div class="form-group">
                    <a href="{{ url('/auth/facebook') }}">
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
                <!-- Modal Actions -->
                <div class="modal-footer pb-6">
                    <a @click.prevent="showRegisterEmailModal()" class="btn btn-teal-400 mt-0 lg:text-sm py-2 w-full flex justify-center items-center cursor-pointer">
                        <span class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 13" class="fill-current text-white h-4 w-4">
                                <path d="M1.714 0C.772 0 0 .786 0 1.745v9.31c0 .959.772 1.745 1.714 1.745h12.572c.942 0 1.714-.786 1.714-1.745v-9.31C16 .786 15.228 0 14.286 0H1.714zm0 1.164h12.572c.04 0 .071.013.107.022L8 5.691 1.607 1.186c.036-.009.067-.022.107-.022zm-.571 1.109L8 7.109l6.857-4.836v8.782a.57.57 0 01-.571.581H1.714a.57.57 0 01-.571-.581V2.273z" fill-rule="evenodd"/>
                            </svg>
                            <span class="ml-2">
                                {{__('Sign Up with email')}}
                            </span>
                        </span>
                    </a>
                </div>

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
