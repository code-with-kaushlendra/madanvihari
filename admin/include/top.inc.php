<?php
ob_start(); // needs to be added here
?>
<!DOCTYPE html>
<html>

<style>
  .pro-pic span {
    font-size: 14px;
  }

  @media (max-width:768px) {
    .pro-pic span {
      display: none;
    }
  }
</style>

<body>
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <header class="topbar" data-navbarbg="skin5">
      <nav class="navbar top-navbar navbar-expand-md navbar-light bg-dark">
        <div class="navbar-header" data-logobg="skin5">
          <a class="navbar-brand" href="index.php">
            <b class="logo-icon ps-2"></b>
            <span class="logo-text text-center">
              <h4>Madan Bihari </h4>
              <!-- <img src="../assets/images/logo.svg" alt="homepage" class="light-logo" style="background-color: white; margin-bottom: 5px;" /> -->
            </span>

          </a>
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
              class="ti-menu ti-close"></i></a>
        </div>
        <div class="navbar-collapse collapse bg-light" id="navbarSupportedContent" data-navbarbg="skin5">
          <ul class="navbar-nav bg-light float-start me-auto">
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
            </li>
          </ul>
          <ul class="navbar-nav float-end">
            <li class="nav-item dropdown">
              <a class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 640 640">
                  <path fill="black" d="M569 337C578.4 327.6 578.4 312.4 569 303.1L425 159C418.1 152.1 407.8 150.1 398.8 153.8C389.8 157.5 384 166.3 384 176L384 256L272 256C245.5 256 224 277.5 224 304L224 336C224 362.5 245.5 384 272 384L384 384L384 464C384 473.7 389.8 482.5 398.8 486.2C407.8 489.9 418.1 487.9 425 481L569 337zM224 160C241.7 160 256 145.7 256 128C256 110.3 241.7 96 224 96L160 96C107 96 64 139 64 192L64 448C64 501 107 544 160 544L224 544C241.7 544 256 529.7 256 512C256 494.3 241.7 480 224 480L160 480C142.3 480 128 465.7 128 448L128 192C128 174.3 142.3 160 160 160L224 160z"></path>
                </svg> </a>
              <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off me-1 ms-1"></i> Logout</a>
              </ul>
            </li>

            <ul class="navbar-nav float-end">
              <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic d-flex align-items-center"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false">

                  <img src="../assets/images/users/1.jpg"
                    alt="user"
                    class="rounded-circle me-2"
                    width="32">

                  <span class="fw-semibold text-dark">Madan Bihari </span>

                </a>

                <ul class="dropdown-menu dropdown-menu-end user-dd animated"
                  aria-labelledby="navbarDropdown">

                  <li>
                    <a class="dropdown-item"
                      href="#"
                      target="_blank">
                      <i class="fa fa-globe me-2"></i> Visit Website
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </ul>
        </div>
      </nav>
    </header>
    <aside class="left-sidebar" data-sidebarbg="skin5">
      <div class="scroll-sidebar">
        <nav class="sidebar-nav mt-2">
          <ul id="sidebarnav" class="pt-2">
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false"><i
                  class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="manage_blog.php"
                aria-expanded="false"><i class="mdi mdi-newspaper"></i>
                <span class="hide-menu">Manage Blog</span></a>
            </li>
            <!-- <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="manage_department.php"
                aria-expanded="false"><i class="mdi mdi-domain"></i>
                <span class="hide-menu">Manage Department</span></a>
            </li> -->
            <!--<li class="sidebar-item">-->
            <!--  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="manage_service.php"-->
            <!--  aria-expanded="false"><i class="mdi mdi-medical-bag"></i>-->
            <!--  <span class="hide-menu">Manage Service</span></a>-->
            <!--</li>-->
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="manage_contact.php" aria-expanded="false"> <i class="mdi mdi-email"></i>
              <span class="hide-menu">Manage Contacts</span></a>
            </li>
         
            
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="manage_gallery.php"
                aria-expanded="false"> <i class="mdi mdi-image"></i>
                <span class="hide-menu">Manage Gallery</span></a>
            </li>
            <!--<li class="sidebar-item">-->
            <!--  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="manage_videos.php"-->
            <!--    aria-expanded="false"><i class="mdi mdi-video"></i>-->
            <!--    <span class="hide-menu">Manage Videos</span></a>-->
            <!--</li>-->
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="manage_department.php"
                aria-expanded="false"><i class="mdi mdi-video"></i>
                <span class="hide-menu">Manage Categories</span></a>
            </li> 
             <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="manage_product.php"
                aria-expanded="false"><i class="mdi mdi-video"></i>
                <span class="hide-menu">Manage Products</span></a>
            </li>             
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="manage_order.php"
                aria-expanded="false"><i class="mdi mdi-video"></i>
                <span class="hide-menu">Manage Orders</span></a>
            </li>
            <!--<li class="sidebar-item">-->
            <!--  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="manage_offline_videos.php"-->
            <!--    aria-expanded="false"><i class="fas fa-archive"></i>-->
            <!--    <span class="hide-menu">Manage Offline Videos</span></a>-->
            <!--</li>-->
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="manage_testimonial.php"
                aria-expanded="false"> <i class="mdi mdi-comment"></i>
                <span class="hide-menu">Manage Testimonial</span></a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>

    <?php
    require('connection.inc.php');
    require('functions.inc.php');
    if (isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != '') {
    } else {
      header('location:index.php');
      die();
    }
    ?>