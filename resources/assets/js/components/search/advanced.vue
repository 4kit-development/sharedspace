<template>
    <div class="z-10 flex bg-white p-1 pl-4 shadow">
        <div class="flex">
            <div class="flex relative justify-center items-center mr-4">
                <svg class="fill-current h-4 w-4" viewBox="0 0 14 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path d="M10.6422242,9.69941517 L14.2614763,13.3186673 C14.5206744,13.5778654 14.5215562,13.9972269 14.2593915,14.2593915 C13.999042,14.5197411 13.5782888,14.5210979 13.3186673,14.2614763 L9.69941517,10.6422242 C8.85821592,11.2849095 7.80702338,11.6666667 6.66666667,11.6666667 C3.90524292,11.6666667 1.66666667,9.42809042 1.66666667,6.66666667 C1.66666667,3.90524292 3.90524292,1.66666667 6.66666667,1.66666667 C9.42809042,1.66666667 11.6666667,3.90524292 11.6666667,6.66666667 C11.6666667,7.80702338 11.2849095,8.85821592 10.6422242,9.69941517 Z M6.66666667,10.3333333 C8.69171075,10.3333333 10.3333333,8.69171075 10.3333333,6.66666667 C10.3333333,4.64162258 8.69171075,3 6.66666667,3 C4.64162258,3 3,4.64162258 3,6.66666667 C3,8.69171075 4.64162258,10.3333333 6.66666667,10.3333333 Z" id="Combined-Shape"></path>
                </svg>
                <multiselect v-model="category" :options="categories" track-by="id" label="title" :show-labels="false" :searchable="false" placeholder="Any space" class="inline-block appearance-none bg-white px-4 py-2 pr-8 text-xs sm:text-sm w-32 text-left cursor-pointer">
                    <span slot="caret" class="pointer-events-none absolute pin-y right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>
                    </span>
                </multiselect>
            </div>
        </div>
        <div class="flex">
            <div class="flex relative">
                <div @click="isOpen = !isOpen" class="flex justify-center items-center pr-16 cursor-pointer">
                    <svg class="fill-current h-4 w-4" viewBox="0 0 14 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path d="M2.43867937,6.72907219 C1.84195222,6.99014032 1.93525249,7.86405665 2.57364566,7.99326197 L7.12375723,8.91848775 L8.05267262,13.4730691 C8.18273221,14.1107665 9.05580045,14.2033147 9.31666348,13.6070563 L13.9833302,2.94038964 C14.2265041,2.38456351 13.6611722,1.8192316 13.105346,2.06240553 L2.43867937,6.72907219 Z M8.94063598,11.1547851 L8.34104483,8.21491923 C8.28755703,7.95266225 8.08240862,7.74782105 7.82007178,7.69472631 L4.91254907,7.1021083 L12.0837175,3.9647221 L8.94063598,11.1547851 Z" id="Path-822"></path>
                    </svg>
                    <span class="inline-block appearance-none bg-white px-4 py-2 pr-8 text-xs sm:text-sm">
                        {{ location }}
                    </span>
                    <div class="pointer-events-none absolute pin-y right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
                <div v-if="isOpen" class="absolute right-0 mt-10 py-2 w-48 bg-white shadow-xl">
                    <div class="relative flex flex-wrap pb-3">
                        <span class="font-semibold text-sm flex w-full pl-4 pb-2">
                            Region
                        </span>
                        <multiselect v-model="region" :options="regions" track-by="id" label="title" :hide-selected="true" :show-labels="false" :searchable="false" :max-height="600" @select="findDistrict" open-direction="bottom" placeholder="Select region" class="flex bg-gray-200 rounded appearance-none bg-white px-2 py-2 pr-8 text-xs sm:text-sm w-32 text-left ml-4 mr-4 cursor-pointer w-full"></multiselect>
                    </div>
                    <div class="relative flex flex-wrap pb-3">
                        <span class="font-semibold text-sm flex w-full pl-4 pb-2">
                            District
                        </span>
                        <multiselect v-model="district" track-by="title" label="title" :options="districts" :hide-selected="true" :show-labels="false" :searchable="false" :disabled="districtDisabled" :max-height="600" @select="findSuburb" open-direction="bottom" placeholder="Select district" :class="{'bg-gray-300': districtDisabled}" class="flex bg-gray-200 rounded appearance-none bg-white px-2 py-2 pr-8 text-xs sm:text-sm w-32 text-left ml-4 mr-4 cursor-pointer w-full"></multiselect>
                    </div>
                    <div class="relative flex flex-wrap pb-3">
                        <span class="font-semibold text-sm flex w-full pl-4 pb-2">
                            Suburb
                        </span>
                        <multiselect v-model="suburb" track-by="title" label="title" :options="suburbs" :multiple="true" :hide-selected="true" :show-labels="false" :searchable="false" :disabled="suburbDisabled" :max-height="600" open-direction="bottom" placeholder="Select suburb" :class="{'bg-gray-300': suburbDisabled}" class="flex bg-gray-200 rounded appearance-none bg-white px-2 py-2 pr-8 text-xs sm:text-sm w-32 text-left ml-4 mr-4 cursor-pointer w-full"></multiselect>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="flex relative justify-center items-center mr-4">
                <svg class="fill-current h-4 w-4" width="8px" height="16px" viewBox="0 0 8 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path d="M10.3809524,11.3333333 L10.1261787,14.0084574 C10.0564921,14.7401662 9.40115958,15.3333333 8.66805792,15.3333333 L7.33194208,15.3333333 C6.59633078,15.3333333 5.94316037,14.7365173 5.87382134,14.0084574 L5.61904762,11.3333333 L5.33001767,11.3333333 C4.59546919,11.3333333 4.1290571,10.7525764 4.28931348,10.0314227 L5.04401986,6.63524397 C5.20380328,5.91621858 5.92961012,5.33333333 6.6654009,5.33333333 L9.3345991,5.33333333 C10.0702797,5.33333333 10.7957238,5.91409027 10.9559801,6.63524397 L11.7106865,10.0314227 C11.8704699,10.7504481 11.4052356,11.3333333 10.6699823,11.3333333 L10.3809524,11.3333333 Z M8,4.66666667 C6.8954305,4.66666667 6,3.77123617 6,2.66666667 C6,1.56209717 6.8954305,0.666666667 8,0.666666667 C9.1045695,0.666666667 10,1.56209717 10,2.66666667 C10,3.77123617 9.1045695,4.66666667 8,4.66666667 Z M9.07335823,10.9997231 C9.12594222,10.4475913 9.61747472,10.000794 10.1756584,10.0017813 L10.338305,10.002069 L9.6543974,6.92448458 C9.62986758,6.81410043 9.44608514,6.66666667 9.3345991,6.66666667 L6.6654009,6.66666667 C6.55485974,6.66666667 6.36988827,6.81519907 6.3456026,6.92448458 L5.66725667,10 L5.82912999,10 C6.38268502,10 6.87384146,10.44532 6.92664177,10.9997231 L7.20114864,13.8820453 C7.20546217,13.9273374 7.28529389,14 7.33194208,14 L8.66805792,14 C8.71516761,14 8.79447205,13.9280281 8.79885136,13.8820453 L9.07335823,10.9997231 Z M8,3.33333333 C8.36818983,3.33333333 8.66666667,3.0348565 8.66666667,2.66666667 C8.66666667,2.29847683 8.36818983,2 8,2 C7.63181017,2 7.33333333,2.29847683 7.33333333,2.66666667 C7.33333333,3.0348565 7.63181017,3.33333333 8,3.33333333 Z" id="Combined-Shape"></path>
                </svg>
                <select class="inline-block appearance-none bg-white px-4 py-2 pr-8 text-xs sm:text-sm">
                    <option>1-10 People</option>
                </select>
                <div class="absolute pin-y right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
        </div>
        <div class="flex">
            <a href="#" class="btn btn-teal-400 pull-right py-3 w-auto md:w-48">
            <span class="hidden md:block">
                Find Space
            </span>
                <span class="block md:hidden">
                <svg viewBox="0 0 14 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="fill-current h-4 w-4"><path d="M10.6422242,9.69941517 L14.2614763,13.3186673 C14.5206744,13.5778654 14.5215562,13.9972269 14.2593915,14.2593915 C13.999042,14.5197411 13.5782888,14.5210979 13.3186673,14.2614763 L9.69941517,10.6422242 C8.85821592,11.2849095 7.80702338,11.6666667 6.66666667,11.6666667 C3.90524292,11.6666667 1.66666667,9.42809042 1.66666667,6.66666667 C1.66666667,3.90524292 3.90524292,1.66666667 6.66666667,1.66666667 C9.42809042,1.66666667 11.6666667,3.90524292 11.6666667,6.66666667 C11.6666667,7.80702338 11.2849095,8.85821592 10.6422242,9.69941517 Z M6.66666667,10.3333333 C8.69171075,10.3333333 10.3333333,8.69171075 10.3333333,6.66666667 C10.3333333,4.64162258 8.69171075,3 6.66666667,3 C4.64162258,3 3,4.64162258 3,6.66666667 C3,8.69171075 4.64162258,10.3333333 6.66666667,10.3333333 Z" id="Combined-Shape"></path></svg>
            </span>
            </a>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    export default {
        components: { Multiselect },

        data() {
            return {
                categories: this.loadCategories(),
                category: null,
                districts: [],
                district: null,
                districtDisabled: true,
                isOpen: false,
                location: 'Anywhere',
                region: null,
                regions: this.loadRegions(),
                suburb: null,
                suburbs: [],
                suburbDisabled: true,

            }
        },
        methods: {
            /**
             * Load the data for category search.
             */
            loadCategories() {
                axios.get('/api/listing/categories')
                    .then(response => {
                        this.categories = response.data;
                    });
            },
            /**
             * Load the data for region search.
             */
            loadRegions() {
                axios.get('/api/listing/regions')
                    .then(response => {
                        this.regions = response.data;
                    });
            },

            findDistrict(district) {
                this.districts = [];
                this.district = null;

                this.suburbs = [];
                this.suburb = null;
                this.suburbDisabled = true

                axios.get(`/api/listing/districts/` + district.id)
                    .then(response => {
                        this.districtDisabled = false;
                        this.districts = response.data;
                    });
            },

            findSuburb(suburb) {
                this.suburbs = [];
                this.suburb = null;

                axios.get(`/api/listing/suburbs/` + suburb.id)
                    .then(response => {
                        this.suburbDisabled = false;
                        this.suburbs = response.data;
                    });
            }
        }
    }
