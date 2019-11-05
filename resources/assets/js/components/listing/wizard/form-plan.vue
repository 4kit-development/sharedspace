<template>
    <form class="w-full">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full form-group mb-6">
                <h4 class="text-center mb-4">Listing Plan</h4>
                <p class="text-center">Please select the listing plan for your office space.</p>
            </div>
            <div v-for="(plan, i) in plans" class="w-full md:w-2/5 px-3 mb-6 md:mb-0" :class="i % 2 === 0 ? ' md:mr-auto' : ' md:ml-auto'">
                <div class="form-group">
                    <div class="max-w-xs rounded overflow-hidden shadow-lg mx-auto"" :class="i % 2 === 0 ? ' md:ml-0' : ' md:mr-0'" >
                        <div class="h-6" :class="plan.title === 'Premium' ? 'premium-band' : 'basic-band'"></div>
                        <div class="px-6 pt-8 pb-2">
                            <div class="font-bold text-md text-center">{{ plan.title }}</div>
                        </div>
                        <div class="px-12 py-4">
                            <div class="relative">
                                <select class="form-control focus:bg-white" v-model="plan.optionSelected" @change="updatePricingPlan(plan, $event)">
                                    <option v-for="(option, index) in plan.options" :value="index">{{ option.period }} days</option>
                                </select>
                                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="px-6">
                            <div class="text-4xl font-thin mb-2 text-center">${{ plan.formatted_price }}</div>
                        </div>
                        <div class="px-6 pt-0 pb-6">
                            <div class="text-xs text-gray-500 text-center">${{ plan.pricePerDay }} per day</div>
                        </div>
                        <div class="px-6 py-2 pb-12">
                            <!-- Modal Actions -->
                            <div class="flex justify-center">
                                <a href="#" class="btn btn-teal-400 mt-0 lg:text-sm py-3" @click.prevent="selectPlan(plan, i)">
                                    <span v-if="plan.selected">
                                       Plan Selected
                                    </span>
                                    <span v-else>
                                        Select plan
                                    </span>
                                </a>
                            </div>
                            <p class="form-control-label text-red-light font-normal pb-2 pt-2 text-center" v-show="form.errors.has('plan')">
                                {{ form.errors.get('plan') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-between">
            <a href="#" class="btn btn-no-border mt-0 lg:text-sm py-3" @click.prevent="back" >
                <span>
                   <i class="fa fa-long-arrow-left text-lg"></i> Back
                </span>
            </a>
            <a href="#" class="btn btn-teal-400 mt-0 lg:text-sm py-3" @click.prevent="submit" :disabled="form.busy">
                <span v-if="form.busy">
                    <i class="fa fa-btn fa-spinner fa-spin"></i> Updating
                </span>
                    <span v-else>
                    Next Step
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
                currentStep: 5,
                id: this.listing.id,
                plan: this.listing.plan
            }),
            plans: [],
        }
    },

    mounted() {
        this.getPlans();
    },

    methods: {
        /**
         * Move back a step a plan
         */
        back() {
            this.$emit('back');
        },

        calculatePricePerDay(plan, index) {
            return (Math.round(((plan.options[index].price / 100) / plan.options[index].period) * 100) / 100).toFixed(2);
        },

        /**
         * Get the active plans for the current category.
         */
        getPlans() {
            axios.get('/listing/plan/' + this.listing.category_id)
                .then(response => {
                    this.plans = response.data;
                    this.resetPlans();
                });
        },

        /**
         * Clear selection and calculate pricings.
         */
        resetPlans(reset) {
            let self = this;

            _.forEach(this.plans, function (plan) {
                plan.pricePerDay = self.calculatePricePerDay(plan, plan.optionSelected);
                plan.price = plan.options[plan.optionSelected].price;
                plan.formatted_price = plan.options[plan.optionSelected].formatted_price;
                plan.selected = false;

                if (!reset && self.data.plan) {
                    _.forEach(plan.options, function(option, index) {
                        if (self.data.plan.id === option.id) {
                            plan.pricePerDay = self.calculatePricePerDay(plan, index);
                            plan.price = plan.options[index].price;
                            plan.formatted_price = plan.options[index].formatted_price;
                            plan.optionSelected = index;
                            plan.selected = true;
                        }
                    });
                }
            });
        },

        /**
         * Select a new plan to form data.
         */
        selectPlan(plan) {
            this.resetPlans(true);
            plan.selected = true;
            this.form.plan = plan.options[plan.optionSelected];
        },

        /**
         * Submit a plan
         */
        submit() {
            Spark.put(`/listing/${this.listing.id}/update/plan`, this.form)
                .then(() => {
                    this.$emit('update', {
                        plan: this.form.plan,
                        currentStep: this.form.currentStep,
                    });
                });
        },

        /**
         * Update pricing plans based on current selection
         */
        updatePricingPlan(plan, $event) {
            plan.selected = false;
            plan.pricePerDay = this.calculatePricePerDay(plan, $event.target.value);
            plan.price = plan.options[$event.target.value].price;
            plan.formatted_price = plan.options[$event.target.value].formatted_price;
        },
    }
}
</script>
