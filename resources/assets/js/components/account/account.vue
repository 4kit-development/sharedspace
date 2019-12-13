<template>
    <div class="content min-h-full mt-16 mb-8">
        <div class="">
            <div class="text-2xl font-light">
                {{ user.email }}
            </div>
            <div class="text-2xl">
                {{ user.phone }}
            </div>
            <div class="text-2xl">
                {{ user.billing_address }}
            </div>
        </div>
        <div class="mt-8">
            <ul class="flex border-b-2 border-gray-300">
                <li class="mr-3 -mb-2px">
                    <a class="inline-block py-1 px-3 text-gray-700" @click.prevent="setActive('listings')" :class="{ 'border-b-2 border-gray-700': isActive('listings') }" href="#listings">Listings</a>
                </li>
                <li class="mr-3 -mb-2px">
                    <a class="inline-block py-1 px-3 text-gray-700" @click.prevent="setActive('savedsearch')" :class="{ 'border-b-2 border-gray-700': isActive('savedsearch') }" href="#savedsearch">Saved Search</a>
                </li>
                <li class="mr-3 -mb-2px">
                    <a class="inline-block py-1 px-3 text-gray-700" @click.prevent="setActive('watchlist')" :class="{ 'border-b-2 border-gray-700': isActive('watchlist') }" href="#watchlist">My Watchlist</a>
                </li>
            </ul>
            <div class="tab-content py-8" id="account">
                <div class="" :class="isActive('listings') ? 'block' : 'hidden'" id="listings">
                    <listings :listings="listings"></listings>
                </div>
                <div class="" :class="isActive('savedsearch') ? 'block' : 'hidden'" id="savedsearch">Saved search content</div>
                <div class="" :class="isActive('watchlist') ? 'block' : 'hidden'" id="watchlist">Watchlist content</div>
            </div>
        </div>
    </div>
</template>

<script>
    import Listings from './listings.vue';

    export default {
        props: [
            'user',
            'listings'
        ],

        components: {
           listings : Listings
        },

        data() {
            return {
                activeItem: 'listings'
            }
        },

        methods: {
            isActive (menuItem) {
                return this.activeItem === menuItem
            },
            setActive (menuItem) {
                this.activeItem = menuItem
            }
        }
    }
</script>
