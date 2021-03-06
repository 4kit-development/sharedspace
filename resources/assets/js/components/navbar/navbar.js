Vue.component('navbar', {
    props: ['user'],

    data() {
        return {
            isOpen: false,
            showTransition: false
        }
    },

    methods: {
        handleScroll (event) {
            window.pageYOffset > 40 ? this.showTransition=true : this.showTransition=false;
        },
        showListingModal() {
            $('#modal-add-listing').modal('show');
        },

        hideListingModal() {
            $('#modal-add-listing').modal('hide');
        },

        showLoginModal() {
            $('#modal-login').modal('show');
        },

        hideLoginModal() {
            $('#modal-login').modal('hide');
        },
    },

    created () {
        window.addEventListener('scroll', this.handleScroll);
    },

    destroyed () {
        window.removeEventListener('scroll', this.handleScroll);
    }
});
