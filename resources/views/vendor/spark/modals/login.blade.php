<!-- Login Modal -->
<transition name="fade">
    <div class="fixed inset-0 z-50 overflow-auto bg-smoke-300 flex hidden" id="modal-login" tabindex="-1" role="dialog">
        @include('spark::components.login')
    </div>
</transition>