</script>

<style>
    .multiselect__content-wrapper {
        position:absolute;
        display:block;
        background:#fff;
        width:100%;
        max-height:240px;
        overflow:auto;
        border:1px solid #e8e8e8;
        border-top:none;
        border-bottom-left-radius:5px;
        border-bottom-right-radius:5px;
        z-index:50;
        -webkit-overflow-scrolling:touch;
        left: 0;
    }
    .multiselect__tags-wrap{display:inline}.multiselect__tag{position:relative;display:inline-block;padding:4px 26px 4px 10px;border-radius:5px;margin-right:10px;color:#fff;line-height:1;background:#4fd1c5;margin-bottom:5px;white-space:nowrap;overflow:hidden;max-width:100%;text-overflow:ellipsis}.multiselect__tag-icon{cursor:pointer;margin-left:7px;position:absolute;right:0;top:0;bottom:0;font-weight:700;font-style:normal;width:22px;text-align:center;line-height:22px;transition:all .2s ease;border-radius:5px}.multiselect__tag-icon:after{content:"\D7";color:#266d4d;font-size:14px}.multiselect__tag-icon:focus,.multiselect__tag-icon:hover{background:#4fd1c5}.multiselect__tag-icon:focus:after,.multiselect__tag-icon:hover:after{color:#fff}
    .multiselect__content{list-style:none;display:inline-block;padding:0;margin:0;min-width:100%;vertical-align:top}.multiselect--above .multiselect__content-wrapper{bottom:100%;border-bottom-left-radius:0;border-bottom-right-radius:0;border-top-left-radius:5px;border-top-right-radius:5px;border-bottom:none;border-top:1px solid #e8e8e8}.multiselect__content::webkit-scrollbar{display:none}.multiselect__element{display:block}.multiselect__option{display:block;padding:12px;min-height:40px;line-height:16px;text-decoration:none;text-transform:none;vertical-align:middle;position:relative;cursor:pointer;white-space:nowrap}.multiselect__option:after{top:0;right:0;position:absolute;line-height:40px;padding-right:12px;padding-left:20px;font-size:13px}.multiselect__option--highlight{background:#4fd1c5;outline:none;color:#fff}.multiselect__option--highlight:after{content:attr(data-select);background:#4fd1c5;color:#fff}.multiselect__option--selected{background:#f3f3f3;color:#35495e;font-weight:700}.multiselect__option--selected:after{content:attr(data-selected);color:silver}.multiselect__option--selected.multiselect__option--highlight{background:#ff6a6a;color:#fff}.multiselect__option--selected.multiselect__option--highlight:after{background:#ff6a6a;content:attr(data-deselect);color:#fff}.multiselect--disabled .multiselect__current,.multiselect--disabled .multiselect__select{background:#ededed;color:#a6a6a6}.multiselect__option--disabled{background:#ededed!important;color:#a6a6a6!important;cursor:text;pointer-events:none}.multiselect__option--group{background:#ededed;color:#35495e}.multiselect__option--group.multiselect__option--highlight{background:#35495e;color:#fff}.multiselect__option--group.multiselect__option--highlight:after{background:#35495e}.multiselect__option--disabled.multiselect__option--highlight{background:#dedede}.multiselect__option--group-selected.multiselect__option--highlight{background:#ff6a6a;color:#fff}.multiselect__option--group-selected.multiselect__option--highlight:after{background:#ff6a6a;content:attr(data-deselect);color:#fff}.multiselect-enter-active,.multiselect-leave-active{transition:all .15s ease}.multiselect-enter,.multiselect-leave-active{opacity:0}.multiselect__strong{margin-bottom:8px;line-height:20px;display:inline-block;vertical-align:top}[dir=rtl] .multiselect{text-align:right}[dir=rtl] .multiselect__select{right:auto;left:1px}[dir=rtl] .multiselect__tags{padding:8px 8px 0 40px}[dir=rtl] .multiselect__content{text-align:right}[dir=rtl] .multiselect__option:after{right:auto;left:0}[dir=rtl] .multiselect__clear{right:auto;left:12px}[dir=rtl] .multiselect__spinner{right:auto;left:1px}@keyframes spinning{0%{transform:rotate(0)}to{transform:rotate(2turn)}}
</style>
