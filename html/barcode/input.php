<!DOCTYPE html>
<html>
<head>
  <title>Production Assist</title>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <!-- BEGIN PLUGIN CSS -->
  <link href="/barebone/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="/barebone/assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="/barebone/assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
  <link href="/barebone/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
  <link href="/barebone/assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
  <link href="/barebone/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
  <!-- END PLUGIN CSS -->
  <!-- BEGIN CORE CSS FRAMEWORK -->
  <link href="/barebone/webarch/css/webarch.css" rel="stylesheet" type="text/css" />
  <!-- END CORE CSS FRAMEWORK -->
</head>
<body class="">
  <!-- BEGIN HEADER -->
  <div class="header navbar navbar-inverse">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
      <!-- BEGIN NAVIGATION HEADER -->
      <div class="header-seperation">
        <!-- BEGIN MOBILE HEADER -->
        <ul class="nav pull-left notifcation-center visible-xs visible-sm">
          <li class="dropdown">
            <a href="#main-menu" data-webarch="toggle-left-side">
              <div class="iconset top-menu-toggle-white"></div>
            </a>
          </li>
        </ul>
        <!-- END MOBILE HEADER -->
        <!-- BEGIN LOGO -->
        <a href="#">
          <h3 class="text-white m-l-5">Ashar's<strong>Local</strong></h2>
          </a>

        </div>
        <!-- END NAVIGATION HEADER -->
        <!-- BEGIN CONTENT HEADER -->
        <div class="header-quick-nav">
          <!-- BEGIN HEADER LEFT SIDE SECTION -->
          <div class="pull-left">
            <!-- BEGIN SLIM NAVIGATION TOGGLE -->
            <ul class="nav quick-section">
              <li class="quicklinks">
                <a href="#" class="" id="layout-condensed-toggle">
                  <div class="iconset top-menu-toggle-dark"></div>
                </a>
              </li>
            </ul>
            <!-- END SLIM NAVIGATION TOGGLE -->
            <!-- BEGIN HEADER QUICK LINKS -->
            <ul class="nav quick-section">
              <li class="quicklinks">
                <a href="#" class="">
                  <div class="iconset top-reload"></div>
                </a>
              </li>


            </ul>
            <!-- BEGIN HEADER QUICK LINKS -->
          </div>
          <!-- END HEADER LEFT SIDE SECTION -->

        </div>
        <!-- END CONTENT HEADER -->
      </div>
      <!-- END TOP NAVIGATION BAR -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN CONTENT -->
    <div class="page-container row-fluid">
      <!-- BEGIN SIDEBAR -->
      <!-- BEGIN MENU -->
      <div class="page-sidebar" id="main-menu">
        <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">

          <!-- BEGIN SIDEBAR MENU -->
          <br />
          <ul>
            <!-- BEGIN SELECTED LINK -->
            <li class="start active">
              <a href="#">
                <i class="icon-custom-home"></i>
                <span class="title">Barcode</span>
                <span class="selected"></span>
              </a>
            </li>
            <!-- END SELECTED LINK -->
            <!-- BEGIN BADGE LINK -->
            <li class="">
              <a href="#">
                <i class="fa fa-envelope"></i>
                <span class="title">Catalogue Lookup</span>
              </a>
            </li>
            <!-- END BADGE LINK -->

          </ul>
          <!-- END SIDEBAR MENU -->

          <div class="clearfix"></div>
          <!-- END SIDEBAR WIDGETS -->
        </div>
      </div>
      <!-- BEGIN SCROLL UP HOVER -->
      <a href="#" class="scrollup">Scroll</a>
      <!-- END SCROLL UP HOVER -->
      <!-- END MENU -->


      <!-- BEGIN PAGE CONTAINER-->
      <div class="page-content">
        <div class="content">
          <!-- BEGIN PAGE TITLE -->
          <div class="page-title">

            <div class="">
              <div class="grid simple">

                <div class="grid-body no-border">
                  <h3>Enter <span class="semi-bold">Barcodes</span></h3>
                  <p>Enter all your barcodes in a seperate line, make sure there are no spaces after or before your barcodes. After entering or pasting all your barcodes, click on the validate button.</p>
                  <br>
                  <form action="result.php" method="POST" id="form_traditional_validation" name="form_traditional_validation" role="form" autocomplete="off" class="validate" novalidate="novalidate">
                    <div class="form-group">
                      <span class="help">e.g. "12345678"</span>
                      <div class="controls">
                        <textarea type="text" class="form-control" id="barcodes" name="barcodes"></textarea>
                      </div>
                    </div>
                    <div class="form-actions">
                    <div class="pull-right">
                    <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Validate</button>
                    </div>
                    </div>
                  </form>
                  </div>

                  </div>
                </div>
              </div>
              <!-- END PAGE TITLE -->
              <!-- BEGIN PlACE PAGE CONTENT HERE -->
              <!-- END PLACE PAGE CONTENT HERE -->
            </div>
          </div>
          <!-- END PAGE CONTAINER -->

        </div>
        <!-- END CONTENT -->
        <!-- BEGIN CORE JS FRAMEWORK-->
        <script src="/barebone/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
        <!-- BEGIN JS DEPENDECENCIES-->
        <script src="/barebone/assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
        <script src="/barebone/assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/barebone/assets/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
        <script src="/barebone/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
        <script src="/barebone/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
        <script src="/barebone/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
        <script src="/barebone/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="/barebone/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
        <!-- END CORE JS DEPENDECENCIES-->
        <!-- BEGIN CORE TEMPLATE JS -->
        <script src="/barebone/webarch/js/webarch.js" type="text/javascript"></script>
        <script src="/barebone/assets/js/chat.js" type="text/javascript"></script>
        <!-- END CORE TEMPLATE JS -->
      </body>
      </html>
