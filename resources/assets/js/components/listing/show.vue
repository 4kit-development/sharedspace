<template>
    <div>
        <swiper ref="mySwiper" :options="swiperOption">
            <!-- slides -->
            <swiper-slide v-for="image in listing.images" :key="image.id">
                <img :src="image.url">
            </swiper-slide>
            <div class="swiper-button-prev" slot="button-prev"></div>
            <div class="swiper-button-next" slot="button-next"></div>
        </swiper>
        <div class="container mx-auto ">
            <div class="content min-h-full mb-8 flex justify-center">
                <div class="w-full">
                    <div class="flex flex-wrap mb-6 mt-6">
                        <div class="w-full md:w-2/3 px-3 mb-6 md:pr-16">
                            <div class="information">
                                <div class="uppercase text-xxs text-gray-400 my-4 mt-0 tracking-wide">
                                    {{ listing.category.title }} /
                                    <template v-for="(tag, index) in listing.tags">
                                        {{ tag.title }}
                                        <template v-if="index !== listing.tags.length - 1"> / </template>
                                    </template>
                                </div>
                                <div class="text-1xl my-4">
                                    <i class="fa fa-bookmark-o mr-2"></i>
                                    <div class="font-semibold uppercase inline tracking-x-wide">
                                        {{ listing.title }}
                                    </div>
                                </div>
                                <div class="text-teal-400 text-lg my-4 leading-normal">
                                    {{ listing.short_description }}
                                </div>
                                <div class="text-sm my-4 leading-normal">
                                    {{ listing.full_description }}
                                </div>
                            </div>
                            <div class="amenities">
                                <div class="uppercase text-xxs text-gray-400 mt-8 mb-4 tracking-wide">
                                    Amenities & Services
                                </div>
                                <div class="px:0 flex">
                                    <div class="md:w-1/3 w-1/2 pr-3 mb-2 block text-gray-800 pb-2 relative form-checkbox" v-for="(amenity, index) in listing.amenities">
                                        <i :class="amenity.icon" class="text-lg"></i>
                                        <span class="text-sm leading-loose">
                                            {{ amenity.title }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="video" v-if="listing.video">
                                <div class="uppercase text-xxs text-gray-400 mt-8 mb-4 tracking-wide">
                                    Video
                                </div>
                                <div class="px:0 flex">
                                    <div class="video-container">
                                        <iframe width="100%" :src="listing.video" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="location">
                                <div class="uppercase text-xxs text-gray-400 mt-8 mb-4 tracking-wide">
                                    Location
                                </div>
                                <div id="address-map-container" style="width:100%;height:200px; ">
                                    <div style="width: 100%; height: 100%" id="address-map"></div>
                                </div>
                            </div>
                            <div class="social">
                                <div class="text-xs text-gray-600 mt-2 mb-4 tracking-wide">
                                    Listing Number {{listing.id}}, Share it:
                                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                    <div class="addthis_inline_share_toolbox inline-block ml-2"></div>
                                </div>

                            </div>
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <div class="contact">
                                <div class="font-semibold uppercase inline tracking-wide">
                                    {{ listing.user.name }}
                                </div>
                                <div class="phone-contact mt-2">
                                    <button class="btn btn-yellow-600" @click.prevent="phone">
                                        <span>
                                            Phone enquiry
                                        </span>
                                    </button>
                                </div>
                                <div class="email-contact mt-2">
                                    <button class="btn btn-gray-800" @click.prevent="email">
                                        <span>
                                            Email enquiry
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="metrics">
                                <div class="mt-4">
                                    <i class="fa fa-map-marker text-base mr-1"></i>
                                    <div class="text-base inline">{{ listing.address }}</div>
                                    <div class="text-xs text-gray-400 leading-normal">{{ listing.suburb.title }} - {{ listing.district.title }}</div>
                                </div>
                                <div class="mt-4">
                                    <i class="fa fa-money text-base mr-1"></i>
                                    <div class="text-base inline">{{ listing.formatted_cost }}</div>
                                    <div class="text-xs text-gray-400 leading-normal">{{ listing.category.metric.cost_label }}</div>
                                </div>
                                <div class="mt-4">
                                    <i class="fa fa-square-o text-base mr-1"></i>
                                    <div class="text-base inline">{{ listing.formatted_area }}</div>
                                    <div class="text-xs text-gray-400 leading-normal">{{ listing.category.metric.area_label }}</div>
                                </div>
                                <div class="mt-4">
                                    <i class="fa fa-user text-base mr-1"></i>
                                    <div class="text-base inline">{{ listing.formatted_capacity }}</div>
                                    <div class="text-xs text-gray-400 leading-normal">{{ listing.category.metric.capacity_label }}</div>
                                </div>
                                <div class="mt-4">
                                    <i class="fa fa-eye text-base mr-1"></i>{{ listing.page_views }}
                                    <div class="text-xs text-gray-400 leading-normal">Listing Views</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

   import { swiper, swiperSlide } from 'vue-awesome-swiper'

    export default {
        name: 'ShowListing',

        components: {
            swiper,
            swiperSlide
        },

        props: {
            listing: {
                required: true
            }
        },

        computed: {
            swiper() {
                return this.$refs.mySwiper.swiper
            }
        },

        /**
         * The component's data.
         */
        data() {
            return {
                swiperOption: {
                    slidesPerView: 3,
                    spaceBetween: 5,
                    loop: true,
                    breakpoints: {
                        1024: {
                            slidesPerView: 2
                        },
                        640: {
                            slidesPerView: 1,
                            spaceBetween: 0
                        }
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                }
            }
        },

        mounted() {
            const map = new google.maps.Map(document.getElementById('address-map'), {
                center: {lat: this.listing.geocode_lat, lng: this.listing.geocode_lng},
                zoom: 13
            });
            const marker = new google.maps.Marker({
                map: map,
                position: {lat: this.listing.geocode_lat, lng: this.listing.geocode_lng},
            });
        },

        methods: {

        }
    }

</script>
