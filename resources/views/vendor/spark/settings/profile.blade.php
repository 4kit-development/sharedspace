<spark-profile :user="user" inline-template>
    <div>
        <div class="sub-heading">
          <h3>My Profile</h3>
        </div>
        <div class="content">
          <!-- Update Profile Photo -->
          @include('spark::settings.profile.update-profile-photo')

          <!-- Update Contact Information -->
          @include('spark::settings.profile.update-contact-information')
      </div>

    </div>
</spark-profile>
