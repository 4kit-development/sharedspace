<!-- Login Modal -->
<transition name="fade">
    <modal inline-template>
        <div class="transition-500 transition-linear transition-all">
            <div class="fixed inset-0 z-50 overflow-auto bg-smoke-300 flex hidden" id="modal-login" tabindex="-1" role="dialog">
                @include('spark::components.login')
            </div>
            <div class="fixed inset-0 z-50 overflow-auto bg-smoke-300 flex hidden" id="modal-register" tabindex="-1" role="dialog">
                @include('spark::components.register')
            </div>
            <div class="fixed inset-0 z-50 overflow-auto bg-smoke-300 flex hidden" id="modal-register-email" tabindex="-1" role="dialog">
                @include('spark::components.register-email')
            </div>
        </div>
    </modal>
</transition>
