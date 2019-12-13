<template>
    <form class="w-full">
        <div class="flex flex-wrap mb-6 justify-between">
            <div class="w-full md:w-2/3 form-group mb-6">
                <div class="mb-10">
                    <h4 class="mb-4">Image uploads</h4>
                    <p class="text-sm">Upload up to 8 photos. Drag photos to put them in the order user will see.</p>
                </div>
                <sortable-list class="flex flex-wrap w-full p-0 relative overflow-hidden" v-model="form.images" @updateImageOrder="processImageOrder">
                    <div slot-scope="{ items }">
                        <div class="uppercase bg-yellow-600 text-xs font-extrabold absolute px-6 py-1 top-0 mt-2 -ml-2 z-40">Cover Photo</div>
                        <sortable-item v-for="(image, index) in items" :key="image.id" class="mb-3 px-3 w-1/2 overflow-hidden sm:w-1/2 md:w-1/3 lg:w-1/4">
                            <template v-if="image.empty">
                                <div class="not-draggable">
                                    <div class="relative h-full">
                                        <label class="p-1/4 sm:p-1/4 md:p-1/5 lg:p-1/5 w-full h-full rounded flex flex-wrap items-center justify-center cursor-pointer bg-gray-200">
                                            <i class="flex items-center justify-center fa fa-plus mb-2 text-gray-600 border-dashed border border-gray-600 px-1 py-1"></i>
                                            <span class="w-full flex items-center justify-center text-xs text-gray-600 text-center">
                                                Add photo
                                            </span>
                                            <input ref="photo" type="file" class="hidden" :name="'photo[' + index + ']'" @change="upload(index)" :disabled="form.busy">
                                        </label>
                                    </div>
                                </div>
                            </template>
                            <template v-else>
                                <div class="draggable">
                                    <div class="relative">
                                        <img :src="image.url" class="rounded"/>
                                        <span class="absolute text-white top-0 right-0 w-full h-full cursor-move bg-smoke-200 rounded">
                                            <i @click="removeImage(index)" class="fa fa-times right-0 top-0 absolute pr-2 pt-2 cursor-pointer"></i>
                                        </span>
                                    </div>
                                </div>
                            </template>
                        </sortable-item>
                    </div>
                </sortable-list>
            </div>
            <div class="w-full md:w-1/4 form-group mb-6">
                <div class="mb-10">
                    <h4 class="mb-4">Video upload</h4>
                    <p class="text-sm"><i class="fa fa-circle-o premium-band font-black"></i> Only available for premium listings. </p>
                </div>
                <template v-if="form.video">
                    <div class="video-container">
                        <iframe width="100%" :src="'//www.youtube.com/embed/' + parseVideo()" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"></iframe>
                    </div>
                </template>
                <template v-else>
                    <div class="p-1/4 w-full rounded bg-gray-400 flex items-center justify-center flex-col mb-4">
                        <i class="fa fa-plus mb-2 text-gray-600 border-dashed border border-gray-600 px-1 py-1"></i>
                        <span class="text-xs text-gray-600 text-center">
                            Add Video url below <br />to save the video.
                        </span>
                    </div>

                </template>
                <div class="form-group">
                    <textarea class="form-control focus:bg-white" name="video" @input="parseVideo" v-model="form.video" placeholder="Insert active URL link. " :class="{'is-invalid': form.errors.has('video')}"></textarea>
                    <p class="form-control-label text-red-light font-normal pb-4" v-show="form.errors.has('video')">
                        {{ form.errors.get('video') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="flex justify-between">
            <a href="#" class="btn btn-no-border mt-0 lg:text-sm py-3" @click.prevent="back" >
                <span>
                    <i class="fa fa-long-arrow-left text-lg"></i> Back
                </span>
            </a>
            <a href="#" class="btn btn-teal-400 mt-0 lg:text-sm py-3 px-8" @click.prevent="submit" :disabled="form.busy">
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

import SortableList from '../../sorting/SortableList'
import SortableItem from '../../sorting/SortableItem'

export default {

    components: {
        SortableList,
        SortableItem
    },

    props: {
        listing: {
            type: Object,
            required: true
        },
        images: {
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
            form: new SparkForm({
                currentStep: 4,
                id: this.listing.id,
                images: this.images,
                video: this.listing.video
            }),
            loading: false,
        }
    },
    mounted() {
        this.generateEmptyItems()
    },
    methods: {
        /**
         * Move back a step a plan
         */
        back() {
            this.$emit('back');
        },

        checkFilledImages(index) {
            return index === 0 && !this.form.images;
        },

        generateEmptyItems() {
            let difference = 9 - this.form.images.length;

            for(let i = 0; i < difference; i++) {
                this.form.images.push({
                    id: i + 99999999,
                    empty: true,
                    loading: false,
                });
            }
        },

        parseVideo() {
            var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            var match = this.form.video.match(regExp);

            if (match && match[2].length == 11) {
                return match[2];
            }

            return 'error';
        },

        processImageOrder() {
            axios.post(`/listing/${this.listing.id}/images/updateOrder`, _.map(this.form.images, 'id'));
        },

        removeImage(index) {
            axios.post(`/listing/${this.listing.id}/images/remove`, this.form.images[index]);
            this.form.images.splice(index, 1);
            this.form.images.push({
                id: this.form.images.length + 99999999,
                empty: true,
                loading: false
            });
        },

        submit() {
            let self = this;
            Spark.put(`/listing/${this.listing.id}/update/media`, this.form)
                .then(() => {
                    self.$emit('update', {
                        currentStep: this.form.currentStep,
                    });
                });
        },

        /**
         * Update the listing images.
         */
        upload(index) {
            let uploadedImage = [];

            _.forEach(this.$refs.photo, function(photo) {
                if ( photo.files.length) {
                    uploadedImage = photo;
                }
            });

            if(!uploadedImage) {
                return
            }

            this.form.images[index].loading = true;

            // We need to gather a fresh FormData instance with the profile photo appended to
            // the data so we can POST it up to the server. This will allow us to do async
            // uploads of the profile photos. We will update the user after this action.
            axios.post(`/listing/${this.listing.id}/images/upload`, this.gatherFormData(uploadedImage))
                .then(
                    (response) => {
                        this.form.images.splice(index, 1);
                        this.form.images.splice(index, 0, response.data);
                        this.form.images[index].loading = false;
                    },
                    (error) => {
                        this.form.setErrors(error.response.data.errors);
                        this.form.images[index].loading = false;
                    }
                );
        },

        /**
         * Gather the form data for the photo upload.
         */
        gatherFormData(uploadedImage) {
            const data = new FormData();

            data.append('photo', uploadedImage.files[0]);

            return data;
        }
    }
};
</script>
