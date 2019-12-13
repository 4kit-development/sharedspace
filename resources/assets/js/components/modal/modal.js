Vue.component('modal', {
    props: ['user'],

    data() {
        return {

        }
    },

    methods: {
        showRegisterEmailModal() {
            this.closeModal();
            $('#modal-register-email').modal('show');
        },
        showRegisterModal() {
            this.closeModal();
            $('#modal-register').modal('show');
        },
        showLoginModal() {
            this.closeModal();
            $('#modal-login').modal('show');
        },
        closeModal() {
            $('#modal-login').modal('hide');
            $('#modal-register').modal('hide');
            $('#modal-register-email').modal('hide');
        },
    },

    created () {
        window.addEventListener('scroll', this.handleScroll);
    },

    destroyed () {
        window.removeEventListener('scroll', this.handleScroll);
    }
});
