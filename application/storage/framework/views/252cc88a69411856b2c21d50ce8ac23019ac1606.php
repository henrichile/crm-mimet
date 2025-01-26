<header class="topbar">

    <nav class="navbar top-navbar navbar-expand-md navbar-light">

        <div class="navbar-header">


            <?php if(request('dashboard_section') == 'settings'): ?>
            <!--exist-->
            <div class="sidenav-menu-item exit-panel m-b-17">
                <a class="waves-effect waves-dark text-info" href="/home" id="settings-exit-button"
                    aria-expanded="false" target="_self">
                    <i class="sl-icon-logout text-info"></i>
                    <span id="settings-exit-text"><?php echo e(cleanLang(__('lang.exit_settings'))); ?></span>
                </a>
            </div>
            <?php else: ?>
            <!--logo-->
            <div class="sidenav-menu-item logo m-t-0">
                <a class="navbar-brand" href="/home">
                    <img src="<?php echo e(runtimeLogoSmall()); ?>" alt="homepage" class="logo-small" />
                    <img src="<?php echo e(runtimeLogoLarge()); ?>" alt="homepage" class="logo-large" />
                </a>
            </div>
            <?php endif; ?>
        </div>


        <div class="navbar-collapse header-overlay" id="main-top-nav-bar">

            <div class="page-wrapper-overlay js-toggle-side-panel hidden" data-target=""></div>

            <ul class="navbar-nav mr-auto">

                <!--left menu toogle (hamburger menu) - main application -->
                <?php if(request('visibility_left_menu_toggle_button') == 'visible'): ?>
                <li class="nav-item main-hamburger-menu">
                    <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)">
                        <i class="sl-icon-menu"></i>
                    </a>
                </li>
                <li class="nav-item main-hamburger-menu">
                    <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark update-user-ux-preferences"
                        data-type="leftmenu" data-progress-bar="hidden" data-url=""
                        data-url-temp="<?php echo e(url('/')); ?>/<?php echo e(auth()->user()->team_or_contact); ?>/updatepreferences"
                        data-preference-type="leftmenu" href="javascript:void(0)">
                        <i class="sl-icon-menu"></i>
                    </a>
                </li>
                <?php endif; ?>


                <!--left menu toogle (hamburger menu) - settings section -->
                <?php if(request('visibility_settings_left_menu_toggle_button') == 'visible'): ?>
                <li class="nav-item settings-hamburger-menu hidden">
                    <a class="nav-link waves-effect waves-dark js-toggle-settings-menu" href="javascript:void(0)">
                        <i class="sl-icon-menu"></i>
                    </a>
                </li>
                <?php endif; ?>


                <!--[UPCOMING] search icon-->
                <li class="nav-item hidden-xs-down search-box hidden">
                    <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)">
                        <i class="icon-Magnifi-Glass2"></i>
                    </a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search & enter">
                        <a class="srh-btn">
                            <i class="ti-close"></i>
                        </a>
                    </form>
                </li>
            </ul>


            <!--RIGHT SIDE-->
            <ul class="navbar-nav navbar-top-right my-lg-0" id="right-topnav-navbar">

                <!-- event notifications -->
                <li class="nav-item dropdown" id="topnav-notification-dropdown"
                    data-url="<?php echo e(url('events/topnav?eventtracking_status=unread')); ?>" data-progress-bar='hidden'
                    data-loading-target="topnav-events-container">
                    <a class="nav-link dropdown-toggle p-t-10 font-23 waves-dark" href="javascript:void(0)"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="sl-icon-bell"></i>
                        <div class="notify <?php echo e(runtimeVisibilityNotificationIcon(auth()->user()->count_unread_notifications)); ?>"
                            id="topnav-notification-icon">
                            <span class="heartbit"></span>
                            <span class="point"></span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown top-nav-events">
                        <ul>
                            <li>
                                <div class="drop-title"><?php echo e(cleanLang(__('lang.notifications'))); ?></div>
                            </li>
                            <li>
                                <!--events container-->
                                <div class="message-center" id="topnav-events-container">
                                    <!--events added dynamically here-->
                                </div>
                            </li>
                            <li class="hidden" id="topnav-events-container-footer">
                                <a class="nav-link text-center " href="javascript:void(0);"
                                    id="topnav-notification-mark-all-read"
                                    data-url="<?php echo e(url('events/mark-allread-my-events')); ?>" data-progress-bar='hidden'>
                                    <strong><?php echo e(cleanLang(__('lang.dismiss_notifications'))); ?></strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--notifications -->


                <!-- settings -->
                <?php if(auth()->user()->is_admin): ?>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark font-22 p-t-10 p-r-10" href="/settings" id="32"
                        aria-expanded="false">
                        <i class="sl-icon-settings"></i>
                    </a>
                </li>
                <?php endif; ?>

                <!-- add content -->
                <?php if(auth()->user()->is_team && auth()->user()->can_add_content): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="javascript:void(0)"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-plus-circle-multiple-outline text-danger font-28"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">

                   
                        

                        <!-- lead -->
                        <?php if(auth()->user()->role->role_leads >= 2): ?>
                        <a href="javascript:void(0)"
                            class="dropdown-item dropdown-item-iconed edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                            data-toggle="modal" data-target="#commonModal"
                            data-url="<?php echo e(url('/leads/create?ref=quickadd')); ?>" data-loading-target="commonModalBody"
                            data-modal-title="<?php echo e(cleanLang(__('lang.add_lead'))); ?>"
                            data-action-url="<?php echo e(url('/leads?ref=quickadd')); ?>" data-action-method="POST"
                            data-action-ajax-loading-target="commonModalBody" data-save-button-class=""
                            data-project-progress="0">
                            <i class="sl-icon-call-in"></i> <?php echo e(cleanLang(__('lang.lead'))); ?></a>
                        <?php endif; ?>

                     
                <!-- profile -->
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle p-l-20 p-r-20 waves-dark profile-pic" href="javascript:void(0)"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo e(auth()->user()->avatar); ?>" id="topnav_avatar" alt="user" class="" />
                        <span class="hidden-md-down" id="topnav_username"><?php echo e(auth()->user()->first_name); ?>

                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="<?php echo e(auth()->user()->avatar); ?>"
                                            id="topnav_dropdown_avatar" alt="user"></div>
                                    <div class="u-text">
                                        <h4 id="topnav_dropdown_full_name"><?php echo e(auth()->user()->first_name); ?>

                                            <?php echo e(auth()->user()->last_name); ?></h4>
                                        <p class="text-muted" id="topnav_dropdown_email"><?php echo e(auth()->user()->email); ?></p>
                                        <a href="javascript:void(0)"
                                            class="btn btn-rounded btn-danger btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                                            data-toggle="modal" data-target="#commonModal"
                                            data-url="<?php echo e(url('/user/avatar')); ?>" data-loading-target="commonModalBody"
                                            data-modal-size="modal-sm"
                                            data-modal-title="<?php echo e(cleanLang(__('lang.update_avatar'))); ?>"
                                            data-header-visibility="hidden" data-header-extra-close-icon="visible"
                                            data-action-url="<?php echo e(url('/user/avatar')); ?>"
                                            data-action-method="PUT"><?php echo e(cleanLang(__('lang.update_avatar'))); ?></a>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <!--my profile-->
                            <li>
                                <a href="javascript:void(0)"
                                    class="edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                                    data-toggle="modal" data-target="#commonModal"
                                    data-url="<?php echo e(url('/contacts/'.auth()->id().'/edit?type=profile')); ?>"
                                    data-loading-target="commonModalBody"
                                    data-modal-title="<?php echo e(cleanLang(__('lang.update_my_profile'))); ?>"
                                    data-action-url="<?php echo e(url('/contacts/'.auth()->id())); ?>" data-action-method="PUT"
                                    data-action-ajax-class="" data-modal-size="modal-lg"
                                    data-action-ajax-loading-target="team-td-container">
                                    <i class="ti-user p-r-4"></i>
                                    <?php echo e(cleanLang(__('lang.update_my_profile'))); ?></a>
                            </li>


                            

                            <!--update notifcations-->
                            <li>
                                <a href="javascript:void(0)" id="topnavUpdateNotificationsButton"
                                    class="edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                                    data-toggle="modal" data-target="#commonModal"
                                    data-url="<?php echo e(url('user/updatenotifications')); ?>"
                                    data-loading-target="commonModalBody"
                                    data-modal-title="<?php echo e(cleanLang(__('lang.notification_settings'))); ?>"
                                    data-action-url="<?php echo e(url('user/updatenotifications')); ?>" data-action-method="PUT"
                                    data-modal-size="modal-lg" data-form-design="form-material"
                                    data-header-visibility="hidden" data-header-extra-close-icon="visible"
                                    data-action-ajax-class="js-ajax-ux-request"
                                    data-action-ajax-loading-target="commonModalBody">
                                    <i class="sl-icon-bell p-r-4"></i>
                                    <?php echo e(cleanLang(__('lang.notification_settings'))); ?></a>
                            </li>

                            <!--update password-->
                            <li>
                                <a href="javascript:void(0)" id="topnavUpdatePasswordButton"
                                    class="edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                                    data-toggle="modal" data-target="#commonModal"
                                    data-url="<?php echo e(url('user/updatepassword')); ?>" data-loading-target="commonModalBody"
                                    data-modal-title="<?php echo e(cleanLang(__('lang.update_password'))); ?>"
                                    data-action-url="<?php echo e(url('user/updatepassword')); ?>" data-action-method="PUT"
                                    data-action-ajax-class="" data-modal-size="modal-sm"
                                    data-form-design="form-material" data-header-visibility="hidden"
                                    data-header-extra-close-icon="visible"
                                    data-action-ajax-loading-target="commonModalBody">
                                    <i class="ti-lock p-r-4"></i>
                                    <?php echo e(cleanLang(__('lang.update_password'))); ?></a>
                            </li>

                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="/logout">
                                    <i class="fa fa-power-off p-r-4"></i> <?php echo e(cleanLang(__('lang.logout'))); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- /#profile -->
            </ul>
        </div>
    </nav>
                <?php endif; ?>


</header><?php /**PATH /home/crmhuelen/public_html/application/resources/views/nav/topnav.blade.php ENDPATH**/ ?>