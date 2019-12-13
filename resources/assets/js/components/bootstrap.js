
/*
 |--------------------------------------------------------------------------
 | Laravel Spark Components
 |--------------------------------------------------------------------------
 |
 | Here we will load the Spark components which makes up the core client
 | application. This is also a convenient spot for you to load all of
 | your components that you write while building your applications.
 */

require('./../spark-components/bootstrap');

require('./header');

// Navigation
require('./navbar/navbar');

// Modal
require('./modal/modal');

// Listing Creation Wizard
require('./listing/wizard/form-features.vue');
require('./listing/wizard/form-general.vue');
require('./listing/wizard/form-preview.vue');
require('./listing/wizard/form-media.vue');

require('./listing/similar.vue');
