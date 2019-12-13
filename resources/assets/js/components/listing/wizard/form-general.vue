<template>
    <form class="w-full">
        <div class="flex flex-wrap justify-between -mx-3">
            <div class="w-full md:w-2/5 px-3">
                <div class="form-group">
                    <label class="form-control-label">
                        Listing title
                    </label>
                    <input class="form-control focus:bg-white" name="title" v-model="form.title" type="text" placeholder="My listing title" :class="{'is-invalid': form.errors.has('title')}" />
                    <p class="form-control-label text-red-light font-normal pb-4" v-show="form.errors.has('title')">
                        {{ form.errors.get('title') }}
                    </p>
                </div>
                <div class="form-group">
                    <label class="form-control-label">
                        Short description
                    </label>
                    <textarea class="form-control focus:bg-white" name="shortDescription" v-model="form.shortDescription" placeholder="A short description about your listing" :class="{'is-invalid': form.errors.has('shortDescription')}"></textarea>
                    <p class="form-control-label text-red-light font-normal pb-4" v-show="form.errors.has('shortDescription')">
                        {{ form.errors.get('shortDescription') }}
                    </p>
                </div>
                <div class="form-group">
                    <label class="form-control-label">
                        Street address
                    </label>
                    <input class="form-control focus:bg-white" ref="autocomplete" name="address" v-model="form.address" placeholder="Listing address" :class="{'is-invalid': form.errors.has('address')}" />
                    <p class="form-control-label text-red-light font-normal pb-4" v-show="form.errors.has('address')">
                        {{ form.errors.get('address') }}
                    </p>
                </div>
                <div class="form-group">
                    <label class="form-control-label">
                        Contact details
                    </label>
                    <input class="form-control focus:bg-white" name="contact" v-model="form.contact" placeholder="Contact details" :class="{'is-invalid': form.errors.has('contact')}" />
                    <p class="form-control-label text-red-light font-normal pb-4" v-show="form.errors.has('contact')">
                        {{ form.errors.get('contact') }}
                    </p>
                </div>
            </div>
            <div class="w-full md:w-1/2 px-3">
                <div class="form-group">
                    <label class="form-control-label">
                        Full description
                    </label>
                    <textarea class="form-control h-48 focus:bg-white" name="fullDescription" v-model="form.fullDescription" placeholder="A full description about your listing" :class="{'is-invalid': form.errors.has('fullDescription')}"></textarea>
                    <p class="form-control-label text-red-light font-normal pb-4" v-show="form.errors.has('fullDescription')">
                        {{ form.errors.get('fullDescription') }}
                    </p>
                </div>
                <div class="form-group">
                    <label class="form-control-label">
                        Tags
                    </label>
                    <div class="flex flex-wrap md:items-center mb-6">
                        <label class="w-1/3 px-3 mb-6 md:mb-0 block text-gray-700 pb-2 relative form-checkbox pl-8" v-for="tag in tags">
                            <span class="text-sm">
                                {{ tag.title }}
                            </span>
                            <input class="mr-2 leading-tight" type="checkbox" :value="tag.id" v-model="form.tags">
                            <span class="checkmark"></span>
                        </label>
                        <p class="form-control-label text-red-light font-normal pb-4" v-show="form.errors.has('tags')">
                            {{ form.errors.get('tags') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <a href="#" class="btn btn-teal-400 mt-0 lg:text-sm py-3 px-8" @click.prevent="submit" :disabled="form.busy">
                <span v-if="form.busy">
                    <i class="fa fa-btn fa-spinner fa-spin"></i> Updating
                </span>
                <span v-else>
                    Next
                </span>
            </a>
        </div>
    </form>
</template>

<script>

export default {

    props: {
        listing: {
            type: Object,
            required: true
        },
        tags: {
            type: Array,
            required: true
        },
        data: {
            type: Object,
            required: true
        }
    },

    /**
     * The component's data.
     */
    data() {
        return {
            form: new SparkForm({
                address: this.data.address,
                contact: this.data.contact,
                currentStep: 2,
                district: this.data.district,
                fullDescription: this.data.fullDescription,
                latitude: this.data.latitude,
                id: this.listing.id,
                longitude: this.data.longtitude,
                region: this.data.region,
                shortDescription: this.data.shortDescription,
                suburb: this.data.suburb,
                tags: this.data.tags,
                title: this.data.title,
            })
        }
    },

    mounted() {
        this.autocomplete = new google.maps.places.Autocomplete(
            (this.$refs.autocomplete),
            {types: ['geocode']}
        );


        this.autocomplete.addListener('place_changed', () => {
            let address = this.autocomplete.getPlace();

            this.loadDataForLocation(address);
        });
    },

    methods: {
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

        submit() {
            let self = this;
            Spark.put(`/listing/${this.listing.id}/update/general`, this.form)
                .then(() => {
                    self.$emit('update', {
                        address: this.form.address,
                        contact: this.form.contact,
                        currentStep: this.form.currentStep,
                        district: this.form.district,
                        fullDescription: this.form.fullDescription,
                        latitude: this.form.latitude,
                        longitude: this.form.longtitude,
                        region: this.form.region,
                        shortDescription: this.form.shortDescription,
                        suburb: this.form.suburb,
                        tags: this.form.tags,
                        title: this.form.title,
                    });
                });
        }
    }
}
</script>
