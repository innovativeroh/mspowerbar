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
    @$data = @$_GET['id'];
    $sql = "SELECT * FROM `dm_data` WHERE `id`='$data'";
    $query = mysqli_query($conn, $sql);
    $material_type = @$_POST['material_type'];
    $material_rate = @$_POST['material_rate'];
    $material_qty = @$_POST['material_qty'];
    if(isset($_POST['upload'])) {
    foreach($material_type as $index => $value) {
      $sql = "INSERT INTO `dm_data_addon`(`id`, `material_name`, `material_size`, `material_qty`, `dm_data_conn`, `connection`) VALUES (null,'$material_type[$index]','$material_rate[$index]','$material_qty[$index]','$data','$global_id')";
      $query = mysqli_query($conn, $sql);
    }
    }
    ?>
    <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="az-content-body pd-lg-l-40 d-flex flex-column">
          <div class="az-content-breadcrumb">
            <span>Home</span>
            <span>DM Manager</span>
          </div>
          <h2 class="az-content-title">DM Manager Step 2-2</h2>
          <hr class="mg-y-10">
          <div class="az-content-label mg-b-5"><span class="tx-sserif">MATERIAL</span> INFORMATION</div>
          <p class="mg-b-20">Enter the material information and provide all the details regardinng material rate and quantity!</p>
          <form action='#' method='POST'>
          <?php
            $sql = "SELECT * FROM `dm_data` WHERE `id`='$data'";
            $query = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($query);
            if($count > 0) {
                $row = mysqli_fetch_assoc($query);
                $material = $row['material'];
                $material_array = explode(",",$material);
                foreach($material_array as $item) {
                    ?>
                    <div class="row row-sm mg-b-20">
                    <div class="col-lg-4">
                        <label for="material_type">Material</label>
                        <input class="form-control" value="<?=$item?>" name="material_type[]" type="text" readonly>
                    </div>
                    <div class="col-lg-4">
                        <label for="material_type">Rate</label>
                        <input class="form-control" name="material_rate[]" id="material_rate" placeholder="Example* 100" type="text">
                    </div>
                    <div class="col-lg-4">
                        <label for="material_type">Qty</label>  
                        <input class="form-control" name="material_qty[]" id="material_qty" placeholder="Example* 10" type="number" min="0" value="0">
                    </div>
                    </div>
                    <?php
                }
            }
          ?>
          <br>
        <div class="row row-sm mg-b-20">
          <div class="col-lg-4">
          <h4>Calculator</h4>
          <hr>
          Total Material Rate : <b><span id="addition">0.00</span></b><br>
          Total Quantity : <b><span id="multiply">0.00</span></b><br><hr>
          <h6>Gross Amount : <b><span id="main">0.00</span></b></h6>
          <hr>
        </div>
          </div>
          <br><br>
          <div class="row row-xs wd-xl-80p">
            <div class="col-md-6"></div>
            <div class="col-sm-12 col-md-6"><button type="button" onclick="generate()" class="btn btn-az-secondary"><i class="fas fa-calculator"></i> Calculate</button>
            <button type="submit" class="btn btn-dark" name="upload" id="upload" disabled>Complete <i class="fas fa-check-circle"></i></button></div>
          </div>
          </form>
          <?php include_once('./inc/footer.php'); ?>
  </body>
</html>
<script>
  let arr = document.querySelectorAll("#material_rate");
  let arry = document.querySelectorAll("#material_qty");
  let addition = document.querySelector('#addition');
  let multiply = document.querySelector('#multiply');
  let main = document.querySelector('#main');
  let upload = document.querySelector('#upload');
  function generate() {
    let tot=0;
    let tota=0;
    //This is adding rates together
    for(var i=0;i<arr.length;i++){
      if(parseFloat(arr[i].value))
      tot += parseFloat(arr[i].value);
    }
    addition.innerHTML = tot;
  
    //This is adding qty together
    for(var i=0;i<arry.length;i++){
      if(parseFloat(arry[i].value))
      tota += parseFloat(arry[i].value);
    }
    multiply.innerHTML = tota;
  
    //This will sum up both the amounts
    let total = parseFloat(addition.innerHTML * multiply.innerHTML);
    main.innerHTML = total;

    //The last step enabling and disabling items to complete the whole scenario
    upload.disabled = false;
  }
</script>
