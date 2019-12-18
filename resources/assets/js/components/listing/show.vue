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
        <div class="container mx-auto px-4">
            <div class="content min-h-full mb-8 flex justify-center">
                <div class="w-full">
                    <div class="flex flex-wrap mb-6 mt-6">
                        <div class="w-full md:w-2/3 mb-6 md:pr-16">
                            <div class="information">
                                <div class="uppercase text-xs text-gray-400 my-4 mt-0 tracking-wide">
                                    {{ listing.category.title }} /
                                    <template v-for="(tag, index) in listing.tags">
                                        {{ tag.title }}
                                        <template v-if="index !== listing.tags.length - 1"> / </template>
                                    </template>
                                </div>
                                <div class="text-xl my-4 flex items-center">
                                    <svg class="fill-current h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 20">
                                        <path d="M.76 19.14c.03-.027.068-.063.114-.108l.242-.24a278.157 278.157 0 012.602-2.554l.155-.149c2.424-2.336 2.99-2.846 3.488-2.846.49 0 1.088.52 3.599 2.85l.154.144a265.366 265.366 0 012.711 2.56l.25.239c.06.058.117.105.167.14.003-.053.008-.129.008-.23V2.008c0-.696-.558-1.259-1.242-1.259H1.992C1.308.75.75 1.313.75 2.01v16.935c0 .074.004.14.01.196zm6.335-4.448a.76.76 0 00.01.005z" stroke="#4A4A4A" stroke-width="1.5" fill="none" fill-rule="evenodd"/>
                                    </svg>
                                    <div class="font-semibold uppercase inline tracking-widest">
                                        {{ listing.title }}
                                    </div>
                                </div>
                                <div class="text-teal-400 text-lg my-4">
                                    {{ listing.short_description }}
                                </div>
                                <div class="text-sm my-4">
                                    {{ listing.full_description }}
                                </div>
                            </div>
                            <div class="amenities">
                                <div class="uppercase text-xs text-gray-500 mt-8 mb-4 tracking-wide">
                                    Amenities & Services
                                </div>
                                <div class="px:0 flex">
                                    <div class="md:w-1/3 w-1/2 pr-3 mb-2 block text-gray-700 pb-2 relative form-checkbox  flex items-center" v-for="(amenity, index) in listing.amenities">
                                        <span v-html="amenity.icon" class="mr-2"></span>
                                        <span class="text-sm">
                                            {{ amenity.title }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="video" v-if="listing.video">
                                <div class="uppercase text-xs text-gray-500 mt-8 mb-4 tracking-wide">
                                    Video
                                </div>
                                <div class="px:0 flex">
                                    <div class="video-container">
                                        <iframe width="100%" :src="listing.video" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="location">
                                <div class="uppercase text-xs text-gray-500 mt-8 mb-4 tracking-wide">
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
                        <div class="w-full md:w-1/3 mb-6 md:mb-0">
                            <div class="contact">
                                <div class="font-semibold uppercase inline tracking-wide flex items-center">
                                    <svg class="fill-current h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                        <path d="M9 .249c-2.094 0-3.661.443-4.77 1.281-1.115.833-1.72 2.047-1.949 3.37-.166.937-.114 1.958-.02 2.99C1.562 8.201 1 8.774 1 9.581c0 .547.182 1.104.484 1.615.302.51.766 1.052 1.516 1.052.177 0 .302-.031.438-.052.468 1.442 1.161 2.765 2.083 3.692C6.552 16.921 7.766 17.582 9 17.582s2.448-.667 3.48-1.698c.926-.922 1.609-2.245 2.082-3.687.136.02.26.052.438.052.75 0 1.214-.542 1.516-1.052.302-.51.484-1.068.484-1.615 0-.828-.583-1.417-1.307-1.719.093-1.27.078-2.474-.36-3.468-.458-1.032-1.333-1.808-2.5-2.282A2.25 2.25 0 0011.724.811C11.01.441 10.084.25 9 .25zm0 1.333c.917 0 1.656.182 2.11.417.453.229.557.448.557.583 0 0 .005.104-.084.365-.083.255-.26.62-.635 1-.76.755-2.39 1.635-5.948 1.635v1.333c3.776 0 5.813-.953 6.89-2.03.485-.485.745-.98.902-1.386a2.869 2.869 0 011.317 1.437c.36.808.459 1.917.308 3.25l-.084.698.709.047c.359.021.625.292.625.651 0 .188-.115.63-.297.938-.182.307-.386.395-.37.395.042 0-.193-.02-.354-.052l-.307-.057-.579-.12-.187.563s-.026.068-.052.161c-.38 1.438-1.13 2.677-1.985 3.532-.854.854-1.807 1.307-2.536 1.307-.73 0-1.682-.448-2.542-1.307-.854-.855-1.599-2.089-1.979-3.527v-.005c-.031-.11-.057-.172-.057-.172l-.193-.552-.573.12-.302.057c-.161.032-.396.052-.354.052.016 0-.188-.088-.37-.395-.182-.308-.297-.75-.297-.938 0-.36.266-.625.625-.65l.698-.048-.073-.698c-.13-1.12-.146-2.166.01-3.052.193-1.094.626-1.932 1.438-2.541.808-.61 2.063-1.01 3.969-1.01zM7 8.25a.665.665 0 00-.667.666c0 .37.297.667.667.667.37 0 .667-.297.667-.667A.665.665 0 007 8.25zm4 0a.665.665 0 00-.667.666c0 .37.297.667.667.667.37 0 .667-.297.667-.667A.665.665 0 0011 8.25z" fill="#4A4A4A" fill-rule="nonzero" stroke="#4A4A4A" stroke-width=".35"/>
                                    </svg>
                                    <span>
                                        {{ listing.user.name }}
                                    </span>
                                </div>
                                <div class="phone-contact mt-2">
                                    <button class="btn btn-yellow-500" @click.prevent="phone">
                                        <span>
                                            Phone enquiry
                                        </span>
                                    </button>
                                </div>
                                <div class="email-contact mt-2">
                                    <button class="btn btn-gray-700" @click.prevent="email">
                                        <span>
                                            Email enquiry
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="metrics">
                                <div class="mt-4">
                                    <svg class="fill-current h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M13.123 15.935C11.81 17.567 10.152 19 9.5 19c-.652 0-2.309-1.433-3.623-3.065C4.093 13.72 3 11.283 3 8.8 3 5.044 5.91 2 9.5 2S16 5.044 16 8.8c0 2.483-1.093 4.92-2.877 7.135zm-4.172.816c.241.208.549.442.549.442s.342-.263.549-.442c.6-.518 1.243-1.18 1.831-1.911 1.56-1.937 2.495-4.022 2.495-6.04 0-2.817-2.183-5.1-4.875-5.1S4.625 5.983 4.625 8.8c0 2.018.935 4.103 2.495 6.04.588.73 1.232 1.393 1.831 1.911zM7.062 8.8c0-1.408 1.092-2.55 2.438-2.55s2.438 1.142 2.438 2.55-1.092 2.55-2.438 2.55-2.438-1.142-2.438-2.55zm3.25 0c0-.47-.363-.85-.812-.85-.449 0-.813.38-.813.85s.364.85.813.85c.449 0 .813-.38.813-.85z" fill="#4D4D4D" fill-rule="nonzero"/>
                                    </svg>
                                    <div class="text-lg inline">{{ listing.address }}</div>
                                    <div class="text-sm text-gray-500 mt-1">{{ listing.suburb.title }} - {{ listing.district.title }}</div>
                                </div>
                                <div class="mt-4">
                                    <div class="flex items-center">
                                        <svg class="fill-current h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 18">
                                            <path d="M4.291 15.749A2.505 2.505 0 010 14.003V8.997C0 7.618 1.11 6.5 2.5 6.5c.742 0 1.408.325 1.866.84.97.042 1.905.296 2.78.692.433.196.785.393 1.042.56l2.646-.009c1.13 0 2.018.637 2.705 1.667h2.711c2.12 0 3.747 1.27 3.747 2.494.005.721-1.252 1.843-2.862 2.77-1.988 1.144-4.287 1.832-6.714 1.82-2.394.012-4.196-.414-5.483-1.153a5.432 5.432 0 01-.647-.432zm.705-1.597c.128.145.372.355.771.584 1.019.584 2.532.942 4.654.93 2.12.012 4.136-.591 5.883-1.597a10.171 10.171 0 001.662-1.175c.096-.086.101-.094.101-.094.08-.076.091-.21.019-.288 0 0 .034.017-.109-.094-.397-.31-.971-.501-1.727-.501h-1.885c.083.233.147.447.193.63a.833.833 0 01-.808 1.036H7.083a.833.833 0 110-1.666H12.5s.026-.106-.154-.425c-.454-.807-.97-1.242-1.512-1.242H7.917a.833.833 0 01-.496-.164 12.983 12.983 0 00-.961-.535A6.316 6.316 0 005 9.085v4.917c0 .05-.001.1-.004.15zm-1.663.282v.4H1.667V8.166h1.666v.002c.971-.833.91-.835.847-.836a.833.833 0 00-.847.836V14.434zM15.833 9a2.5 2.5 0 110-5 2.5 2.5 0 010 5zm0-1.667a.833.833 0 100-1.666.833.833 0 000 1.666zM10 5.667a2.5 2.5 0 110-5 2.5 2.5 0 010 5zM10 4a.833.833 0 100-1.667A.833.833 0 0010 4z" fill="#4D4D4D" fill-rule="evenodd"/>
                                        </svg>
                                        <div class="text-lg inline">{{ listing.formatted_cost }}</div>
                                    </div>
                                    <div class="text-sm text-gray-500 mt-1">{{ listing.category.metric.cost_label }}</div>
                                </div>
                                <div class="mt-4">
                                    <svg class="fill-current h-4 w-4 pr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12">
                                        <path d="M6.038 9.812h4.366V1.28H1.986v4.43c.244-.106.514-.164.797-.164h1.412c1.105 0 2 .893 2 1.995v1.494c0 .275-.056.538-.157.777zM.784 2.06C.784.956 1.669.061 2.78.061H9.61a2 2 0 011.998 2v6.97c0 1.104-.886 2-1.998 2H2.781a2 2 0 01-1.997-2v-6.97zm1.202 4.705v3.047h3.007V6.765H1.986z" fill="#FFF" fill-rule="evenodd"/>
                                    </svg>
                                    <div class="text-lg inline">{{ listing.formatted_area }}</div>
                                    <div class="text-sm text-gray-500 mt-1">{{ listing.category.metric.area_label }}</div>
                                </div>
                                <div class="mt-4">
                                    <i class="fa fa-user text-base mr-1"></i>
                                    <div class="text-lg inline">{{ listing.formatted_capacity }}</div>
                                    <div class="text-sm text-gray-500 mt-1">{{ listing.category.metric.capacity_label }}</div>
                                </div>
                                <div class="mt-4">
                                    <i class="fa fa-eye text-base mr-1"></i>{{ listing.page_views }}
                                    <div class="text-sm text-gray-500 mt-1">Listing Views</div>
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
