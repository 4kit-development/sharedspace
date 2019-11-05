<!-- Add Listing Modal -->
<transition name="fade">
    <div class="fixed inset-0 z-50 overflow-auto bg-smoke-400 flex hidden" id="modal-add-listing" tabindex="-1" role="dialog">
        <div class="flex self-center h-full">
            <div class="relative p-12 bg-white w-full max-w-sm m-auto flex-col ">
                <div class="modal-content">
                    <div class="modal-heading">
                        <h2>New Listing</h2>
                    </div>
                    <div class="modal-body">
                        <form role="form">
                            <div class="form-group" :class="{'is-invalid': form.errors.has('category')}">
                                <select class="form-control" v-model="form.category">
                                    <option :value="null" disabled>Select space category...</option>
                                    <option v-for="category in categories" :value="category.id">@{{ category.title }}</option>
                                </select>
                                <span class="invalid-feedback" v-show="form.errors.has('category')">
                                    @{{ form.errors.get('category') }}
                                </span>
                            </div>
                            <div class="form-group" :class="{'is-invalid': form.errors.has('address')}">
                                <input type="input" ref="autocomplete" class="form-control" placeholder="Type in the location of your space" />
                                <span class="invalid-feedback" v-show="form.errors.has('address')">
                                    @{{ form.errors.get('address') }}
                                </span>
                            </div>
                        </form>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer flex justify-center mt-6">
                        <a href="#" class="btn btn-teal-400 mt-0 lg:text-sm py-3" @click.prevent="sendCreateListingRequest" :disabled="form.busy">

                             <span v-if="form.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i> {{__('Creating listing')}}
                            </span>

                            <span v-else>
                                {{__('Create Listing')}}
                            </span>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</transition>
