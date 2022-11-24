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
    <title>MS Power Bar - Dashboard</title>
    <?php include_once('./inc/header.php');
    $generate = @$_POST['generate'];
    if(isset($generate)) {
      $assigned_no = strip_tags(@$_POST['a_no']);
      $master = strip_tags(@$_POST['master']);
      $material = @$_POST['material'];
      $materials = implode(', ', $material);
      $remarks = strip_tags(@$_POST['remarks']);
      $date = date("jS M Y");
      $time = date("h:i A");      
      $sql = "INSERT INTO `dm_data`(`id`, `master`, `material`, `remarks`, `auth_connection`, `connection`, `date`, `time`, `delete`) VALUES (null,'$master','$materials','$remarks','','$global_id','$date','$time','0')";
      $query = mysqli_query($conn, $sql);
      $last_id = mysqli_insert_id($conn);
      echo "<script>window.location = './dm-manager-data.php?id=$last_id';</script>";
      exit();  
    }
    ?>
    <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="az-content-body pd-lg-l-40 d-flex flex-column">
          <div class="az-content-breadcrumb">
            <span>Home</span>
            <span>DM Manager</span>
          </div>
          <h2 class="az-content-title">DM Manager Step 1-2</h2>
          <hr class="mg-y-10">
          <div class="az-content-label mg-b-5"><span class="tx-sserif">CREATION</span> PANEL</div>
          <p class="mg-b-20">Panel is important for you select all the information and create DM as per the requirement...</p>
          <div class="row row-sm mg-b-20">
            <div class="col-lg-4">
              <p class="mg-b-10">SELECT DESIGN NUMBER</p>
              <form action='dm-manager.php' method='POST'>
              <select class="form-control select2" name="a_no" id="designno" onchange="selector()" required>
                <option label="Choose one"></option>
                <?php
                  $sql = "SELECT DISTINCT `assigned_number` FROM `design_numbers` WHERE `connection`='$global_id' and `delete`='0'";
                  $query = mysqli_query($conn, $sql);
                  $count = mysqli_num_rows($query);
                  while($row = mysqli_fetch_assoc($query)) {
                    $assigned_id = $row['id'];
                    $assigned_number = $row['assigned_number'];
                    echo "<option value='$assigned_number'>$assigned_number</option>";
                  }
                ?>
              </select>
            </div><!-- col -->
          </div>

          <div class="row row-sm mg-b-20">
            <div class="col-lg-4">
            <p class="mg-b-10">AVAILABLE SIZES</p>
            <div id='demo'><select class="form-control select2" id="#" name="#" multiple="multiple" disabled></select></div>
            </div><!-- col -->
            <div class="col-lg-4">
              <p class="mg-b-10">MASTERS</p>
              <select class="form-control select2" id="masters" name="master" disabled required>
                  <?php
                    $sql = "SELECT * FROM `masters` WHERE `connection`='$global_id'";
                    $query = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($query)) {
                      $master_name = $row['name'];
                    echo "<option name='$master_name'>$master_name</option>";
                    }
                  ?>
              </select>
            </div><!-- col -->
            <div class="col-lg-4">
              <p class="mg-b-10">MATERIAL</p>
              <select class="form-control select2-no-search" multiple="multiple" name="material[]" id="material" disabled required>
                  <?php
                    $sql = "SELECT * FROM `material` WHERE `connection`='$global_id'";
                    $query = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($query)) {
                      $material_name = $row['name'];
                      echo "<option name='$material_name'>$material_name</option>";
                    }
                  ?>
              </select>
            </div><!-- col -->
          </div><!-- row -->
          
          <div class="row row-sm mg-t-20">
            <div class="col-lg">
              <textarea rows="3" class="form-control" placeholder="Remarks" name="remarks" id="remarks" style='resize: none; margin-bottom: 20px;' disabled></textarea>
            </div><!-- col -->
          </div>
          
          <div class="row row-xs wd-xl-80p">
            <div class="col-md-6"></div>
            <div class="col-sm-12 col-md-3"><button type="submit" name="generate" id="generate" class="btn btn-az-primary btn-block" disabled>Next ></button></div>
          </div>
          </form>
          <?php include_once('./inc/footer.php'); ?>
          <script>
            let design = document.querySelector('#designno');
            let masters = document.querySelector('#masters');
            let material = document.querySelector('#material');
            let remarks = document.querySelector('#remarks');
            let generate = document.querySelector('#generate');
            function selector() {
                if(!design.value == "") {
                generate.disabled = false;
                remarks.disabled = false;
                material.disabled = false;
                masters.disabled = false;
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                document.getElementById("demo").innerHTML = this.responseText;
                }
                xhttp.open("GET", "ajax-data.php?data="+design.value);
                xhttp.send();
              } else {
                generate.disabled = true;
                remarks.disabled = true;
                material.disabled = true;
                masters.disabled = true;
              }
              }
          </script>
  </body>
</html>
