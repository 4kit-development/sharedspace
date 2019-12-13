<template>
    <div class="container mx-auto my-12" id="results">
        <div class="filters mb-12">
            <ul class="flex">
                <li class="flex mr-2 items-center" @click="showMap = false">
                    <svg :class="showMap ? 'text-gray-600' : 'text-gray-700'" class="fill-current h-4 w-4 inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14"><path d="M11.303 0A.7.7 0 0112 .697v3.94a.7.7 0 01-.697.696h-3.94a.7.7 0 01-.696-.697V.697A.7.7 0 017.364 0h3.939zm-.636 1.333H8V4h2.667V1.333zM4.637 0a.7.7 0 01.696.697v3.94a.7.7 0 01-.697.696H.697A.7.7 0 010 4.636V.697A.7.7 0 01.697 0h3.94zM4 1.333H1.333V4H4V1.333zm-4 6.03a.7.7 0 01.697-.696h3.94a.7.7 0 01.696.697v3.939a.7.7 0 01-.697.697H.697A.7.7 0 010 11.303v-3.94zM1.333 8v2.667H4V8H1.333zm5.334-.636a.7.7 0 01.697-.697h3.939a.7.7 0 01.697.697v3.939a.7.7 0 01-.697.697h-3.94a.7.7 0 01-.696-.697v-3.94zM8 8v2.667h2.667V8H8z" fill-rule="evenodd"/></svg>
                    <a :class="showMap ? 'text-gray-600' : 'text-gray-700'" class="text-center inline-block pl-1 text-sm" href="#">Featured</a>
                </li>
                <li class="flex mr-2 items-center">
                    |
                </li>
                <li class="flex mr-12 items-center" @click="showMap = true">
                    <svg :class="showMap ? 'text-gray-700' : 'text-gray-600'" class="fill-current h-4 w-4 inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 14"><path d="M8.973 11.263C7.894 12.543 6.535 13.667 6 13.667c-.535 0-1.894-1.124-2.973-2.404C1.563 9.525.667 7.614.667 5.667a5.333 5.333 0 1110.666 0c0 1.947-.896 3.858-2.36 5.596zm-3.423.64c.197.163.45.347.45.347s.28-.207.45-.347c.492-.407 1.02-.926 1.503-1.5C9.233 8.886 10 7.25 10 5.668a4 4 0 10-8 0c0 1.583.767 3.218 2.047 4.737a12.094 12.094 0 001.503 1.499zM4 5.667a2 2 0 114 0 2 2 0 01-4 0zm2.667 0a.667.667 0 10-1.334 0 .667.667 0 001.334 0z" fill-rule="nonzero"/></svg>
                    <a :class="showMap ? 'text-gray-700' : 'text-gray-600'" class="text-center inline-block pl-1 text-sm" href="#">On Map</a>
                </li>
                <li class="flex mr-4 items-center relative cursor-pointer" @click="showPrice = !showPrice; showArea = false;">
                    <svg class="h-4 w-4 inline-block text-grey-700 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 14"><path d="M3.433 12.399C3.07 12.769 2.564 13 2 13c-1.105 0-2-.887-2-1.998V6.998C0 5.895.888 5 2 5c.596 0 1.132.259 1.498.672.774.035 1.52.237 2.22.554.346.156.627.314.832.447l2.117-.006c.905 0 1.615.51 2.164 1.333H13c1.695 0 2.998 1.015 2.998 1.995.004.577-1.002 1.475-2.29 2.216-1.59.915-3.43 1.466-5.371 1.456-1.916.01-3.357-.331-4.387-.922a4.345 4.345 0 01-.517-.346zm.563-1.277c.103.116.299.283.618.467.814.467 2.025.753 3.723.744 1.696.01 3.309-.473 4.706-1.278a8.137 8.137 0 001.33-.94c.077-.069.064-.059.064-.059a.189.189 0 00.005-.271s.054.038-.06-.05c-.318-.248-.777-.402-1.382-.402h-1.508c.067.187.118.358.155.505a.667.667 0 01-.647.829H5.667a.667.667 0 010-1.334H10s.02-.084-.123-.34C9.514 8.349 9.1 8 8.667 8H6.333a.667.667 0 01-.396-.131c-.027-.02-.553-.331-.77-.429-.377-.17-.769-.299-1.167-.372v3.934c0 .04-.001.08-.004.12zm-1.33.225v.32H1.334V6.333h1.334v.002c.78-.666.729-.667.677-.668a.667.667 0 00-.677.668v5.012zm10-4.347a2 2 0 110-4 2 2 0 010 4zm0-1.333a.667.667 0 100-1.334.667.667 0 000 1.334zM8 4.333a2 2 0 110-4 2 2 0 010 4zM8 3a.667.667 0 100-1.333A.667.667 0 008 3z" fill-rule="evenodd"/></svg>
                    <a class="text-center inline-block pl-1 text-grey-700 text-sm">Price Range</a>
                    <div class="pointer-events-none inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                    <div v-show="showPrice" class="absolute top-0 mt-12 p-8 h-48 w-64 bg-white rounded-lg shadow-xl">
                        <div id="price" class="pb-1/4"></div>
                    </div>
                </li>
                <li class="flex mr-4 items-center relative cursor-pointer" @click="showArea = !showArea; showPrice = false;">
                    <svg class="h-4 w-4 inline-block text-grey-700 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 13"><path d="M6.697 11.35h3.99a.5.5 0 00.5-.5v-8.1a.5.5 0 00-.5-.5h-7.98a.5.5 0 00-.5.5V6.8h3.99a.5.5 0 01.5.5v4.05zM1.424.95H11.97a.5.5 0 01.5.5v10.7a.5.5 0 01-.5.5H1.424a.5.5 0 01-.5-.5V1.45a.5.5 0 01.5-.5zM2.707 8.1a.5.5 0 00-.5.5v2.25a.5.5 0 00.5.5h2.207a.5.5 0 00.5-.5V8.6a.5.5 0 00-.5-.5H2.707z" fill="#4A4A4A" fill-rule="evenodd"/></svg>
                    <a class="text-center inline-block pl-1 text-grey-700 text-sm">Floor Area</a>
                    <div class="pointer-events-none inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                    <div v-show="showArea" class="absolute top-0 mt-12 p-8 h-48 w-64 bg-white rounded-lg shadow-xl">
                        <div id="area" class="pb-1/4"></div>
                    </div>
                </li>
                <li class="flex mr-4 items-center">
                    <svg class="mr-1 h-4 w-4 inline-block pl-1 text-grey-700 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 14"><path d="M7.748 7.663h1.839l-.92-1.838-.919 1.838zm2.505 1.335l-3.172-.003-.485.97a.667.667 0 11-1.192-.596L8.07 4.035a.667.667 0 011.193 0L11.93 9.37a.667.667 0 01-1.193.596l-.484-.967zm-6.92-7.762A2.66 2.66 0 015.337.333H6a.667.667 0 010 1.334h-.664C4.597 1.667 4 2.262 4 3.002v7.996c0 .739.596 1.335 1.335 1.335H6a.667.667 0 010 1.334h-.664a2.66 2.66 0 01-2.002-.903 2.66 2.66 0 01-2.002.903H.668a.667.667 0 010-1.334h.664c.74 0 1.335-.596 1.335-1.335V3.002c0-.74-.596-1.335-1.335-1.335H.668a.667.667 0 010-1.334h.664a2.66 2.66 0 012.002.903z" fill-rule="nonzero"/></svg>
                    <div id="searchbox"></div>
                </li>
            </ul>
        </div>
        <div class="pb-12">
            <div id="stats"></div><div id="current-refinements"></div>
        </div>
        <div class="flex">
            <div id="sidebar" v-show="showMap" class="fixed inset-0 pt-4 h-full bg-white z-90 w-1/2 border-b -mb-16 lg:-mb-0 lg:static lg:h-auto ">
                <div id="navWrapper" class="h-full top-0 lg:h-auto lg:block lg:relative lg:sticky lg:top-16 bg-white lg:bg-transparent">
                    <div class="pb-12">
                        <div id="map" class="pb-full"></div>
                    </div>
                </div>
            </div>
            <div id="content-wrapper" :class="showMap ? 'w-1/2' : 'w-full'" class="min-h-screen lg:static lg:max-h-full lg:overflow-visible">
                <div id="content">
                    <div id="hits" :class="showMap ? 'map' : ''">
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-12">
            <div id="pagination"></div>
        </div>
    </div>
    <!--<div class="container mx-auto mb-12">-->
        <!--<div class="flex flex-wrap mt-6 mb-12">-->
            <!--<div class="flex justify-between w-full">-->
                <!--<ul class="list-reset flex items-center">-->
                    <!--<li class="-mb-px mr-2 cursor-pointer" @click="resetMap()">-->
                        <!--<div class="flex items-center">-->
                            <!--<i class="fa fa-plus-square-o"></i>-->
                            <!--<span :class="mapView ? 'text-gray-600' : 'text-gray-700'" class="pl-1">Featured List</span>-->
                        <!--</div>-->
                    <!--</li>-->
                    <!--<li class="mr-2">-->
                        <!--<div class="flex items-center">-->
                            <!--<span class="text-gray-700">|</span>-->
                        <!--</div>-->
                    <!--</li>-->
                    <!--<li class="mr-12 cursor-pointer"  @click="mapView = true">-->
                        <!--<div class="flex items-center">-->
                            <!--<i class="fa fa-map-marker text-gray-700"></i>-->
                            <!--<span  :class="mapView ? 'text-gray-700' : 'text-gray-600' "class="pl-1 text-gray-700">On map</span>-->
                        <!--</div>-->
                    <!--</li>-->
                    <!--<li class="mr-6">-->
                        <!--<div class="flex items-center">-->
                            <!--<div class="relative" :class="[isCostEmpty ? '' : ' bg-gray-200 rounded p-1 px-2']">-->
                                <!--<div class="flex items-center cursor-pointer" @click="showCost = !showCost">-->
                                    <!--<i class="fa fa-money"></i>-->
                                    <!--<span class="pl-1 text-sm" v-if="isCostEmpty">Price range</span>-->
                                    <!--<span class="pl-1 text-sm" v-else>${{ appliedCost.min }} - ${{ appliedCost.max }}</span>-->
                                    <!--<div class="p1-1 text-gray-700 flex mt-1">-->
                                        <!--<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>-->
                                    <!--</div>-->
                                <!--</div>-->
                                <!--<div v-show="showCost" class="absolute right-0 w-full mt-2 z-50">-->
                                    <!--<div class="bg-white shadow rounded border px-8 py-4 w-64">-->
                                        <!--<div class="text-xl">-->
                                            <!--${{ cost.min }} nzd - ${{ cost.max }} nzd-->
                                        <!--</div>-->
                                        <!--<div class="text-xs mb-6">-->
                                            <!--Price per month for office space-->
                                        <!--</div>-->
                                        <!--<ais-range-input attribute="max_cost" :precision="5" :min="0" >-->
                                            <!--<div slot-scope="{ currentRefinement, range, refine }">-->
                                                <!--<vue-slider-->
                                                    <!--@change="returnCostRange($event)"-->
                                                    <!--:dotSize="23"-->
                                                    <!--:min="range.min"-->
                                                    <!--:max="range.max"-->
                                                    <!--:process-style="{ backgroundColor: '#6EC7C0' }"-->
                                                    <!--:tooltip="'none'"-->
                                                    <!--:value="calculateCostRange(currentRefinement, range)"-->
                                                <!--&gt;-->
                                                    <!--<div-->
                                                        <!--:class="['custom-dot', { focus }]"-->
                                                        <!--slot="dot"-->
                                                        <!--slot-scope="{ value, focus }">-->
                                                    <!--</div>-->
                                                <!--</vue-slider>-->
                                                <!--<div class="flex justify-between">-->
                                                    <!--<div class="flex">-->
                                                        <!--<a @click="showCost = false" class="mt-0 lg:text-sm py-3 text-gray-800 uppercase cursor-pointer">Cancel</a>-->
                                                    <!--</div>-->
                                                    <!--<div class="flex">-->
                                                        <!--<a @click="appliedCost = { min: cost.min, max: cost.max };  refine({ min: cost.min, max: cost.max })" class="cursor-pointer mt-0 lg:text-sm py-3 text-teal-400 uppercase">Apply</a>-->
                                                    <!--</div>-->
                                                <!--</div>-->
                                            <!--</div>-->
                                        <!--</ais-range-input>-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</li>-->
                    <!--<li class="mr-6">-->
                        <!--<div class="flex items-center">-->
                            <!--<div class="relative" :class="[isAreaEmpty ? '' : ' bg-gray-200 rounded p-1 px-2']">-->
                                <!--<div class="flex items-center cursor-pointer" @click="showArea = !showArea">-->
                                    <!--<i class="fa fa-square-o"></i>-->
                                    <!--<span class="pl-1 text-sm" v-if="isAreaEmpty">Area range</span>-->
                                    <!--<span class="pl-1 text-sm" v-else>{{ appliedArea.min }}m2 - {{ appliedArea.max }}m2</span>-->
                                    <!--<div class="pl-1 text-gray-700 flex mt-1">-->
                                        <!--<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">-->
                                            <!--<path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>-->
                                        <!--</svg>-->
                                    <!--</div>-->
                                <!--</div>-->
                                <!--<div v-show="showArea" class="absolute right-0 w-full mt-2 z-50">-->
                                    <!--<div class="bg-white shadow rounded border px-4 py-4 w-64">-->
                                        <!--<div class="text-xl">-->
                                            <!--{{ area.min }} m2 - {{ area.max }} m2-->
                                        <!--</div>-->
                                        <!--<div class="text-xs mb-6">-->
                                            <!--Square meters for office space-->
                                        <!--</div>-->
                                        <!--&lt;!&ndash;<ais-range-input attribute="max_area" :precision="5" :min="0" >&ndash;&gt;-->
                                            <!--&lt;!&ndash;<div slot-scope="{ currentRefinement, range, refine }">&ndash;&gt;-->
                                                <!--&lt;!&ndash;<vue-slider&ndash;&gt;-->
                                                    <!--&lt;!&ndash;@change="returnAreaRange($event)"&ndash;&gt;-->
                                                    <!--&lt;!&ndash;:dotSize="23"&ndash;&gt;-->
                                                    <!--&lt;!&ndash;:min="range.min"&ndash;&gt;-->
                                                    <!--&lt;!&ndash;:max="range.max"&ndash;&gt;-->
                                                    <!--&lt;!&ndash;:process-style="{ backgroundColor: '#6EC7C0' }"&ndash;&gt;-->
                                                    <!--&lt;!&ndash;:tooltip="'none'"&ndash;&gt;-->
                                                    <!--&lt;!&ndash;:value="calculateAreaRange(currentRefinement, range)"&ndash;&gt;-->
                                                <!--&lt;!&ndash;&gt;&ndash;&gt;-->
                                                    <!--&lt;!&ndash;<div&ndash;&gt;-->
                                                        <!--&lt;!&ndash;slot="dot"&ndash;&gt;-->
                                                        <!--&lt;!&ndash;slot-scope="{ value, focus }"&ndash;&gt;-->
                                                        <!--&lt;!&ndash;:class="['custom-dot', { focus }]">&ndash;&gt;-->
                                                    <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                                <!--&lt;!&ndash;</vue-slider>&ndash;&gt;-->
                                                <!--&lt;!&ndash;<div class="flex justify-between">&ndash;&gt;-->
                                                    <!--&lt;!&ndash;<div class="flex">&ndash;&gt;-->
                                                        <!--&lt;!&ndash;<a @click="showArea = false"  class="mt-0 lg:text-sm py-3 text-gray-800 uppercase cursor-pointer">Cancel</a>&ndash;&gt;-->
                                                    <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                                    <!--&lt;!&ndash;<div class="flex">&ndash;&gt;-->
                                                        <!--&lt;!&ndash;<a @click="appliedArea = { min: area.min, max: area.max }; refine({ min: area.min, max: area.max })" class="cursor-pointer mt-0 lg:text-sm py-3 text-teal-400 uppercase">Apply</a>&ndash;&gt;-->
                                                    <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                                <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                            <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                        <!--&lt;!&ndash;</ais-range-input>&ndash;&gt;-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</li>-->
                    <!--<li class="mr-1">-->
                        <!--<div class="flex items-center">-->
                            <!--&lt;!&ndash;<ais-search-box placeholder="Search listings" class="searchbox" >&ndash;&gt;-->
                                <!--&lt;!&ndash;<div slot-scope="{ currentRefinement, isSearchStalled, refine }" class="flex items-center">&ndash;&gt;-->
                                    <!--&lt;!&ndash;<div class="relative">&ndash;&gt;-->
                                        <!--&lt;!&ndash;<i class="fa fa-font absolute pt-1 pl-1 pr-1" aria-hidden="true"></i>&ndash;&gt;-->
                                        <!--&lt;!&ndash;<input&ndash;&gt;-->
                                            <!--&lt;!&ndash;class="form-control bg-gray-200 focus:bg-white mb-0 py-1 pl-6 text-sm"&ndash;&gt;-->
                                            <!--&lt;!&ndash;type="search"&ndash;&gt;-->
                                            <!--&lt;!&ndash;v-model="currentRefinement"&ndash;&gt;-->
                                            <!--&lt;!&ndash;@input="refine($event.currentTarget.value)"&ndash;&gt;-->
                                        <!--&lt;!&ndash;&gt;&ndash;&gt;-->
                                    <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                <!--&lt;!&ndash;</div>&ndash;&gt;-->
                            <!--&lt;!&ndash;</ais-search-box>&ndash;&gt;-->
                        <!--</div>-->
                    <!--</li>-->
                <!--</ul>-->
                <!--<ul class="list-reset flex items-center">-->
                    <!--<li class="cursor-pointer">Save this search</li>-->
                <!--</ul>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="flex flex-wrap mb-6">-->
            <!--<div class="uppercase w-full">-->
                <!--All spaces-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="flex flex-wrap mt-6">-->
            <!--&lt;!&ndash;<ais-menu attribute="tags.title" class="w-full">&ndash;&gt;-->
                <!--&lt;!&ndash;<ul class="list-reset flex mb-4 overflow-scroll" slot-scope="{ items, createURL, refine, canRefine }">&ndash;&gt;-->
                    <!--&lt;!&ndash;<li slot="item" v-for="(item, index) in items" :key="item.value" class="font-light">&ndash;&gt;-->
                        <!--&lt;!&ndash;<a :disabled="!canRefine" :href="createURL(item.value)" @click.prevent="refine(item.value)" :class="[ item.isRefined ? 'font-bold': '', index === 0 ? 'pl-0' : '' ]" class="whitespace-no-wrap uppercase text-xs inline-block py-2 px-4 text-gray-800 hover:text-black hover:font-bold">{{item.label}}</a>&ndash;&gt;-->
                    <!--&lt;!&ndash;</li>&ndash;&gt;-->
                    <!--&lt;!&ndash;<li v-if="items.length == 0"  class="font-light">&ndash;&gt;-->
                       <!--&lt;!&ndash;<a class="whitespace-no-wrap uppercase text-xs inline-block py-2 text-gray-800">No tags available</a>&ndash;&gt;-->
                    <!--&lt;!&ndash;</li>&ndash;&gt;-->
                <!--&lt;!&ndash;</ul>&ndash;&gt;-->
            <!--&lt;!&ndash;</ais-menu>&ndash;&gt;-->
        <!--</div>-->
        <!--<div class="w-full">-->
            <!--<div class="flex flex-wrap">-->
                <!--<div class="border-t w-full flex pt-6">-->
                    <!--<app-map ref="mapRef" :mapView="mapView" :class="mapView ? 'md:w-1/2 sm:w-1/2' : 'hidden'" />-->
                    <!--&lt;!&ndash;<ais-state-results :class="mapView ? 'md:w-1/2 sm:w-1/2 mb-4 px-0 md:px-2 sm:px-2 md:ml-4' : 'w-full'">&ndash;&gt;-->
                        <!--&lt;!&ndash;<template slot-scope="{ hits }">&ndash;&gt;-->
                            <!--&lt;!&ndash;<ais-hits v-if="hits.length > 0">&ndash;&gt;-->
                                <!--&lt;!&ndash;<div slot-scope="{ items }" class="flex flex-wrap -mx-4 overflow-hidden sm:-mx-2" :class="[mapView ? ' sm:-mx-4' : '']">&ndash;&gt;-->
                                    <!--&lt;!&ndash;<div v-for="(item, index) in items" :key="item.objectID" class="w-full sm:w-1/2 mb-4 px-0 md:px-2 sm:px-2" :class="[mapView ? 'md:w-1/2 md:px-0' : 'md:w-1/3']">&ndash;&gt;-->
                                        <!--&lt;!&ndash;<listing-card :listing="item"></listing-card>&ndash;&gt;-->
                                    <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                <!--&lt;!&ndash;</div>&ndash;&gt;-->
                            <!--&lt;!&ndash;</ais-hits>&ndash;&gt;-->
                            <!--&lt;!&ndash;<div v-else>&ndash;&gt;-->
                                <!--&lt;!&ndash;No matches for your search. Sorry!&ndash;&gt;-->
                            <!--&lt;!&ndash;</div>&ndash;&gt;-->
                        <!--&lt;!&ndash;</template>&ndash;&gt;-->
                    <!--&lt;!&ndash;</ais-state-results>&ndash;&gt;-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
