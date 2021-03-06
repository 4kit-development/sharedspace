<!-- NavBar For Authenticated Users -->
<spark-navbar
        :user="user"
        :teams="teams"
        :current-team="currentTeam"
        :unread-announcements-count="unreadAnnouncementsCount"
        :unread-notifications-count="unreadNotificationsCount"
        inline-template>

    <nav class="navbar navbar-light navbar-expand-md navbar-spark">
        <div class="container" v-if="user">
            <!-- Branding Image -->
            @include('spark::navigation.brand')

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    @includeIf('spark::navigation.user-left')
                </ul>

                <a @click="" class="mb-3 mb-md-0 mr-md-0 ml-md-4">
                  <el-badge :value="3" class="item">
                    <i class="el-icon-message"></i>
                  </el-badge>
                  Messages
                </a>

                <a @click="showNotifications" class="mb-3 mb-md-0 mr-md-0 ml-md-4">
                  <el-badge :value="notificationsCount" class="item">
                    <i class="el-icon-bell"></i>
                  </el-badge>
                  Notifications
                </a>

                <ul class="navbar-nav ml-4">
                    <li class="dropdown">
                        <a href="#" class="d-block d-md-flex text-center nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <span class="d-none d-md-block">
                              <i class="el-icon-setting"></i>
                              Settings
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <!-- Impersonation -->
                            @if (session('spark:impersonator'))
                                <h6 class="dropdown-header">{{__('Impersonation')}}</h6>

                                <!-- Stop Impersonating -->
                                <a class="dropdown-item" href="/spark/kiosk/users/stop-impersonating">
                                    <i class="fa fa-fw text-left fa-btn fa-user-secret"></i> {{__('Back To My Account')}}
                                </a>

                                <div class="dropdown-divider"></div>
                            @endif

                            <!-- Developer -->
                            @if (Spark::developer(Auth::user()->email))
                                @include('spark::navigation.developer')
                            @endif

                            <!-- Subscription Reminders -->
                            @include('spark::navigation.subscriptions')

                            <!-- Settings -->
                            <h6 class="dropdown-header">{{__('Settings')}}</h6>

                            <!-- Your Settings -->
                            <a class="dropdown-item" href="/settings">
                                <i class="fa fa-fw text-left fa-btn fa-cog"></i> {{__('Your Settings')}}
                            </a>

                            <div class="dropdown-divider"></div>

                            @if (Spark::usesTeams() && (Spark::createsAdditionalTeams() || Spark::showsTeamSwitcher()))
                                <!-- Team Settings -->
                                @include('spark::navigation.teams')
                            @endif

                            @if (Spark::hasSupportAddress())
                                <!-- Support -->
                                @include('spark::navigation.support')
                            @endif

                            <!-- Logout -->
                            <a class="dropdown-item" href="/logout">
                                <i class="fa fa-fw text-left fa-btn fa-sign-out"></i> {{__('Logout')}}
                            </a>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</spark-navbar>
