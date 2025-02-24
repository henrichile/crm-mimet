<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" id="js-trigger-nav-team">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" id="main-scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav" id="main-sidenav">
            <ul id="sidebarnav">



                <!--home-->
                <li class="sidenav-menu-item <?php echo e($page['mainmenu_home'] ?? ''); ?> menu-tooltip menu-with-tooltip"
                    title="<?php echo e(cleanLang(__('lang.home'))); ?>">
                    <a class="waves-effect waves-dark" href="/home" aria-expanded="false" target="_self">
                        <i class="ti-home"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.dashboard'))); ?>

                        </span>
                    </a>
                </li>
                <!--home-->


                <!--users
                <?php if(auth()->user()->role->role_clients >= 1 || auth()->user()->role->role_contacts >= 1): ?>
                <li class="sidenav-menu-item <?php echo e($page['mainmenu_customers'] ?? ''); ?>">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="sl-icon-people"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.customers'))); ?>

                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <?php if(auth()->user()->role->role_clients >= 1): ?>
                        <li class="sidenav-submenu <?php echo e($page['submenu_customers'] ?? ''); ?>" id="submenu_clients">
                            <a href="/clients"
                                class="<?php echo e($page['submenu_customers'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.clients'))); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php if(auth()->user()->role->role_contacts >= 1): ?>
                        <li class="sidenav-submenu <?php echo e($page['submenu_contacts'] ?? ''); ?>" id="submenu_contacts">
                            <a href="/users"
                                class="<?php echo e($page['submenu_contacts'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.client_users'))); ?></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                -->

                <!--projects projects-->
                <?php if(auth()->user()->role->role_projects >= 1): ?>
                <li class="sidenav-menu-item <?php echo e($page['mainmenu_projects'] ?? ''); ?> menu-tooltip menu-with-tooltip"
                    title="<?php echo e(cleanLang(__('lang.projects'))); ?>">
                    <a class="waves-effect waves-dark" href="/projects" aria-expanded="false" target="_self">
                        <i class="ti-folder"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.projects'))); ?>

                        </span>
                    </a>
                </li>
                <?php endif; ?>
               


                <!--tasks-->
                <?php if(auth()->user()->role->role_tasks >= 1): ?>
                <li class="sidenav-menu-item <?php echo e($page['mainmenu_tasks'] ?? ''); ?> menu-tooltip menu-with-tooltip"
                    title="<?php echo e(cleanLang(__('lang.tasks'))); ?>">
                    <a class="waves-effect waves-dark" href="/tasks" aria-expanded="false" target="_self">
                        <i class="ti-menu-alt"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.tasks'))); ?>

                        </span>
                    </a>
                </li>
                <?php endif; ?>
                <!--tasks-->
                
               <!--leads-->
                <?php if(auth()->user()->role->role_leads >= 1): ?>
                <li class="sidenav-menu-item <?php echo e($page['mainmenu_leads'] ?? ''); ?> menu-tooltip menu-with-tooltip"
                    title="<?php echo e(cleanLang(__('lang.leads'))); ?>">
                    <a class="waves-effect waves-dark" href="/leads" aria-expanded="false" target="_self">
                        <i class="sl-icon-call-in"></i>
                        <span class="hide-menu">Leads Total
                        </span>
                    </a>
                </li>
                <?php endif; ?>
                <!--leads-->
                 <!--billing
                
                 <?php if(auth()->user()->role->role_items >= 1 && auth()->user()->id==1): ?>
                <li class="sidenav-submenu <?php echo e($page['submenu_products'] ?? ''); ?>" id="submenu_products">
                            <a href="/products"
                                class=" <?php echo e($page['submenu_products'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.products'))); ?></a>
                </li>

               
                <?php if(auth()->user()->role->role_invoices >= 1 || auth()->user()->role->role_estimates >= 1 || auth()->user()->role->role_items >= 1 ||
                auth()->user()->role->role_expenses >= 1): ?>
                <li class="sidenav-menu-item <?php echo e($page['mainmenu_sales'] ?? ''); ?>">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="ti-wallet"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.sales'))); ?>

                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <?php if(auth()->user()->role->role_invoices >= 1): ?>
                        <li class="sidenav-submenu <?php echo e($page['submenu_invoices'] ?? ''); ?>" id="submenu_invoices">
                            <a href="/invoices"
                                class=" <?php echo e($page['submenu_invoices'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.invoices'))); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php if(auth()->user()->role->role_invoices >= 1): ?>
                        <li class="sidenav-submenu <?php echo e($page['submenu_payments'] ?? ''); ?>" id="submenu_payments">
                            <a href="/payments"
                                class=" <?php echo e($page['submenu_payments'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.payments'))); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php if(auth()->user()->role->role_estimates >= 1): ?>
                        <li class="sidenav-submenu <?php echo e($page['submenu_estimates'] ?? ''); ?>" id="submenu_estimates">
                            <a href="/estimates"
                                class=" <?php echo e($page['submenu_estimates'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.estimates'))); ?></a>
                        </li>
                        <?php endif; ?>
                       
                        <?php endif; ?>
                        <?php if(auth()->user()->role->role_expenses >= 1): ?>
                        <li class="sidenav-submenu <?php echo e($page['submenu_expenses'] ?? ''); ?>" id="submenu_expenses">
                            <a href="/expenses"
                                class=" <?php echo e($page['submenu_expenses'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.expenses'))); ?></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
               


                

                <!--subscriptions
                <li class="sidenav-menu-item <?php echo e($page['mainmenu_subscription'] ?? ''); ?> menu-tooltip menu-with-tooltip"
                    title="<?php echo e(cleanLang(__('lang.subscriptions'))); ?>">
                    <a class="waves-effect waves-dark p-r-20" href="/subscriptions" aria-expanded="false"
                        target="_self">
                        <i class="sl-icon-layers"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.subscriptions'))); ?>

                        </span>
                    </a>
                </li>


               
                <?php if(auth()->user()->role->role_tickets >= 1): ?>
                <li class="sidenav-menu-item <?php echo e($page['mainmenu_tickets'] ?? ''); ?> menu-tooltip menu-with-tooltip"
                    title="<?php echo e(cleanLang(__('lang.tickets'))); ?>">
                    <a class="waves-effect waves-dark" href="/tickets" aria-expanded="false" target="_self">
                        <i class="ti-comments"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.support'))); ?>

                        </span>
                    </a>
                </li>
                <?php endif; ?>
                tickets-->


                <!--knowledgebase
                <?php if(auth()->user()->role->role_knowledgebase >= 1): ?>
                <li class="sidenav-menu-item <?php echo e($page['mainmenu_kb'] ?? ''); ?> menu-tooltip menu-with-tooltip"
                    title="<?php echo e(cleanLang(__('lang.knowledgebase'))); ?>">
                    <a class="waves-effect waves-dark p-r-20" href="/knowledgebase" aria-expanded="false"
                        target="_self">
                        <i class="sl-icon-docs"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.knowledgebase'))); ?>

                        </span>
                    </a>
                </li>
                <?php endif; ?>
                knowledgebase-->


                <!--team-->
                <?php if(auth()->user()->is_admin): ?>
                <li class="sidenav-menu-item <?php echo e($page['mainmenu_settings'] ?? ''); ?>">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="ti-panel"></i>
                        <span class="hide-menu"><?php echo e(cleanLang(__('lang.other'))); ?>

                        </span>
                    </a>
                    <ul aria-expanded="false" class="position-top collapse">
                        <li class="sidenav-submenu mainmenu_team <?php echo e($page['submenu_team'] ?? ''); ?>" id="submenu_team">
                            <a href="/team"
                                class="<?php echo e($page['submenu_team'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.team_members'))); ?></a>
                        </li>
                       <!-- <li class="sidenav-submenu mainmenu_timesheets <?php echo e($page['submenu_timesheets'] ?? ''); ?>" 
                            id="submenu_timesheets">
                            <a href="/timesheets"
                                class="<?php echo e($page['submenu_timesheets'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.time_sheets'))); ?></a>
                        </li>
                        -->
                        <li class="sidenav-submenu mainmenu_reports <?php echo e($page['submenu_reports'] ?? ''); ?> "
                            id="submenu_reports">
                            <a href="/reports"
                                class="<?php echo e($page['submenu_reports'] ?? ''); ?>"><?php echo e(cleanLang(__('lang.reports'))); ?></a>
                        </li>
                    </ul>
                </li>
               
                <?php endif; ?>
                <!--team-->


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside><?php /**PATH /home/mimet.etasoft.cl/public_html/application/resources/views/nav/leftmenu-team.blade.php ENDPATH**/ ?>