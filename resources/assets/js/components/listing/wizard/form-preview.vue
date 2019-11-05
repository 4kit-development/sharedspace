Vue.component('form-preview', {

    /**
     * The component's data.
     */
    data() {
        return {
            form: new SparkForm({
                plan: null,
            })
        }
    }
});
