<template>
    <div class="overflow-hidden w-full h-full mx-auto">
        <div class="relative">
            <a :href="'/listing/' + listing.id">
                <template v-if="listing.images.length > 0">
                    <swiper ref="mySwiper" :options="swiperOption">
                        <!-- slides -->
                        <swiper-slide v-for="image in listing.images" :key="image.id">
                            <img :src="image.url">
                        </swiper-slide>
                        <div class="swiper-button-prev" slot="button-prev"></div>
                        <div class="swiper-button-next" slot="button-next"></div>
                    </swiper>
                </template>
                <template v-else>
                    <img src="/img/no-image.jpg" alt="Sharedspace no image" />
                </template>

                <div class="relative px-2 -mt-12 py-4" style="background-image: linear-gradient(180deg, rgba(255,255,255, 0) 0%, rgba(0, 0, 0, 1) 100%);">
                    <div class="bg-transparent flex justify-between">
                        <div class="flex">
                            <div class="flex items-center pr-2" @click="console.log(listing.id)">
                                <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 20">
                                    <path d="M.6 19.073H.596a.306.306 0 00.01-.005zm.159-.102c.041-.032.087-.072.134-.12l.241-.237A275.479 275.479 0 013.73 16.09l.154-.148c2.413-2.306 2.981-2.814 3.478-2.814.488 0 1.089.519 3.587 2.818l.155.142a262.904 262.904 0 012.703 2.532l.249.236c.136.128.22.185.241.216-.06-.014-.046-.107-.046-.283V1.993c0-.686-.556-1.243-1.242-1.243H1.992C1.307.75.75 1.307.75 1.993v16.796c0 .068.003.13.009.182zm6.339-4.394a.753.753 0 00.009.006z" fill="#000" stroke="#FFF" stroke-width="1.5" fill-rule="evenodd" fill-opacity=".2"/>
                                </svg>
                            </div>
                            <div class="flex items-center px-2">
                                <svg class="fill-current h-4 w-4 pr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8 15">
                                    <path d="M5.832 10.593l-.23 2.445c-.063.669-.654 1.211-1.315 1.211H3.082c-.663 0-1.253-.545-1.315-1.21l-.23-2.446h-.26c-.663 0-1.084-.531-.94-1.19l.681-3.105c.145-.657.8-1.19 1.463-1.19h2.407c.664 0 1.318.531 1.463 1.19l.68 3.105c.144.657-.275 1.19-.938 1.19h-.261zM3.685 4.499A1.816 1.816 0 011.88 2.67c0-1.01.807-1.829 1.804-1.829.996 0 1.803.819 1.803 1.829s-.807 1.828-1.803 1.828zm.96 5.863c.052-.545.547-.987 1.103-.986h.046l-.617-2.813c-.022-.101-.188-.236-.289-.236H2.481c-.1 0-.267.136-.289.236l-.611 2.811h.045c.555 0 1.047.45 1.097.988l.241 2.56c.004.042.076.108.118.108h1.205c.043 0 .114-.065.118-.107l.24-2.56zm-.96-7.082a.605.605 0 00.6-.61c0-.336-.268-.609-.6-.609a.605.605 0 00-.602.61c0 .336.27.609.602.609z" fill="#FFF" fill-rule="evenodd"/>
                                </svg>
                                <span class="text-white text-sm">{{ listing.formatted_capacity }}</span>
                            </div>
                            <div class="flex items-center px-2">
                                <svg class="fill-current h-4 w-4 pr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12">
                                    <path d="M6.038 9.812h4.366V1.28H1.986v4.43c.244-.106.514-.164.797-.164h1.412c1.105 0 2 .893 2 1.995v1.494c0 .275-.056.538-.157.777zM.784 2.06C.784.956 1.669.061 2.78.061H9.61a2 2 0 011.998 2v6.97c0 1.104-.886 2-1.998 2H2.781a2 2 0 01-1.997-2v-6.97zm1.202 4.705v3.047h3.007V6.765H1.986z" fill="#FFF" fill-rule="evenodd"/>
                                </svg>
                                <span class="text-white text-sm">{{listing.formatted_area}}</span>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <span class="text-white text-sm font-semibold">{{ listing.formatted_cost }}</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="pt-3">
            <a href="/listing/ + ${hit.id}">
                <span class="font-bold text-lg text-gray-700">
                    {{ listing.address }}
                </span>
            </a>
        </div>
        <div class="pt-1">
            <span class="text-sm text-gray-500">
                {{ listing.formatted_tags }}
            </span>
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
