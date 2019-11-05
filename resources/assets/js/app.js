
/*
 |--------------------------------------------------------------------------
 | Laravel Spark Bootstrap
 |--------------------------------------------------------------------------
 |
 | First, we will load all of the "core" dependencies for Spark which are
 | libraries such as Vue and jQuery. This also loads the Spark helpers
 | for things such as HTTP calls, forms, and form validation errors.
 |
 | Next, we'll create the root Vue application for Spark. This will start
 | the entire application and attach it to the DOM. Of course, you may
 | customize this script as you desire and load your own components.
 |
 */
require('spark-bootstrap');
require('./components/bootstrap');

import FormWizard from './components/listing/wizard/form-wizard.vue';
import SearchListings from './components/search/listings.vue';
import ShowListing from './components/listing/show.vue';
import Similar from './components/listing/similar.vue';

var app = new Vue({
    mixins: [require('./global')],
    components: {
        FormWizard,
        SearchListings,
        ShowListing,
        Similar
    }
});
