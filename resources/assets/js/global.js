var base = require('spark');

module.exports = {
    mixins: [base],

    /**
     * The component's data.
     */
    data() {
        return {
            categories: [],
            form: new SparkForm({
                address: '',
                category: null,
                suburb: '',
                district: '',
                latitude: 0,
                longitude: 0,
                region: '',
            })
        }
    },

    /**
     * The component has been created by Vue.
     */
    created() {
        if (Spark.userId) {
            this.loadDataForListingCreation();
        }
    },

    methods: {
        /**
         * Load the data for a listing creation.
         */
        loadDataForListingCreation() {
            axios.get('/api/listing/categories')
                .then(response => {
                    this.categories = response.data;

                    this.autocomplete = new google.maps.places.Autocomplete(
                        (this.$refs.autocomplete),
                        {types: ['geocode']}
                    );

                    this.autocomplete.addListener('place_changed', () => {
                        let address = this.autocomplete.getPlace();

                        this.loadDataForLocation(address);
                    });
                });
        },

        /**
         * Load the data for location into the listing
         *
         * @param array address
         */
        loadDataForLocation(address) {
            this.form.address = address.formatted_address;
            this.form.suburb = address.address_components[2]["short_name"];
            this.form.district = address.address_components[3]["short_name"];
            this.form.latitude = address.geometry.location.lat();
            this.form.longitude = address.geometry.location.lng();
            this.form.region = address.address_components[4]["short_name"];
        },

        /**
         * Send a listing creation request
        */
        sendCreateListingRequest() {
            Spark.post('/listing/store', this.form)
                .then(response => {
                    window.location = 'listing/edit/' + response.listing.id;
                });
        }
    }
};
