
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
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
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
                        <li class="nav-item start <?php if($class == "admin_dashboard") echo "active"; ?>" >
                            <a href="<?php echo $base_url; ?>dashboard" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">Organization Registration</span>
                                
                            </a>
       
                        </li>
                        
                        <li class="nav-item start <?php if($class == "admin_manageorg") echo "active"; ?>">
                            <a href="<?php echo $base_url; ?>manageorg" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">Manage Organization</span>
                                
                            </a>

                        </li>
                        
                         <li class="nav-item start <?php if($class == "admin_managepar") echo "active"; ?>">
                            <a href="<?php echo $base_url; ?>managepar" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">Manage Parent</span>
                                
                            </a>

                        </li>
                        <li class="nav-item start  <?php if($class == "admin_payingstu") echo "active"; ?>">
                            <a href="<?php echo $base_url; ?>payingstu/view" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">View List of Paying Students for an Organization</span>
                                
                            </a>

                        </li>
                        <li class="nav-item start  <?php if($class == "admin_invoice") echo "active"; ?>">
                            <a href="<?php echo $base_url; ?>invoice" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">Generate Invoice</span>
                                
                            </a>

                        </li>
                        <li class="nav-item start  <?php if($class == "pricing") echo "active"; ?>">
                            <a href="<?php echo $base_url; ?>pricing" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">Pricing Plans</span>
                                
                            </a>

                        </li>
                        
<!--                        <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">Track Number of registration by Organizations to be reported</span>
                                
                            </a>

                        </li>-->
<!--                        
                        <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">Assign Tracker Devices to Schools</span>
                                
                            </a>

                        </li>
                        

                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Push Notifications</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                            	
                                <li class="nav-item  ">
                                    <a href="" class="nav-link ">
                                        <span class="title">Training Times</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item  ">
                                    <a href="" class="nav-link ">
                                        <span class="title">Weather Warning</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item  ">
                                    <a href="" class="nav-link ">
                                        <span class="title">Cancellation</span>
                                    </a>
                                </li>
                                
                                

                            </ul>
                        </li>
                        
                        <li class="nav-item ">
                            <a href="javascript:;" class="nav-link">
                                <i class="icon-settings"></i>
                                <span class="title">Manage User Database for Push Notifications Future Data Use</span>
                            </a>
                            
                        </li>
                        -->
                        
  
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
      