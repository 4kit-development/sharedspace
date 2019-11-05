<template>
    <div class="container mx-auto mb-12">
        <div class="flex flex-wrap mb-6">
            <div class="uppercase w-full text-center">
                Similar Listing
            </div>
        </div>
        <div class="content min-h-full mb-8 flex justify-center">
            <div class="w-full">
                <div class="flex flex-wrap mt-6">
                    <div class="w-full md:w-1/4 sm:w-1/2 px-3 mb-4" v-for="listing in similar">
                        <listing-card :listing="listing"></listing-card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ListingCard from './../listing/card.vue'

    export default {
        name: 'Similar',

        components: {
            ListingCard
        },

        props: {
            similar: {
                required: true
            }
        },

        computed: {

        },

        /**
         * The component's data.
         */
        data() {
            return {
                listing: []
            }
        },

        mounted() {

        },

        methods: {

        }
    }
</script>
