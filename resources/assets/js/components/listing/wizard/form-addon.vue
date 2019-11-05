<template>
    <form class="w-full">
        <div class="flex flex-wrap justify-center mb-6">
            <div class="w-full form-group mb-6">
                <h4 class="text-center mb-4">Additional Services</h4>
                <p class="text-center">Do you want to give you listing more exposure? Check out additional services<br /> we offer. Select the options you are after and add them to the cart.</p>
            </div>
            <div class="w-full form-group mb-6">
                <div class="flex flex-wrap justify-center">
                    <div v-for="(addon, index) in addons" class="sm:w-1/2 w-full lg:pr-4 px-2" :class="['lg:mx-0 lg:w-1/' + addons.length, index == addons.length - 1 ? 'lg:-mr-4' : '']">
                        <div class="w-full mb-4 rounded overflow-hidden" :class="[' bg-' + addon.background]">
                            <div class="h-4"></div>
                            <div class="px-6 my-4 text-center">
                                <i :class="addon.icon" class="text-2xl text-white"></i>
                            </div>
                            <div class="px-6 pb-2">
                                <div class="text-2xl text-center text-white">{{ addon.title }}</div>
                            </div>
                            <div class="px-6 my-3">
                                <div class="text-lg mb-2 text-center text-white">${{ addon.formatted_price }}</div>
                            </div>
                            <div class="px-6 my-4 mb-8 text-center">
                                <a href="" class="btn btn-white mt-0 lg:text-sm py-3">More Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full form-group max-w-sm">
                <label class="w-full flex justify-between pl-3 mb-2 text-gray-700 pb-2 relative form-checkbox pl-8">
                    <span class="text-sm text-gray-700">
                        {{ data.plan.type.title }} Listing Plan
                    </span>
                    <span class="text-sm text-gray-700">
                        ${{ data.plan.formatted_price }}
                    </span>
                    <input class="mr-2 leading-tight" type="checkbox" checked disabled>
                    <span class="checkmark"></span>
                </label>
                <label class="w-full flex justify-between pl-3 mb-2 text-gray-700 pb-2 relative form-checkbox pl-8" v-for="addon in addons">
                    <span class="text-sm" :class="{'text-gray-500': !addon.selected}">
                        {{ addon.title }}
                    </span>
                    <span class="text-sm" :class="{'text-gray-500': !addon.selected}">
                        ${{ addon.formatted_price }}
                    </span>
                    <input class="mr-2 leading-tight":value="addon.id" v-model="form.addons" :click="totalPrice" type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <hr class="h-1 border-b-2 border-gray-200 mr-3">
                <div class="form-group w-full">
                    <div class="flex justify-between mb-2 text-gray-700 pb-2 items-center mt-4" v-if="!redeemedCoupon">
                        <div class="w-3/5">
                            <input class="form-control mb-0 focus:bg-white" name="coupon" v-model="coupon.coupon" placeholder="Promo code" :class="{'is-invalid': coupon.errors.has('coupon')}" />
                        </div>
                        <a href="#" class="text-blue" @click.prevent="redeem">
                            <span v-if="coupon.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i> Applying
                            </span>
                            <span v-else>
                                Apply
                            </span>
                        </a>
                    </div>
                    <label class="w-full flex justify-between mb-2 text-gray-500 pb-2 relative form-checkbox" v-if="redeemedCoupon">
                        <span class="text-sm" v-if="coupon.busy">
                            Removing {{ redeemedCoupon.code }}
                        </span>
                        <span v-else>
                            <i class="fa fa-trash cursor-pointer" @click.prevent="remove"></i>
                            (<b>{{ redeemedCoupon.code }}</b> applied)
                        </span>
                        <span class="text-sm">
                            - ${{ redeemedCoupon.formatted_value }}
                        </span>
                    </label>
                    <p class="form-control-label text-red-light font-normal pb-4" v-show="coupon.errors.has('coupon')">
                        {{ coupon.errors.get('coupon') }}
                    </p>
                </div>
                <label class="w-full flex justify-between mb-2 text-gray-700 pb-2 relative form-checkbox">
                    <span class="text-lg font-thin">Total <span class="text-xs baseline-bottom text-gray-500">All prices are in NZD and include GST</span></span>
                    <span class="text-lg font-thin">${{ totalPrice }}</span>
                </label>
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
                    <i class="fa fa-btn fa-spinner fa-spin"></i> Processing
                </span>
                <span v-else>
                    Make Payment
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
        addons: {
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
            amount: 0,
            coupon: new SparkForm({
                coupon: null,
                id: this.listing.id,
            }),

            form: new SparkForm({
                addons: this.data.addons,
                currentStep: 3,
                coupon: null,
                id: this.listing.id,
            }),
            redeemedCoupon: this.listing.coupon,
            stripeHandler: null,
        }
    },

    computed: {
        totalPrice() {
            let self = this,
                total = this.data.plan.price;

            _.forEach(this.addons, function (addon) {
                _.forEach(self.form.addons, function (selected) {
                    if (addon.id === selected) {
                        total += addon.price;
                    }
                })
            });

            if (this.redeemedCoupon) {
                total -= this.redeemedCoupon.value;
            }

            this.amount = total;

            return Number(total / 100).toFixed(2);
        }
    },

    created() {
        this.stripeHandler = this.initStripe();
    },

    methods: {
        /**
         * Move back a step a plan
         */
        back() {
            this.$emit('back');
        },

        initStripe() {
            const handler = StripeCheckout.configure({
                key: Spark.stripeKey
            })
            window.addEventListener('popstate', () => {
                handler.close()
            })
            return handler
        },

        /**
         * Redeem the given coupon code.
         */
        redeem() {
            Spark.post(`/listing/${this.listing.id}/coupon/redeem`, this.coupon)
                .then((response) => {
                    this.coupon.coupon = '';
                    this.redeemedCoupon = response;
                });
        },

        /**
         * Remove the given coupon code from the listing.
         */
        remove() {
            Spark.post(`/listing/${this.listing.id}/coupon/remove`, this.coupon)
                .then((response) => {
                    this.coupon.coupon = '';
                    this.redeemedCoupon = null;
                });
        },

        submit() {
            Spark.put(`/listing/${this.listing.id}/update/addon`, this.form)
                .then(() => {
                    this.openStripe();
                });
        },

        openStripe(callback) {
            this.stripeHandler.open({
                name: 'Sharedspace Ltd',
                description: 'Activate your listing',
                currency: "nzd",
                allowRememberMe: false,
                panelLabel: 'Pay {{amount}}',
                amount: this.amount,
                image: '/img/sharedspace-condensed-logo.png',
                token: this.purchaseListing,
            })
        },

        purchaseListing(token) {
            this.processing = true
            axios.post(`/listing/${this.listing.id}/activate`, {
                amount: this.amount,
                email: token.email,
                listing: this.listing,
                payment_token: token.id,
            }).then(response => {
                window.location = `/listing/${this.listing.id}`;
            }).catch(response => {
                this.processing = false
            })
        },
    }
}
</script>
