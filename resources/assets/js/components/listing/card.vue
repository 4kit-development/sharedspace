<template>
    <div class="overflow-hidden w-full h-full mx-auto">
        <div class="relative">
            <a :href="'/listing/' + listing.id">
                <swiper ref="mySwiper" :options="swiperOption">
                    <!-- slides -->
                    <swiper-slide v-for="image in listing.images" :key="image.id">
                        <img :src="image.url">
                    </swiper-slide>
                    <div class="swiper-button-prev" slot="button-prev"></div>
                    <div class="swiper-button-next" slot="button-next"></div>
                </swiper>
                <div class="pin-b absolute px-3 similar-listings-gradient w-full py-1 z-10">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <span class="inline-block text-lg text-white mr-3"><i class="fa fa-bookmark-o"></i></span>
                            <span class="inline-block text-xs text-white mr-3"><i class="fa fa-user"></i> 1-10</span>
                            <span class="inline-block text-xs text-white"><i class="fa fa-square-o"></i> 150</span>
                        </div>
                        <div>
                            <span class="inline-block text-xs text-white font-bold">$400</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="mt-2">
            <div class="font-semibold text-base mb-1">
                {{ listing.address }}
            </div>
            <div class="text-xs text-gray-400 leading-normal">
                <template v-for="(tag, index) in listing.tags">
                    {{ tag.title }}
                    <template v-if="index !== listing.tags.length - 1"> / </template>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
    import { swiper, swiperSlide } from 'vue-awesome-swiper'

    export default {
        props: ['listing'],

        name: 'ListingCard',

        components: {
            swiper,
            swiperSlide
        },

        data() {
            return {
                swiperOption: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                    loop: true,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                }
            };
        },

        computed: {
            coverImage() {
                if(this.listing.images) {
                    return this.listing.images[0].url
                }
                return 'https://placehold.it/640x480'
            },
            swiper() {
                return this.$refs.mySwiper.swiper
            }
        }
    }
</script>

<style scoped>

</style>
