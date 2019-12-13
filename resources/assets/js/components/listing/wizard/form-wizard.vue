<template>
    <div class="content min-h-full mt-16 mb-8">
        <div class="text-4xl text gray-800">
            {{ form.category }} in {{ form.suburb }}
        </div>
        <div class="navigation mt-8">
            <ul class="list-reset flex mb-8 border-b overflow-scroll">
                <template v-for="(step, index) in steps">
                    <li :class="[index === currentStepNumber - 1 ? 'border-b border-black font-semibold' : 'font-light']">
                        <a class="whitespace-no-wrap uppercase text-xs inline-block py-2 px-4 text-gray-800 hover:text-black" :class="[index === 0 ? 'pl-0 ' : '']" href="#">{{step.name}}</a>
                    </li>
                </template>
            </ul>
        </div>
        <div>
            <keep-alive>
                <component ref="currentStep" :is="steps[currentStepNumber - 1].step" :listing="listing" :addons="addons" :amenities="amenities" :images="images" :plans="plans" :tags="tags" :data="form" @update="processStep" @back="back"></component>
            </keep-alive>
        </div>
        <!--<pre>{{ form }}</pre>-->
    </div>
</template>

<script>
import FormGeneral from './form-general';
import FormFeatures from './form-features';
import FormMedia from './form-media';
import FormPlan from './form-plan';
import FormAddon from './form-addon';

export default {
    name: 'FormWizard',

    components: {
        FormGeneral,
        FormFeatures,
        FormMedia,
        FormPlan,
        FormAddon
    },

    props: {
        listing: {
            type: Object,
            required: true
        },
        addons: {
            type: Array,
            required: true
        },
        amenities: {
            type: Array,
            required: true
        },
        images: {
            type: Array,
            required: true
        },
        plans: {
            type: Object,
            required: true
        },
        tags: {
            type: Array,
            required: true
        }
    },

    /**
     * The component's data.
     */
    data() {
        return {
            canGoNext: false,
            currentStepNumber: this.listing.current_step,

            form: new SparkForm({
                addons: _.map(this.listing.addons, 'id'),
                address: this.listing.address,
                amenities: _.map(this.listing.amenities, 'id'),
                agreement: null,
                category: this.listing.category.title,
                contact: this.listing.contact,
                currentStep: this.listing.current_step,
                district: this.listing.district.title,
                fullDescription: this.listing.full_description,
                id: this.listing.id,
                images: this.images,
                latitude: this.listing.geocode_lat,
                longitude: this.listing.geocode_lng,
                maxArea: this.listing.max_area,
                maxCapacity: this.listing.max_capacity,
                maxCost: this.listing.max_cost,
                minArea: this.listing.min_area,
                minCapacity: this.listing.min_capacity,
                minCost: this.listing.min_cost,
                newsletter: null,
                outgoings: this.listing.outgoings,
                plan: this.listing.plan,
                photography: null,
                premium: null,
                coupon: null,
                promotion: null,
                region: this.listing.region.title,
                shortDescription: this.listing.short_description,
                suburb: this.listing.suburb.title,
                tags: _.map(this.listing.tags, 'id'),
                title: this.listing.title,
                video: null
            }),

            steps: [
                {'step':'FormGeneral', 'name': 'General'},
                {'step':'FormFeatures', 'name': 'Features'},
                {'step':'FormMedia', 'name': 'Images & Video'},
                {'step':'FormPlan', 'name': 'Listing Plan'},
                {'step':'FormAddon', 'name': 'Add Ons'}
            ],
        }
    },

    computed: {
        currentStep() {
            return this.steps[this.currentStepNumber - 1];
        },

        length() {
            return this.steps.length;
        },

        progress() {
            return this.currentStepNumber / this.length * 100
        }
    },

    methods: {
        back() {
            this.goBack();
        },

        goBack() {
            this.currentStepNumber--;
        },

        goNext() {
            this.currentStepNumber++;
        },

        processStep(step) {
            Object.assign(this.form, step);
            if(step.currentStep === this.length) {
                this.proceedToPayment();
            } else {
                this.goNext();
            }

        },
    }
}
</script>
