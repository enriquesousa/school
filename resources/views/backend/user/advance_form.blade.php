<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>Sunny Admin - Dashboard Advanced form elements </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary">
    <div class="wrapper">

        <header class="main-header">
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top pl-30">
                <!-- Sidebar toggle button-->
                <div>
                    <ul class="nav">
                        <li class="btn-group nav-item">
                            <a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon"
                                data-toggle="push-menu" role="button">
                                <i class="nav-link-icon mdi mdi-menu"></i>
                            </a>
                        </li>
                        <li class="btn-group nav-item">
                            <a href="#" data-provide="fullscreen"
                                class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
                                <i class="nav-link-icon mdi mdi-crop-free"></i>
                            </a>
                        </li>
                        <li class="btn-group nav-item d-none d-xl-inline-block">
                            <a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="">
                                <i class="ti-check-box"></i>
                            </a>
                        </li>
                        <li class="btn-group nav-item d-none d-xl-inline-block">
                            <a href="calendar.html" class="waves-effect waves-light nav-link rounded svg-bt-icon"
                                title="">
                                <i class="ti-calendar"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="navbar-custom-menu r-side">
                    <ul class="nav navbar-nav">
                        <!-- full Screen -->
                        <li class="search-bar">
                            <div class="lookup lookup-circle lookup-right">
                                <input type="text" name="s">
                            </div>
                        </li>
                        <!-- Notifications -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="waves-effect waves-light rounded dropdown-toggle" data-toggle="dropdown"
                                title="Notifications">
                                <i class="ti-bell"></i>
                            </a>
                            <ul class="dropdown-menu animated bounceIn">

                                <li class="header">
                                    <div class="p-20">
                                        <div class="flexbox">
                                            <div>
                                                <h4 class="mb-0 mt-0">Notifications</h4>
                                            </div>
                                            <div>
                                                <a href="#" class="text-danger">Clear All</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu sm-scrol">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc
                                                suscipit blandit.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu
                                                sapien elementum, in semper
                                                diam posuere.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor
                                                commodo porttitor pretium
                                                a erat.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et
                                                nisi
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero
                                                dictum fermentum.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-primary"></i> Nunc fringilla lorem
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam
                                                interdum, at scelerisque
                                                ipsum imperdiet.
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all</a>
                                </li>
                            </ul>
                        </li>

                        <!-- User Account-->
                        <li class="dropdown user user-menu">
                            <a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0"
                                data-toggle="dropdown" title="User">
                                <img src="../images/avatar/1.jpg" alt="">
                            </a>
                            <ul class="dropdown-menu animated flipInX">
                                <li class="user-body">
                                    <a class="dropdown-item" href="#"><i class="ti-user text-muted mr-2"></i>
                                        Profile</a>
                                    <a class="dropdown-item" href="#"><i class="ti-wallet text-muted mr-2"></i> My
                                        Wallet</a>
                                    <a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i>
                                        Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"><i class="ti-lock text-muted mr-2"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light">
                                <i class="ti-settings"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar">

                <div class="user-profile">
                    <div class="ulogo">
                        <a href="index.html">
                            <!-- logo for regular state and mobile devices -->
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="../images/logo-dark.png" alt="">
                                <h3><b>Sunny</b> Admin</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">

                    <li>
                        <a href="index.html">
                            <i data-feather="pie-chart"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="message-circle"></i>
                            <span>Application</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="chat.html"><i class="ti-more"></i>Chat</a></li>
                            <li><a href="calendar.html"><i class="ti-more"></i>Calendar</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="mail"></i> <span>Mailbox</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="mailbox_inbox.html"><i class="ti-more"></i>Inbox</a></li>
                            <li><a href="mailbox_compose.html"><i class="ti-more"></i>Compose</a></li>
                            <li><a href="mailbox_read_mail.html"><i class="ti-more"></i>Read</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="file"></i>
                            <span>Pages</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="profile.html"><i class="ti-more"></i>Profile</a></li>
                            <li><a href="invoice.html"><i class="ti-more"></i>Invoice</a></li>
                            <li><a href="gallery.html"><i class="ti-more"></i>Gallery</a></li>
                            <li><a href="faq.html"><i class="ti-more"></i>FAQs</a></li>
                            <li><a href="timeline.html"><i class="ti-more"></i>Timeline</a></li>
                        </ul>
                    </li>

                    <li class="header nav-small-cap">User Interface</li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="grid"></i>
                            <span>Components</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                            <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
                            <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
                            <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
                            <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
                            <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
                            <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="credit-card"></i>
                            <span>Cards</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                            <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                            <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="hard-drive"></i>
                            <span>Content</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="content_typography.html"><i class="ti-more"></i>Typography</a></li>
                            <li><a href="content_media.html"><i class="ti-more"></i>Media</a></li>
                            <li><a href="content_grid.html"><i class="ti-more"></i>Grid</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="package"></i>
                            <span>Utilities</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="utilities_border.html"><i class="ti-more"></i>Border</a></li>
                            <li><a href="utilities_color.html"><i class="ti-more"></i>Color</a></li>
                            <li><a href="utilities_ribbons.html"><i class="ti-more"></i>Ribbons</a></li>
                            <li><a href="utilities_tab.html"><i class="ti-more"></i>Tabs</a></li>
                            <li><a href="utilities_animations.html"><i class="ti-more"></i>Animation</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="edit-2"></i>
                            <span>Icons</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="icons_fontawesome.html"><i class="ti-more"></i>Font Awesome</a></li>
                            <li><a href="icons_glyphicons.html"><i class="ti-more"></i>Glyphicons</a></li>
                            <li><a href="icons_material.html"><i class="ti-more"></i>Material Icons</a></li>
                            <li><a href="icons_themify.html"><i class="ti-more"></i>Themify Icons</a></li>
                            <li><a href="icons_simpleline.html"><i class="ti-more"></i>Simple Line Icons</a></li>
                            <li><a href="icons_cryptocoins.html"><i class="ti-more"></i>Cryptocoins Icons</a></li>
                            <li><a href="icons_flag.html"><i class="ti-more"></i>Flag Icons</a></li>
                            <li><a href="icons_weather.html"><i class="ti-more"></i>Weather Icons</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="inbox"></i>
                            <span>Forms</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="forms_advanced.html"><i class="ti-more"></i>Advanced Elements</a></li>
                            <li><a href="forms_editors.html"><i class="ti-more"></i>Editors</a></li>
                            <li><a href="forms_code_editor.html"><i class="ti-more"></i>Code Editor</a></li>
                            <li><a href="forms_validation.html"><i class="ti-more"></i>Form Validation</a></li>
                            <li><a href="forms_wizard.html"><i class="ti-more"></i>Form Wizard</a></li>
                            <li><a href="forms_general.html"><i class="ti-more"></i>General Elements</a></li>
                            <li><a href="forms_dropzone.html"><i class="ti-more"></i>Dropzone</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="server"></i>
                            <span>Tables</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="tables_simple.html"><i class="ti-more"></i>Simple tables</a></li>
                            <li><a href="tables_data.html"><i class="ti-more"></i>Data tables</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="pie-chart"></i>
                            <span>Charts</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="charts_chartjs.html"><i class="ti-more"></i>ChartJS</a></li>
                            <li><a href="charts_flot.html"><i class="ti-more"></i>Flot</a></li>
                            <li><a href="charts_inline.html"><i class="ti-more"></i>Inline</a></li>
                            <li><a href="charts_morris.html"><i class="ti-more"></i>Morris</a></li>
                            <li><a href="charts_peity.html"><i class="ti-more"></i>Peity</a></li>
                            <li><a href="charts_chartist.html"><i class="ti-more"></i>Chartist</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="map"></i>
                            <span>Map</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="map_google.html"><i class="ti-more"></i>Google Map</a></li>
                            <li><a href="map_vector.html"><i class="ti-more"></i>Vector Map</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="alert-triangle"></i>
                            <span>Authentication</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="auth_login.html"><i class="ti-more"></i>Login</a></li>
                            <li><a href="auth_register.html"><i class="ti-more"></i>Register</a></li>
                            <li><a href="auth_lockscreen.html"><i class="ti-more"></i>Lockscreen</a></li>
                            <li><a href="auth_user_pass.html"><i class="ti-more"></i>Password</a></li>
                            <li><a href="error_404.html"><i class="ti-more"></i>Error 404</a></li>
                            <li><a href="error_maintenance.html"><i class="ti-more"></i>Maintenance</a></li>
                        </ul>
                    </li>

                    <li class="header nav-small-cap">EXTRA</li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="layers"></i>
                            <span>Multilevel</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">Level One</a></li>
                            <li class="treeview">
                                <a href="#">Level One
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#">Level Two</a></li>
                                    <li class="treeview">
                                        <a href="#">Level Two
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-right pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="#">Level Three</a></li>
                                            <li><a href="#">Level Three</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Level One</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="auth_login.html">
                            <i data-feather="lock"></i>
                            <span>Log Out</span>
                        </a>
                    </li>

                </ul>
            </section>

            <div class="sidebar-footer">
                <!-- item-->
                <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
                    aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
                <!-- item-->
                <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                        class="ti-email"></i></a>
                <!-- item-->
                <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                        class="ti-lock"></i></a>
            </div>
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <div class="container-full">

                <!-- Advanced Form Elements -->
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Advanced Form Elements</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Forms</li>
                                        <li class="breadcrumb-item active" aria-current="page">Advanced Form Elements
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <section class="content">
                    <div class="row">

                        <div class="col-12">
                            <div class="box">

                                <div class="box-header">
                                    <h4 class="box-title">Type options</h4>
                                </div>
                                <div class="box-body">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Datetime</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="datetime" name="datetime">
                                            <span class="form-text text-muted">Using
                                                <code>input type="datetime"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Date</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="date" name="date">
                                            <span class="form-text text-muted">Using
                                                <code>input type="date"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Month</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="month" name="month">
                                            <span class="form-text text-muted">Using
                                                <code>input type="month"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Time</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="time" name="time">
                                            <span class="form-text text-muted">Using
                                                <code>input type="time"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Week</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="week" name="week">
                                            <span class="form-text text-muted">Using
                                                <code>input type="week"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Number</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="number" name="number">
                                            <span class="form-text text-muted">Using
                                                <code>input type="number"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Email</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="email" name="email">
                                            <span class="form-text text-muted">Using
                                                <code>input type="email"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">URL</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="url" name="url">
                                            <span class="form-text text-muted">Using
                                                <code>input type="url"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Search</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="search" name="search">
                                            <span class="form-text text-muted">Using
                                                <code>input type="search"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Tel</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="tel" name="tel">
                                            <span class="form-text text-muted">Using
                                                <code>input type="tel"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Color</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="color" name="color">
                                            <span class="form-text text-muted">Using
                                                <code>input type="color"</code></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-header">
                                    <h4 class="box-title">Basic file inputs</h4>
                                </div>
                                <div class="box-body">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Default file input</label>
                                        <div class="col-lg-10">
                                            <input type="file" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Custom BS file input</label>
                                        <div class="col-lg-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-header with-border">
                                    <h4 class="box-title">Input masks</h4>
                                </div>

                                <div class="box-body">
                                    <!-- Date dd/mm/yyyy -->
                                    <div class="form-group">
                                        <label>Date masks:</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <div class="col-6">
                                                <!-- Date mm/dd/yyyy -->
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form group -->

                                    <!-- phone mask -->
                                    <div class="form-group">
                                        <label>US phone mask:</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input type="text" class="form-control"
                                                data-inputmask="'mask':[ '(999) 999-9999']" data-mask>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- phone mask -->
                                    <div class="form-group">
                                        <label>Intl US phone mask:</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input type="text" class="form-control"
                                                data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']"
                                                data-mask>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- IP mask -->
                                    <div class="form-group">
                                        <label>IP mask:</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-laptop"></i>
                                            </div>
                                            <input type="text" class="form-control" data-inputmask="'alias': 'ip'"
                                                data-mask>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                </div>
                                <!-- /.box-body -->

                                <div class="box-header with-border">
                                    <h4 class="box-title">Color & Time Picker</h4>
                                </div>
                                <div class="box-body">
                                    <!-- Color Picker -->
                                    <div class="form-group">
                                        <label>Color picker:</label>
                                        <input type="text" class="form-control my-colorpicker1">
                                    </div>
                                    <!-- /.form group -->

                                    <!-- Color Picker -->
                                    <div class="form-group">
                                        <label>Color picker with addon:</label>

                                        <div class="input-group my-colorpicker2">
                                            <input type="text" class="form-control">

                                            <div class="input-group-addon">
                                                <i class="ion ion-paintbucket"></i>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- time Picker -->
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <label>Time picker:</label>

                                            <div class="input-group">
                                                <input type="text" class="form-control timepicker">

                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                <input type="text" class="form-control timepicker">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-header with-border">
                                    <h4 class="box-title">Date picker</h4>
                                </div>
                                <div class="box-body">
                                    <!-- Date -->
                                    <div class="form-group">
                                        <label>Date:</label>

                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- Date range -->
                                    <div class="form-group">
                                        <label>Date range:</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="reservation">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- Date and time range -->
                                    <div class="form-group">
                                        <label>Date and time range:</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="reservationtime">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- Date and time range -->
                                    <div class="form-group">
                                        <label>Date range button:</label>

                                        <div class="input-group">
                                            <button type="button" class="btn btn-default pull-right btn-rounded"
                                                id="daterange-btn">
                                                <span>
                                                    <i class="fa fa-calendar"></i> Date range picker
                                                </span>
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.form group -->

                                </div>
                                <!-- /.box-body -->
                                <div class="box-header with-border">
                                    <h4 class="box-title">Select Elements</h4>
                                    <ul class="box-controls pull-right">
                                        <li><a class="box-btn-close" href="#"></a></li>
                                        <li><a class="box-btn-slide" href="#"></a></li>
                                    </ul>
                                </div>
                                <div class="box-body pb-0">
                                    <div class="row">
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label>Minimal</label>
                                                <select class="form-control select2" style="width: 100%;">
                                                    <option selected="selected">Alabama</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label>Disabled</label>
                                                <select class="form-control select2" disabled="disabled"
                                                    style="width: 100%;">
                                                    <option selected="selected">Alabama</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label>Multiple</label>
                                                <select class="form-control select2" multiple="multiple"
                                                    data-placeholder="Select a State" style="width: 100%;">
                                                    <option>Alabama</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label>Disabled Result</label>
                                                <select class="form-control select2" style="width: 100%;">
                                                    <option selected="selected">Alabama</option>
                                                    <option>Alaska</option>
                                                    <option disabled="disabled">California (disabled)</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-header with-border">
                                    <h4 class="box-title">Bootstrap Select boxes</h4>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 class="my-10">Select box</h5>
                                            <select class="selectpicker">
                                                <option>Lorem</option>
                                                <option>Ipsum</option>
                                                <option>Dummy</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="my-10">Select boxes with Option groups</h5>
                                            <select class="selectpicker">
                                                <optgroup label="">
                                                    <option>Lorem</option>
                                                    <option>Ipsum</option>
                                                    <option>Dummy</option>
                                                </optgroup>
                                                <optgroup label="">
                                                    <option>Lorem</option>
                                                    <option>Ipsum</option>
                                                    <option>Dummy</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="my-10">Multiple select boxes</h5>
                                            <select class="selectpicker" multiple>
                                                <option>Lorem</option>
                                                <option>Ipsum</option>
                                                <option>Dummy</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="my-10">With colored Button Classes</h5>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <select class="selectpicker mb-20 mr-10" data-style="btn-primary">
                                                <option data-tokens="Lorem">Sed posuere metus vel maximus fringilla.
                                                </option>
                                                <option data-tokens="ipsum">Nam in nisl a ligula semper euismod.
                                                </option>
                                                <option data-tokens="dolor">Ut rhoncus diam et elit tristique venenatis.
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="selectpicker mb-20 mr-10"
                                                data-style="btn-info btn-outline-info">
                                                <option data-tokens="Lorem">Sed posuere metus vel maximus fringilla.
                                                </option>
                                                <option data-tokens="ipsum">Nam in nisl a ligula semper euismod.
                                                </option>
                                                <option data-tokens="dolor">Ut rhoncus diam et elit tristique venenatis.
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="selectpicker mb-20 mr-10" data-style="btn-warning ">
                                                <option data-tokens="Lorem">Sed posuere metus vel maximus fringilla.
                                                </option>
                                                <option data-tokens="ipsum">Nam in nisl a ligula semper euismod.
                                                </option>
                                                <option data-tokens="dolor">Ut rhoncus diam et elit tristique venenatis.
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="selectpicker mb-20 mr-10" data-style="btn-danger">
                                                <option data-tokens="Lorem">Sed posuere metus vel maximus fringilla.
                                                </option>
                                                <option data-tokens="ipsum">Nam in nisl a ligula semper euismod.
                                                </option>
                                                <option data-tokens="dolor">Ut rhoncus diam et elit tristique venenatis.
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="selectpicker mb-20 mr-10" data-style="btn-success">
                                                <option data-tokens="Lorem">Sed posuere metus vel maximus fringilla.
                                                </option>
                                                <option data-tokens="ipsum">Nam in nisl a ligula semper euismod.
                                                </option>
                                                <option data-tokens="dolor">Ut rhoncus diam et elit tristique venenatis.
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="selectpicker mb-20" data-style="btn-default">
                                                <option data-tokens="Lorem">Sed posuere metus vel maximus fringilla.
                                                </option>
                                                <option data-tokens="ipsum">Nam in nisl a ligula semper euismod.
                                                </option>
                                                <option data-tokens="dolor">Ut rhoncus diam et elit tristique venenatis.
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-header with-border">
                                    <h4 class="box-title">Bootstrap TouchSpin</h4>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form class="pr-20">
                                                <div class="form-group">
                                                    <label class="control-label">Vertical Touchspin</label>
                                                    <input class="vertical-spin" type="text"
                                                        data-bts-button-down-class="btn btn-secondary"
                                                        data-bts-button-up-class="btn btn-secondary" value=""
                                                        name="vertical-spin">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Postfix</label>
                                                    <input id="demo1" type="text" value="55" name="demo1"
                                                        data-bts-button-down-class="btn btn-secondary"
                                                        data-bts-button-up-class="btn btn-secondary">
                                                </div>
                                                <div class="form-group mb-0">
                                                    <label class="control-label">Prefix</label>
                                                    <input id="demo2" type="text" value="0" name="demo2"
                                                        class=" form-control"
                                                        data-bts-button-down-class="btn btn-secondary"
                                                        data-bts-button-up-class="btn btn-secondary">
                                                </div>

                                            </form>
                                        </div>
                                        <div class="col-lg-6">
                                            <form>
                                                <div class="form-group">
                                                    <label class="control-label">Init </label>
                                                    <input id="demo3" type="text" value="" name="demo3"
                                                        data-bts-button-down-class="btn btn-secondary"
                                                        data-bts-button-up-class="btn btn-secondary">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Value set 30 </label>
                                                    <input id="demo3_1" type="text" value="30" name="demo3_1"
                                                        data-bts-button-down-class="btn btn-secondary"
                                                        data-bts-button-up-class="btn btn-secondary">
                                                </div>
                                                <div class="form-group mb-0">
                                                    <label class="control-label">Button group</label>
                                                    <div class="input-group">
                                                        <input id="demo4" type="text" class="form-control" name="demo4"
                                                            value="50" data-bts-button-down-class="btn btn-secondary"
                                                            data-bts-button-up-class="btn btn-secondary">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-header with-border">
                                    <h4 class="box-title">Input Tags</h4>
                                </div>
                                <div class="box-body">
                                    <h6 class="box-subtitle d-block mb-10">Add <code>data-role="tagsinput"</code> to
                                        your input field &
                                        its automatically change it to a tags input.</h6>
                                    <div class="tags-default">
                                        <input type="text" value="Lorem,Ipsum,Amet" data-role="tagsinput"
                                            placeholder="add tags" />
                                    </div>
                                    <h5 class="box-title mt-20">Select Tags</h5>
                                    <h6 class="box-subtitle d-block mb-10">You can also use <code>select multiple</code>
                                        to your input
                                        field.</h6>
                                    <select multiple data-role="tagsinput">
                                        <option value="Lorem">Lorem</option>
                                        <option value="Ipsum">Ipsum</option>
                                        <option value="Amet">Amet</option>
                                    </select>
                                    <h5 class="box-title  mt-20 d-block mb-10">Input Group Tags</h5>
                                    <h6 class="box-subtitle d-block mb-10">You can also use group tag
                                        <code>data-role="tagsinput"</code>
                                        to your input field.</h6>
                                    <div class="input-group">
                                        <input type="text" value="Lorem,Ipsum,Amet" data-role="tagsinput"
                                            placeholder="add tags"> <span class="input-group-addon">Tags</span>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-header with-border">
                                    <h4 class="box-title">iCheck - Checkbox &amp; Radio Inputs</h4>
                                </div>
                                <div class="box-body">
                                    <!-- Minimal style -->
                                    <div class="row">
                                        <div class="col-12">

                                            <!-- checkbox -->
                                            <div class="form-group ichack-input">
                                                <label>
                                                    <input type="checkbox" class="minimal" checked>
                                                </label>
                                                <label>
                                                    <input type="checkbox" class="minimal">
                                                </label>
                                                <label>
                                                    <input type="checkbox" class="minimal" disabled>
                                                    Minimal skin checkbox
                                                </label>
                                            </div>

                                            <!-- Minimal red style -->

                                            <!-- checkbox -->
                                            <div class="form-group ichack-input">
                                                <label>
                                                    <input type="checkbox" class="minimal-red" checked>
                                                </label>
                                                <label>
                                                    <input type="checkbox" class="minimal-red">
                                                </label>
                                                <label>
                                                    <input type="checkbox" class="minimal-red" disabled>
                                                    Minimal red skin checkbox
                                                </label>
                                            </div>

                                            <!-- Minimal red style -->

                                            <!-- checkbox -->
                                            <div class="form-group ichack-input">
                                                <label>
                                                    <input type="checkbox" class="flat-red" checked>
                                                </label>
                                                <label>
                                                    <input type="checkbox" class="flat-red">
                                                </label>
                                                <label>
                                                    <input type="checkbox" class="flat-red" disabled>
                                                    Flat green skin checkbox
                                                </label>
                                            </div>

                                            <!-- radio -->
                                            <div class="form-group ichack-input">
                                                <label>
                                                    <input type="radio" name="r1" class="minimal" checked>
                                                </label>
                                                <label>
                                                    <input type="radio" name="r1" class="minimal">
                                                </label>
                                                <label>
                                                    <input type="radio" name="r1" class="minimal" disabled>
                                                    Minimal skin radio
                                                </label>
                                            </div>

                                            <!-- radio -->
                                            <div class="form-group ichack-input">
                                                <label>
                                                    <input type="radio" name="r2" class="minimal-red" checked>
                                                </label>
                                                <label>
                                                    <input type="radio" name="r2" class="minimal-red">
                                                </label>
                                                <label>
                                                    <input type="radio" name="r2" class="minimal-red" disabled>
                                                    Minimal red skin radio
                                                </label>
                                            </div>

                                            <!-- radio -->
                                            <div class="form-group ichack-input">
                                                <label>
                                                    <input type="radio" name="r3" class="flat-red" checked>
                                                </label>
                                                <label>
                                                    <input type="radio" name="r3" class="flat-red">
                                                </label>
                                                <label>
                                                    <input type="radio" name="r3" class="flat-red" disabled>
                                                    Flat green skin radio
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-header with-border">
                                    <i class="fa fa-check-square-o text-black"></i>

                                    <h4 class="box-title">Basic Checkbox</h4>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">

                                    <div class="demo-checkbox">
                                        <input type="checkbox" id="basic_checkbox_1" checked />
                                        <label for="basic_checkbox_1">Default</label>
                                        <input type="checkbox" id="basic_checkbox_2" class="filled-in" checked />
                                        <label for="basic_checkbox_2">Filled In</label>
                                        <input type="checkbox" id="basic_checkbox_3" checked disabled />
                                        <label for="basic_checkbox_3">Default - Disabled</label>
                                        <input type="checkbox" id="basic_checkbox_4" class="filled-in" checked
                                            disabled />
                                        <label for="basic_checkbox_4">Filled In - Disabled</label>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-header with-border">
                                    <i class="fa fa-check-square-o text-black"></i>

                                    <h4 class="box-title">Basic Checkbox Design Colors</h4>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">

                                    <div class="demo-checkbox">
                                        <input type="checkbox" id="md_checkbox_1" class="chk-col-primary" checked />
                                        <label for="md_checkbox_1">Primary</label>
                                        <input type="checkbox" id="md_checkbox_3" class="chk-col-success" checked />
                                        <label for="md_checkbox_3">Success</label>
                                        <input type="checkbox" id="md_checkbox_4" class="chk-col-info" checked />
                                        <label for="md_checkbox_4">Info</label>
                                        <input type="checkbox" id="md_checkbox_6" class="chk-col-warning" checked />
                                        <label for="md_checkbox_6">Warning</label>
                                        <input type="checkbox" id="md_checkbox_7" class="chk-col-danger" checked />
                                        <label for="md_checkbox_7">Danger</label>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-header with-border">
                                    <i class="fa fa-check-square-o text-black"></i>

                                    <h4 class="box-title">Basic Checkbox Design Colors with Filled In</h4>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">

                                    <div class="demo-checkbox">
                                        <input type="checkbox" id="md_checkbox_21" class="filled-in chk-col-primary"
                                            checked />
                                        <label for="md_checkbox_21">Primary</label>
                                        <input type="checkbox" id="md_checkbox_23" class="filled-in chk-col-success"
                                            checked />
                                        <label for="md_checkbox_23">Success</label>
                                        <input type="checkbox" id="md_checkbox_24" class="filled-in chk-col-info"
                                            checked />
                                        <label for="md_checkbox_24">Info</label>
                                        <input type="checkbox" id="md_checkbox_27" class="filled-in chk-col-warning"
                                            checked />
                                        <label for="md_checkbox_27">Warning</label>
                                        <input type="checkbox" id="md_checkbox_29" class="filled-in chk-col-danger"
                                            checked />
                                        <label for="md_checkbox_29">Danger</label>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-header with-border">
                                    <i class="fa fa-check-circle text-black"></i>

                                    <h4 class="box-title">Basic Radio Button</h4>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">

                                    <div class="demo-radio-button">
                                        <input name="group1" type="radio" id="radio_1" checked />
                                        <label for="radio_1">Radio - 1</label>
                                        <input name="group1" type="radio" id="radio_2" />
                                        <label for="radio_2">Radio - 2</label>
                                        <input name="group1" type="radio" class="with-gap" id="radio_3" />
                                        <label for="radio_3">Radio - With Gap</label>
                                        <input name="group1" type="radio" id="radio_4" class="with-gap" />
                                        <label for="radio_4">Radio - With Gap</label>
                                        <input name="group2" type="radio" id="radio_5" checked disabled />
                                        <label for="radio_5">Radio - Disabled</label>
                                        <input name="group3" type="radio" id="radio_6" class="with-gap" checked
                                            disabled />
                                        <label for="radio_6">Radio - Disabled</label>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-header with-border">
                                    <i class="fa fa-check-circle text-black"></i>

                                    <h4 class="box-title">Basic Radio Button Design Colors</h4>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">

                                    <div class="demo-radio-button">
                                        <input name="group4" type="radio" id="radio_7" class="radio-col-primary"
                                            checked />
                                        <label for="radio_7">Primary</label>
                                        <input name="group4" type="radio" id="radio_9" class="radio-col-success" />
                                        <label for="radio_9">Success</label>
                                        <input name="group4" type="radio" id="radio_10" class="radio-col-info" />
                                        <label for="radio_10">Info</label>
                                        <input name="group4" type="radio" id="radio_12" class="radio-col-warning" />
                                        <label for="radio_12">Warning</label>
                                        <input name="group4" type="radio" id="radio_13" class="radio-col-danger" />
                                        <label for="radio_13">Danger</label>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-header with-border">
                                    <i class="fa fa-check-circle-o text-black"></i>

                                    <h4 class="box-title">Basic Radio Button Design Colors with Outline</h4>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">

                                    <div class="demo-radio-button">
                                        <input name="group5" type="radio" id="radio_30"
                                            class="with-gap radio-col-primary" checked />
                                        <label for="radio_30">Primary</label>
                                        <input name="group5" type="radio" id="radio_32"
                                            class="with-gap radio-col-success" />
                                        <label for="radio_32">Success</label>
                                        <input name="group5" type="radio" id="radio_33"
                                            class="with-gap radio-col-info" />
                                        <label for="radio_33">Info</label>
                                        <input name="group5" type="radio" id="radio_35"
                                            class="with-gap radio-col-warning" />
                                        <label for="radio_35">Warning</label>
                                        <input name="group5" type="radio" id="radio_36"
                                            class="with-gap radio-col-danger" />
                                        <label for="radio_36">Danger</label>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->

            </div>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right d-none d-sm-inline-block">
                <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Purchase Now</a>
                    </li>
                </ul>
            </div>
            &copy; 2020 <a href="#">Psd to Html Expert</a>. All Rights Reserved.
        </footer>
        <!-- Control Sidebar -->
        <aside class="control-sidebar">

            <div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"><i
                        class="ion ion-close text-white" data-toggle="control-sidebar"></i></span> </div>
            <!-- Create the tabs -->
            <ul class="nav nav-tabs control-sidebar-tabs">
                <li class="nav-item"><a href="#control-sidebar-home-tab" data-toggle="tab" class="active">Chat</a></li>
                <li class="nav-item"><a href="#control-sidebar-settings-tab" data-toggle="tab">Todo</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane active" id="control-sidebar-home-tab">
                    <div class="flexbox">
                        <a href="javascript:void(0)" class="text-grey"><i class="ti-minus"></i></a>
                        <p>Users</p>
                        <a href="javascript:void(0)" class="text-right text-grey"><i class="ti-plus"></i></a>
                    </div>
                    <div class="lookup lookup-sm lookup-right d-none d-lg-block">
                        <input type="text" name="s" placeholder="Search" class="w-p100">
                    </div>
                    <div class="media-list media-list-hover mt-20">
                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-success" href="#">
                                <img src="../images/avatar/1.jpg" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="font-size-16">
                                    <a class="hover-primary" href="#"><strong>Tyler</strong></a>
                                </p>
                                <p>Praesent tristique diam...</p>
                                <span>Just now</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-danger" href="#">
                                <img src="../images/avatar/2.jpg" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="font-size-16">
                                    <a class="hover-primary" href="#"><strong>Luke</strong></a>
                                </p>
                                <p>Cras tempor diam ...</p>
                                <span>33 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-warning" href="#">
                                <img src="../images/avatar/3.jpg" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="font-size-16">
                                    <a class="hover-primary" href="#"><strong>Evan</strong></a>
                                </p>
                                <p>In posuere tortor vel...</p>
                                <span>42 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-primary" href="#">
                                <img src="../images/avatar/4.jpg" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="font-size-16">
                                    <a class="hover-primary" href="#"><strong>Evan</strong></a>
                                </p>
                                <p>In posuere tortor vel...</p>
                                <span>42 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-success" href="#">
                                <img src="../images/avatar/1.jpg" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="font-size-16">
                                    <a class="hover-primary" href="#"><strong>Tyler</strong></a>
                                </p>
                                <p>Praesent tristique diam...</p>
                                <span>Just now</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-danger" href="#">
                                <img src="../images/avatar/2.jpg" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="font-size-16">
                                    <a class="hover-primary" href="#"><strong>Luke</strong></a>
                                </p>
                                <p>Cras tempor diam ...</p>
                                <span>33 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-warning" href="#">
                                <img src="../images/avatar/3.jpg" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="font-size-16">
                                    <a class="hover-primary" href="#"><strong>Evan</strong></a>
                                </p>
                                <p>In posuere tortor vel...</p>
                                <span>42 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-primary" href="#">
                                <img src="../images/avatar/4.jpg" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="font-size-16">
                                    <a class="hover-primary" href="#"><strong>Evan</strong></a>
                                </p>
                                <p>In posuere tortor vel...</p>
                                <span>42 min ago</span>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <div class="flexbox">
                        <a href="javascript:void(0)" class="text-grey"><i class="ti-minus"></i></a>
                        <p>Todo List</p>
                        <a href="javascript:void(0)" class="text-right text-grey"><i class="ti-plus"></i></a>
                    </div>
                    <ul class="todo-list mt-20">
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_1" class="filled-in">
                            <label for="basic_checkbox_1" class="mb-0 h-15"></label>
                            <!-- todo text -->
                            <span class="text-line">Nulla vitae purus</span>
                            <!-- Emphasis label -->
                            <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_2" class="filled-in">
                            <label for="basic_checkbox_2" class="mb-0 h-15"></label>
                            <span class="text-line">Phasellus interdum</span>
                            <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_3" class="filled-in">
                            <label for="basic_checkbox_3" class="mb-0 h-15"></label>
                            <span class="text-line">Quisque sodales</span>
                            <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_4" class="filled-in">
                            <label for="basic_checkbox_4" class="mb-0 h-15"></label>
                            <span class="text-line">Proin nec mi porta</span>
                            <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_5" class="filled-in">
                            <label for="basic_checkbox_5" class="mb-0 h-15"></label>
                            <span class="text-line">Maecenas scelerisque</span>
                            <small class="badge bg-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_6" class="filled-in">
                            <label for="basic_checkbox_6" class="mb-0 h-15"></label>
                            <span class="text-line">Vivamus nec orci</span>
                            <small class="badge bg-info"><i class="fa fa-clock-o"></i> 1 month</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_7" class="filled-in">
                            <label for="basic_checkbox_7" class="mb-0 h-15"></label>
                            <!-- todo text -->
                            <span class="text-line">Nulla vitae purus</span>
                            <!-- Emphasis label -->
                            <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_8" class="filled-in">
                            <label for="basic_checkbox_8" class="mb-0 h-15"></label>
                            <span class="text-line">Phasellus interdum</span>
                            <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_9" class="filled-in">
                            <label for="basic_checkbox_9" class="mb-0 h-15"></label>
                            <span class="text-line">Quisque sodales</span>
                            <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_10" class="filled-in">
                            <label for="basic_checkbox_10" class="mb-0 h-15"></label>
                            <span class="text-line">Proin nec mi porta</span>
                            <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->


    <!-- Vendor JS -->
    <script src="{{ 'backend/js/vendors.min.js' }}"></script>
    <script src="{{ 'backend/assets/icons/feather-icons/feather.min.js' }}"></script>

    <script src="{{ 'backend/assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js' }}"></script>
    <script src="{{ 'backend/assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js' }}"></script>
    <script src="{{ 'backend/assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js' }}">
    </script>
    <script src="{{ 'backend/assets/vendor_components/select2/dist/js/select2.full.js' }}"></script>

    <script src="{{ 'backend/assets/vendor_plugins/input-mask/jquery.inputmask.js' }}"></script>
    <script src="{{ 'backend/assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js' }}"></script>
    <script src="{{ 'backend/assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js' }}"></script>

    <script src="{{ 'backend/assets/vendor_components/moment/min/moment.min.js' }}"></script>
    <script src="{{ 'backend/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js' }}"></script>
    <script src="{{ 'backend/assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' }}">
    </script>
    <script src="{{ 'backend/assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js' }}">
    </script>
    <script src="{{ 'backend/assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js' }}"></script>
    <script src="{{ 'backend/assets/vendor_plugins/iCheck/icheck.min.js' }}"></script>

    <script src="{{ 'backend/js/pages/advanced-form-element.js' }}"></script>

    <!-- Sunny Admin App -->
    <script src="{{ 'backend/js/template.js' }}"></script>


</body>

</html>