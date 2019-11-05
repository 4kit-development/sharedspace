Vue.component( 'header-scroll', {
    props:['user'],
    /**
     * The component's data.
     */

    data() {
        return {
            showNavbar: false
        }
    },

    methods: {
        handleScroll (event) {
            window.pageYOffset > 40 ? this.showNavbar=true : this.showNavbar=false;
        }
    },

    created () {
        window.addEventListener('scroll', this.handleScroll);
    },

    destroyed () {
        window.removeEventListener('scroll', this.handleScroll);
    }
});