</template>

<script>
    // import VueSlider from 'vue-slider-component';
    // import 'vue-slider-component/theme/default.css'
    //
    export default {
        // props: {
        //     algoliaId: {
        //         required: true
        //     },
        //     algoliaKey: {
        //         required: true
        //     }
        // },

        // components: {
        //     VueSlider
        // },

        data() {
            return {
                appliedArea: {},
                appliedCost: {},
                area: {},
                cost: {},
                showMap: false,
                // searchClient: algoliasearch(
                //     this.algoliaId,
                //     this.algoliaKey
                // ),
                showArea: false,
                showPrice: false,
            };
        },
    //
    //     computed: {
    //         isAreaEmpty() {
    //             return _.isEmpty(this.appliedArea);
    //         },
    //         isCostEmpty() {
    //             return _.isEmpty(this.appliedCost);
    //         }
    //     },
    //         watch: {
    //             mapView: {
    //                 handler: function(view) {
    //                     if (view) {
    //                         $('.map .ais-Hits-item').removeClass('w-1/4');
    //                         $('.map .ais-Hits-item').addClass('w-1/2');
    //                     } else {
    //                         $('.map .ais-Hits-item').removeClass('w-1/2');
    //                         $('.map .ais-Hits-item').addClass('w-1/4');
    //                     }
    //                 },
    //                 deep: true
    //             }
    //         },
    //     methods: {
    //         onPageChange() {
    //             window.scrollTo(0, 0);
    //         },
    //         calculateAreaRange(value, range) {
    //             this.area = {
    //                 min: value.min !== null ? value.min : range.min,
    //                 max: value.max !== null ? value.max : range.max,
    //             };
    //             return [
    //                 value.min !== null ? value.min : range.min,
    //                 value.max !== null ? value.max : range.max,
    //             ];
    //         },
    //         calculateCostRange(value, range) {
    //             this.cost = {
    //                 min: value.min !== null ? value.min : range.min,
    //                 max: value.max !== null ? value.max : range.max
    //             };
    //             return [
    //                 value.min !== null ? value.min : range.min,
    //                 value.max !== null ? value.max : range.max,
    //             ];
    //         },
    //         close() {
    //              this.showArea = false;
    //              this.showCost = false;
    //         },
    //         resetMap() {
    //             this.mapView = false;
    //             this.$refs.mapRef.state.clearMapRefinement();
    //         },
    //         returnAreaRange(range) {
    //             this.area = {
    //                 min: range[0],
    //                 max: range[1]
    //             }
    //         },
    //         returnCostRange(range) {
    //             this.cost = {
    //                 min: range[0],
    //                 max: range[1]
    //             }
    //         }
    //     }
    };
