<template>
    <form class="w-full">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3 mb-6 md:mb-0">
                <div class="form-group">
                    <div class="flex flex-wrap">
                        <div class="md:w-1/3 pr-4">
                            <label class="form-control-label">
                                {{listing.category.metric.area_label}}
                            </label>
                            <div class="flex flex-wrap pr-12">
                                <div class="w-1/2 pr-4 pb-2">
                                    <div class="relative">
                                        <select class="form-control focus:bg-white" v-model="area">
                                            <option value="Fixed" selected>Fixed</option>
                                            <option value="Range">Range</option>
                                        </select>
                                        <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 pb-2" v-if="area === 'Fixed'">
                                    <input type="number" class="form-control focus:bg-white" v-model="form.maxArea" :placeholder="'22 ' + listing.category.metric.area_specification" />
                                </div>
                                <div class="w-full pb-2" v-if="area === 'Range'">
                                    <div class="flex">
                                        <div class="w-1/2 pr-2">
                                            <input type="number" class="form-control focus:bg-white" v-model="form.minArea" :placeholder="'15 ' + listing.category.metric.area_specification" />
                                        </div>
                                        <span class="self-center">-</span>
                                        <div class="w-1/2 pl-2">
                                            <input type="number" class="form-control focus:bg-white" v-model="form.maxArea" :placeholder="'35 ' + listing.category.metric.area_specification" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="form-control-label text-red-light font-normal pb-4" v-show="form.errors.has('maxArea')">
                                {{ form.errors.get('maxArea') }}
                            </p>
                        </div>
                        <div class="md:w-1/3 pr-4 pr-12">
                            <label class="form-control-label">
                                {{listing.category.metric.capacity_label}}
                            </label>
                            <div class="flex flex-wrap">
                                <div class="w-1/2 pr-4 pb-2">
                                    <div class="relative">
                                        <select class="form-control focus:bg-white" v-model="capacity">
                                            <option value="Fixed" selected>Fixed</option>
                                            <option value="Range">Range</option>
                                        </select>
                                        <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 pb-2 pr-8" v-if="capacity === 'Fixed'">
                                    <input type="number" class="form-control focus:bg-white" v-model="form.maxCapacity" :placeholder="'3 ' + listing.category.metric.capacity_specification" />
                                </div>
                                <div class="w-full pb-2 pr-8" v-if="capacity === 'Range'">
                                    <div class="flex">
                                        <div class="w-1/2 pr-2">
                                            <input type="number" class="form-control focus:bg-white" v-model="form.minCapacity" :placeholder="'2 ' + listing.category.metric.capacity_specification" />
                                        </div>
                                        <span class="self-center">-</span>
                                        <div class="w-1/2 pl-2">
                                            <input type="number" class="form-control focus:bg-white" v-model="form.maxCapacity" :placeholder="'10 ' + listing.category.metric.capacity_specification" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="form-control-label text-red-light font-normal pb-4" v-show="form.errors.has('maxCapacity')">
                                {{ form.errors.get('maxCapacity') }}
                            </p>
                        </div>
                        <div class="md:w-1/3 pr-12">
                            <label class="form-control-label">
                                {{listing.category.metric.cost_label}}
                            </label>
                            <div class="flex flex-wrap">
                                <div class="w-1/2 pr-4 pb-2">
                                    <div class="relative">
                                        <select class="form-control focus:bg-white" v-model="cost">
                                            <option value="Fixed" selected>Fixed</option>
                                            <option value="Range">Range</option>
                                        </select>
                                        <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 pb-2 pr-8" v-if="cost === 'Fixed'">
                                    <input type="number" class="form-control focus:bg-white" v-model="form.maxCost" :placeholder="'$300 ' + listing.category.metric.cost_specification" />
                                </div>
                                <div class="w-full pb-2 pr-8" v-if="cost === 'Range'">
                                    <div class="flex">
                                        <div class="w-1/2 pr-2">
                                            <input type="number" class="form-control focus:bg-white" v-model="form.minCost" :placeholder="'$200 ' +  listing.category.metric.cost_specification" />
                                        </div>
                                        <span class="self-center">-</span>
                                        <div class="w-1/2 pl-2">
                                            <input type="number" class="form-control focus:bg-white" v-model="form.maxCost" :placeholder="'$500 ' + listing.category.metric.cost_specification" />
                                        </div>
                                    </div>
                                </div>
                                <p class="form-control-label text-red-light font-normal pb-4" v-show="form.errors.has('maxCost')">
                                    {{ form.errors.get('maxCost') }}
                                </p>
                            </div>
                            <div class="jusitfy-start md:justify-end flex pr-8 mb-4">
                                <label class="text-gray-700 pb-2 relative form-checkbox pl-8">
                                        <span class="text-sm">
                                            Includes outgoings
                                        </span>
                                    <input class="mr-2 leading-tight" type="checkbox" v-model="form.outgoings">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">
                        Amenities and services
                    </label>
                    <div class="flex flex-wrap md:items-center mb-6">
                        <label class="md:w-1/4 w-1/2 px-3 mb-2 block text-gray-800 pb-2 relative form-checkbox pl-8" v-for="(amenity, index) in amenities">
                            <i :class="amenity.icon"></i>
                            <span class="text-sm">
                                {{ amenity.title }}
                            </span>
                            <input class="mr-2 leading-tight" type="checkbox" :value="amenity.id" v-model="form.amenities">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <p class="form-control-label text-red-light font-normal pb-4" v-show="form.errors.has('amenities')">
                        {{ form.errors.get('amenities') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="flex justify-between">
            <a href="#" class="btn btn-no-border mt-0 lg:text-sm py-3 pl-0 text-left" @click.prevent="back" >
                <span class="flex self-center">
                    <i class="fa fa-long-arrow-left text-lg mr-2"></i>
                    <span class="flex">
                        Back
                    </span>
                </span>
            </a>
            <a href="#" class="btn btn-teal-400 mt-0 lg:text-sm py-3 px-8 flex self-center justify-center" @click.prevent="submit" :disabled="form.busy">
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
        amenities: {
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
            area: this.data.minArea ? 'Range' : 'Fixed',
            capacity: this.data.minAapacity ? 'Range' : 'Fixed',
            cost: this.data.minCost ? 'Range' : 'Fixed',
            form: new SparkForm({
                amenities: this.data.amenities,
                currentStep: 3,
                id: this.listing.id,
                minArea: this.data.minArea ? this.data.minArea : 0,
                maxArea: this.data.maxArea,
                minCapacity: this.data.minCapacity ? this.data.minCapacity : 0,
                maxCapacity: this.data.maxCapacity,
                minCost: this.data.minCost ? this.data.minCost : 0,
                maxCost: this.data.maxCost,
                outgoings: this.data.outgoings,
            })
        }
    },

    methods: {
        /**
         * Move back a step a plan
         */
        back() {
            this.$emit('back');
        },

        submit() {
            let self = this;
            Spark.put(`/listing/${this.listing.id}/update/feature`, this.form)
                .then(() => {
                    self.$emit('update', {
                        amenities: this.form.amenities,
                        currentStep: this.form.currentStep,
                        minArea: this.form.minArea,
                        maxArea: this.form.maxArea,
                        minCapacity: this.form.minCapacity,
                        maxCapacity: this.form.maxCapacity,
                        minCost: this.form.minCost,
                        maxCost: this.form.maxCost,
                        outgoings: this.form.outgoings
                    });
                });
        }
    }
}
</script>

