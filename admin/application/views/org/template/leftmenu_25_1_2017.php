
            <!-- BEGIN SIDEBAR -->
                        <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" >
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler"> </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                        <li class="sidebar-search-wrapper">
                            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                            <form class="sidebar-search  sidebar-search-bordered" action="page_general_search_3.html" method="POST">
                                <a href="javascript:;" class="remove">
                                    <i class="icon-close"></i>
                                </a>
<!--                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </span>
                                </div>-->
                            </form>
                            <!-- END RESPONSIVE QUICK SEARCH FORM -->
                        </li>
                        <li class="nav-item start <?php if($class == "org_dashboard") echo "active"; ?>">
                            <a href="<?php echo $base_url; ?>dashboard" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">Configure Account</span>
                                
                            </a>

                        </li>
                        
                        <li class="nav-item start <?php if($class == "org_managestu") echo "active"; ?>">
                            <a href="<?php echo $base_url; ?>managestu" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">Manage Student</span>
                                
                            </a>

                        </li>
                        
                        <li class="nav-item start <?php if($class == "org_manageins") echo "active"; ?>">
                            <a href="<?php echo $base_url; ?>manageins" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">Manage Instructor</span>
                                
                            </a>

                        </li>
                        
                        <li class="nav-item start <?php if($class == "org_manageparent") echo "active"; ?>">
                            <a href="<?php echo $base_url; ?>manageparent" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">Manage Parent</span>
                                
                            </a>

                        </li>
                        
<!--                        <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">Manage child</span>
                                
                            </a>

                        </li>-->
                         
                         <li class="nav-item <?php if($class == "org_managevenue") echo "active"; ?>">
                            <a href="<?php echo $base_url; ?>managevenue" class="nav-link">
                                <i class="icon-settings"></i>
                                <span class="title">Manage Venue</span>
                            </a>
                            
                        </li>
                        
                        <li class="nav-item <?php if($class == "org_manageevent") echo "active"; ?>">
                            <a href="<?php echo $base_url; ?>manageevent" class="nav-link">
                                <i class="icon-settings"></i>
                                <span class="title">Manage Event / excursion</span>
                            </a>
                            
                        </li>
                        
                        <li class="nav-item <?php if($class == "org_managegroup") echo "active"; ?>">
                            <a href="<?php echo $base_url; ?>managegroup" class="nav-link">
                                <i class="icon-settings"></i>
                                <span class="title">Manage Group</span>
                            </a>
                            
                        </li>
  
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
      