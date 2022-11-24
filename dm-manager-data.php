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
                        <input class="form-control" name="material_rate[]" placeholder="Example* 100" type="text">
                    </div>
                    <div class="col-lg-4">
                        <label for="material_type">Qty</label>  
                        <input class="form-control" name="material_rate[]" placeholder="Example* 10" type="number" min="0">
                    </div>
                    </div>
                    <?php
                }
            }
          ?>
          <div class="row row-xs wd-xl-80p">
            <div class="col-md-6"></div>
            <div class="col-sm-12 col-md-3"><button type="submit" name="generate" id="generate" class="btn btn-az-primary btn-block">Calculate</button></div>
          </div>
          </form>
          <?php include_once('./inc/footer.php'); ?>
  </body>
</html>