</script>

<style>
    .rheostat {
        overflow: visible;
    }
    .rheostat-background {
        background-color: rgb(216, 216, 216) !important;
        position: relative !important;
        height: 5px !important;
        top: 0px !important;
        width: 100% !important;
        border-radius: 3px !important;
        border-width: 1px !important;
        border-style: solid !important;
        border-color: rgb(255, 255, 255) !important;
        border-image: initial !important;
    }
    .rheostat-progress {
        background-color: rgb(0, 132, 137) !important;
        position: absolute !important;
        height: 5px !important;
        top: 0px !important;
        border-radius: 3px !important;
        border-width: 1px !important;
        border-style: solid !important;
        border-color: rgb(255, 255, 255) !important;
        border-image: initial !important;
    }
    .rheostat-handle {
        width: 27px !important;
        height: 27px !important;
        background-color: rgb(255, 255, 255) !important;
        z-index: 2 !important;
        box-shadow: rgb(235, 235, 235) 0px 2px 2px !important;
        margin-left: -13.5px !important;
        top: -10px !important;
        padding: 1px 7px !important;
        border-width: 1px !important;
        border-style: solid !important;
        border-color: rgb(0, 132, 137) !important;
        border-radius: 27px !important;
        outline: none !important;
        cursor: pointer;
        transition: all .3s;
    }
    .rheostat-handle:hover {
        transform: scale(1.1);
    }
    .rheostat-tooltip {
        font-size: 0.8rem;
        margin-left: 25%;
        position: absolute;
        top: -22px;
        text-align: center;
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%);
    }

    .ais-geo-search--control {
        position: absolute;
        top: 10px;
        left: 50px;
    }

    .ais-geo-search--redo, .ais-geo-search--toggle-label {
        box-shadow: 0 1px 1px 0 rgba(85,95,110,.2);
        border: 1px solid #d4d8e3;
        border-radius: 4px;
    }

    .ais-geo-search--toggle-label {
        font-size: 12px;
        background: #fff;
        padding: 0 15px;
    }

    .ais-geo-search--toggle-label, .ais-refinement-list--label, .ais-toggle--label {
        cursor: pointer;
    }

    .ais-Pagination-list {
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center; }

    .ais-Pagination-item + .ais-Pagination-item {
        margin-left: 0.3rem; }

    .ais-Pagination-link {
        padding: 0.3rem 0.6rem;
        display: block;
        border: 1px solid #c4c8d8;
        border-radius: 5px;
        -webkit-transition: background-color 0.2s ease-out;
        transition: background-color 0.2s ease-out; }
    .ais-Pagination-link:hover, .ais-Pagination-link:focus {
        background-color: #e3e5ec; }
    .ais-Pagination-item--disabled .ais-Pagination-link {
        opacity: 0.6;
        cursor: not-allowed;
        color: #a5abc4; }
    .ais-Pagination-item--disabled .ais-Pagination-link:hover, .ais-Pagination-item--disabled .ais-Pagination-link:focus {
        color: #a5abc4;
        background-color: #fff; }
    .ais-Pagination-item--selected .ais-Pagination-link {
        color: #fff;
        background-color: #0096db;
        border-color: #0096db; }
    .ais-Pagination-item--selected .ais-Pagination-link:hover, .ais-Pagination-item--selected .ais-Pagination-link:focus {
        color: #fff; }

    .ais-Hits-item {
        width: 25%;
    }

    .map .ais-Hits-item {
        width: 50%;
    }

</style>
