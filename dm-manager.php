<!DOCTYPE html>
<html lang="en">
  <head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-90680653-2');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>MS Power Bar - Dashboard (Vendor Name)</title>

    <?php include_once('./inc/header.php'); ?>
    <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="az-content-body pd-lg-l-40 d-flex flex-column">
          <div class="az-content-breadcrumb">
            <span>Home</span>
            <span>DM Manager</span>
          </div>
          <h2 class="az-content-title">DM Manager</h2>
          <hr class="mg-y-10">
          <div class="az-content-label mg-b-5"><span class="tx-sserif">CREATION</span> PANEL</div>
          <p class="mg-b-20">Panel is important for you select all the information and create DM as per the requirement...</p>

          <div class="row row-sm mg-b-20">
            <div class="col-lg-4">
              <p class="mg-b-10">SELECT DESIGN NUMBER</p>
              <select class="form-control select2" onchange="selector()">
                <option label="Choose one"></option>
                <?php
                  $sql = "SELECT DISTINCT `assigned_number` FROM `design_numbers` WHERE `connection`='$global_id' and `delete`='0'";
                  $query = mysqli_query($conn, $sql);
                  $count = mysqli_num_rows($query);
                  while($row = mysqli_fetch_assoc($query)) {
                    $assigned_number = $row['assigned_number'];
                    echo "<option value='$assigned_number'>$assigned_number</option>";
                  }
                ?>
              </select>
            </div><!-- col -->
          </div>

          <div class="row row-sm mg-b-20">
            <div class="col-lg-4">
            <p class="mg-b-10">AVAILABLE SIZE'S</p>
            <div id='demo'>The Data</div>
              <select class="form-control select2" multiple="multiple">
                <option value="Firefox">20-22</option>
                <option value="Chrome">20-24</option>
                <option value="Safari">20-26</option>
                <option value="Opera">20-28</option>
                <option value="Internet Explorer">20-30</option>
              </select>
            </div><!-- col -->
            <div class="col-lg-4">
              <p class="mg-b-10">MASTERS</p>
              <select class="form-control select2" multiple="multiple" disabled>
              </select>
            </div><!-- col -->
            <div class="col-lg-4">
              <p class="mg-b-10">MATERIAL</p>
              <select class="form-control select2-no-search" multiple="multiple" disabled>
                <option value="Firefox" selected>Array 1</option>
                <option value="Chrome">Array 1</option>
                <option value="Safari">Array 1</option>
                <option value="Opera">Array 1</option>
                <option value="Internet Explorer">Array 1</option>
              </select>
            </div><!-- col -->
          </div><!-- row -->
          
          <div class="row row-sm mg-t-20">
            <div class="col-lg">
              <textarea rows="3" class="form-control" placeholder="Remarks" style='resize: none; margin-bottom: 20px;'></textarea>
            </div><!-- col -->
          </div>
          
          <div class="row row-xs wd-xl-80p">
            <div class="col-md-6"></div>
            <div class="col-sm-12 col-md-3"><button class="btn btn-az-primary btn-block">Generate</button></div>
          </div>
          <?php include_once('./inc/footer.php'); ?>
          <script>
              function selector() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("demo").innerHTML = this.responseText;
  }
  xhttp.open("GET", "ajax-data.php");
  xhttp.send();
}

            </script>
  </body>
</html>
