<spark-update-profile-photo :user="user" inline-template>
    <div v-if="user">

      <div class="alert alert-danger" v-if="form.errors.has('photo')">
          @{{ form.errors.get('photo') }}
      </div>

      <form role="form">
        <div class="form-group">
          <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <div class="image-placeholder mr-4">
                    <span role="img" class="profile-photo-preview" :style="previewStyle"></span>
                </div>
                <div class="spark-uploader mr-4">
                    <input ref="photo" type="file" class="spark-uploader-control" name="photo" @change="update" :disabled="form.busy">
                    <div><u>{{__('Change profile photo')}}</u></div>
                </div>
            </div>
          </div>
        </div>
      </form>
    </div>
</spark-update-profile-photo>
