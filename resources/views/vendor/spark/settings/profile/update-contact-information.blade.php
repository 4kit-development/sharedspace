<spark-update-contact-information :user="user" inline-template>
  <div v-if="user">
    <!-- Success Message -->
    <div class="alert alert-success" v-if="form.successful">
        {{__('Your contact information has been updated!')}}
    </div>

    <form role="form">
        <!-- Name -->
        <div class="form-group">
          <label>{{__('Name')}}</label>
          <input type="text" class="form-control" name="name" v-model="form.name" :class="{'is-invalid': form.errors.has('name')}">
          <span class="invalid-feedback" v-show="form.errors.has('name')">
              @{{ form.errors.get('name') }}
          </span>
        </div>

        <!-- E-Mail Address -->
        <div class="form-group">
          <label>{{__('E-Mail Address')}}</label>
          <input type="email" class="form-control" name="email" v-model="form.email" :class="{'is-invalid': form.errors.has('email')}">
          <span class="invalid-feedback" v-show="form.errors.has('email')">
              @{{ form.errors.get('email') }}
          </span>
        </div>

        <!-- Update Button -->
        <div class="page-footer">
            <div class="page-footer__inner container">
                <div class="row">
                    <div class="offset-md-6 col-md-6 text-right">
                      <button type="submit" class="btn btn-primary"
                              @click.prevent="update"
                              :disabled="form.busy">
                          {{__('Update')}}
                      </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
  </div>
</spark-update-contact-information>
