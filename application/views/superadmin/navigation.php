    
<div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
    <!-- Sidebar -->
    <nav id="sidebar">
        <!-- Sidebar Scroll Container -->
        <div id="sidebar-scroll">
            <!-- Sidebar Content -->
            <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
            <div class="sidebar-content">
                <!-- Side Header -->
                <div class="side-header side-content bg-white-op">
                    <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                    <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times"></i>
                    </button>
                    <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                    <div class="btn-group pull-right">
                        <button class="btn btn-link text-gray dropdown-toggle" data-toggle="dropdown" type="button">
                            <i class="si si-drop"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right font-s13 sidebar-mini-hide">
                            <li>
                                <a data-toggle="theme" data-theme="default" tabindex="-1" href="javascript:void(0)">
                                    <i class="fa fa-circle text-default pull-right"></i> <span class="font-w600">Default</span>
                                </a>

                            </li>
                            <li id="test">
                                <a data-toggle="theme" data-theme="<?= base_url(); ?>assets/css/themes/amethyst.min.css" tabindex="-1" href="javascript:void(0)">
                                    <i class="fa fa-circle text-amethyst pull-right"></i> <span class="font-w600">Amethyst</span>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="theme" data-theme="<?= base_url(); ?>assets/css/themes/city.min.css" tabindex="-1" href="javascript:void(0)">
                                    <i class="fa fa-circle text-city pull-right"></i> <span class="font-w600">City</span>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="theme" data-theme="<?= base_url(); ?>assets/css/themes/flat.min.css" tabindex="-1" href="javascript:void(0)">
                                    <i class="fa fa-circle text-flat pull-right"></i> <span class="font-w600">Flat</span>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="theme" data-theme="<?= base_url(); ?>assets/css/themes/modern.min.css" tabindex="-1" href="javascript:void(0)">
                                    <i class="fa fa-circle text-modern pull-right"></i> <span class="font-w600">Modern</span>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="theme" data-theme="<?= base_url(); ?>assets/css/themes/smooth.min.css" tabindex="-1" href="javascript:void(0)">
                                    <i class="fa fa-circle text-smooth pull-right"></i> <span class="font-w600">Smooth</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <a class="h5 text-white" href="index.html">
                        <i class="fa fa-ravelry text-primary"></i> <span class="h4 font-w600 sidebar-mini-hide">Hms</span>
                    </a>
                </div>
                <!-- END Side Header -->
                <!-- Side Content -->
                <div class="side-content">
                    <ul class="nav-main">
                        <li>
                            <a href="base_pages_dashboard.html"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                        </li>
                        <li class="nav-main-heading"><span class="sidebar-mini-hide">User Configuration</span></li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Users</span></a>
                            <ul class="linkstohref">
                                <li>
                                    <a href="<?=site_url('sadmin/getUsers');?>">All Users</a>
                                </li>
                                <li>
                                    <a href="base_ui_blocks_api.html">Roles and Privilages</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">General</span></a>
                            <ul class="linkstohref">
                                <li>
                                    <a href="<?=site_url('sadmin/hotelInfo');?>">Hotel Info</a>
                                </li>
                                <li>
                                    <a href="<?=site_url('taxservices');?>">Tax and services</a>
                                </li>
                                <li>
                                    <a href="<?=site_url('messages');?>">Messages</a>
                                </li>                                
                            </ul>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Frontoffice Conf</span></a>
                            <ul class="linkstohref">
                                <li>
                                    <a href="<?=site_url('units/types');?>">Rooms and Floor Types</a>
                                </li>
                                <li>
                                    <a href="<?=site_url('units/roommaster');?>">Room Master</a>
                                </li>                                        
                            </ul>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Menu Configuration</span></a>
                            <ul class="linkstohref">
                                <li>
                                    <a href="<?=site_url('units/menu');?>">Menu Category</a>
                                </li>
                                <li>
                                    <a href="<?=site_url('units/menumaster');?>">Menu Master</a>
                                </li>                                        
                            </ul>
                        </li> 
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Restaurant Conf</span></a>
                            <ul class="linkstohref">
                                <li>
                                    <a href="<?=site_url('restaurant/tablemaster');?>">Table Master</a>
                                </li>
                                <li>
                                    <a href="<?=site_url('restaurant/advanceBooking');?>">Booking</a>
                                </li>    
                                <li>
                                    <a href="<?=site_url('pos');?>">Point of Sales</a>
                                </li>                                                                        
                            </ul>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Bar Conf</span></a>
                            <ul class="linkstohref">
                                <li>
                                    <a href="<?=site_url('bar/tablemaster');?>">Table Master</a>
                                </li>
                                <li>
                                    <a href="<?=site_url('bar/advanceBooking');?>">Booking</a>
                                </li>                                        
                            </ul>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Front Office</span></a>
                            <ul class="linkstohref">
                                <li>
                                    <a href="<?=site_url('frontoffice/home');?>">Home</a>
                                </li>
                                <li>
                                    <a href="<?=site_url('frontoffice/advanceBooking');?>">Advance Booking</a>
                                </li>  
                                <li>
                                    <a href="<?=site_url('Guests');?>">Guests</a>
                                </li>                                                                        
                            </ul>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Promotions</span></a>
                            <ul class="linkstohref">
                                <li>
                                    <a href="<?=site_url('promotions');?>">Home</a>
                                </li>
                            </ul>
                        </li>                                                    

                    </ul>
                </div>
                <!-- END Side Content -->
            </div>
            <!-- Sidebar Content -->
        </div>
        <!-- END Sidebar Scroll Container -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="header-navbar" class="content-mini content-mini-full">
        <!-- Header Navigation Right -->
        <ul class="nav-header pull-right">
            <li>

                <div class="btn-group">
                    <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                        <img src="<?= base_url(); ?>assets/img/avatars/avatar10.jpg" alt="Avatar">
                        <span class="caret"></span>
                    </button>
            <span class="badge badge-primary pull-right" id="newMessages"></span>
            &nbsp;
            <span class="badge badge-danger pull-right" id="pendingMessages"></span>                    
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-header">Notifications</li>
                        <li>
                            <a tabindex="-1" href="<?= site_url("messages") ?>">
                                <i class="si si-envelope-open pull-right"></i>
                                Messages
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Actions</li>
                        <li>
                            <a tabindex="-1" href="base_pages_lock.html">
                                <i class="si si-lock pull-right"></i>Lock Account
                            </a>
                        </li>
                        <li>
                            <a tabindex="-1" href="<?= site_url("login/signout");?>">
                                <i class="si si-logout pull-right"></i>Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <!-- END Header Navigation Right -->

        <!-- Header Navigation Left -->
        <ul class="nav-header pull-left">
            <li class="hidden-md hidden-lg">
                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                    <i class="fa fa-navicon"></i>
                </button>
            </li>
            <li class="hidden-xs hidden-sm">
                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                    <i class="fa fa-ellipsis-v"></i>
                </button>
            </li>

            <li class="hidden-xs hidden-sm">
                    <a class="h5" href="#">
                        <i class="fa fa-user text-primary"></i> <span class="h5 font-w500 text-primary">Welcome <?php echo $this->session->userdata('logged_user'); ?></span>
                    </a>

            </li>
        </ul>
        <!-- END Header Navigation Left -->
    </header>
    <!-- END Header -->
<script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>

<script >
    
$("document").ready(function(){
        var url = "<?= site_url("messages/getCountsForPages") ?>";
        $.ajax({
            type: "GET",
            url: url,
            dataType:'json',
            success: function(data){
                if (data.countAllNewMessages > 0) {
                    $("#newMessages").html(data.countAllNewMessages);
                }else{
                    $("#newMessages").html("");
                }

                if (data.countCheckouNewMessages > 0) {
                    $("#pendingMessages").html(data.countCheckouNewMessages);
                }else{
                    $("#pendingMessages").html("");
                }
            }
        });      
})
</script>