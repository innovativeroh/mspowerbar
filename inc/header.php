<?php include_once('./inc/connection.php');
if (isset($_SESSION['username'])) {
} else {
  echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
  exit();
}
?>
<!-- vendor css -->
    <link href="lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">
    <!-- azia CSS -->
    <link rel="stylesheet" href="css/azia.css">

  </head>
  <body>

    <div class="az-header">
      <div class="container">
        <div class="az-header-left">
          <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span>s</a>
          <a href="index.php"><img src='./img/brand-logo.png' width='80px'></a>
        </div><!-- az-header-left -->
        <div class="az-header-menu">
          <div class="az-header-menu-header">
            <a href="index.html" class="az-logo"><span></span> azia</a>
            <a href="" class="close">&times;</a>
          </div><!-- az-header-menu-header -->
          <ul class="nav">
            <li class="nav-item">
              <a href="index.php" class="nav-link"><i class="typcn typcn-chart-area-outline"></i> Dashboard</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i> DM</a>
              <nav class="az-menu-sub">
                <a href="dm-manager.php" class="nav-link">Create +</a>
                <a href="dm.php" class="nav-link">View All</a>
              </nav>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i> Design Number</a>
              <nav class="az-menu-sub">
                <a href="add-design-number.php" class="nav-link">Create +</a>
                <a href="design-numbers.php" class="nav-link">View All</a>
              </nav>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i> Order Form</a>
              <nav class="az-menu-sub">
                <a href="dm-manager.php" class="nav-link">Create +</a>
                <a href="add-design-number.php" class="nav-link">View All</a>
              </nav>
            </li>
            <li class="nav-item">
              <a href="settings.php" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i> Config</a>
            </li>
          </ul>
        </div><!-- az-header-menu -->
        <div class="az-header-right">
          <div class="dropdown az-profile-menu">
            <a href="" class="az-img-user"><img src="./<?=$global_profile_picture;?>" alt=""></a>
            <div class="dropdown-menu">
              <div class="az-dropdown-header d-sm-none">
                <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
              </div>
              <div class="az-header-profile">
                <div class="az-img-user">
                  <img src="./<?=$global_profile_picture;?>" alt="">
                </div><!-- az-img-user -->
                <h6><?=$global_name;?></h6>
                <span>Subscriber</span>
              </div><!-- az-header-profile -->
              <a href="" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Account Settings</a>
              <a href="logout.php" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign Out</a>
            </div><!-- dropdown-menu -->
          </div>
        </div><!-- az-header-right -->
      </div><!-- container -->
    </div><!-- az-header -->
