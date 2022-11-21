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
    <title>MS Power Bar - Config</title>
    <?php include_once('./inc/header.php'); ?>
    <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="az-content-body pd-lg-l-40 d-flex flex-column">
          <div class="az-content-breadcrumb">
            <span>Home</span>
            <span>Design Numbers</span>
          </div>
          <h3 class="az-content-title">Add Design Number</h3>
          <?php
            $sql = "SELECT * FROM `design_numbers` WHERE `connection`='$global_id' AND `delete`='0' ORDER by `id` DESC LIMIT 1";
            $query = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($query);
            if(!$count > 0) {
              $decided_number = "1000";
            } else {
              $row = mysqli_fetch_assoc($query);
              $decided_number = $row['assigned_number'] + 1;
            }
            $add_design = @$_POST['add_design'];
            $colors = @$_POST['color'];
            $from = @$_POST['from'];
            $to = @$_POST['to'];
            $rate = @$_POST['rate'];
            $item_name = @$_POST['item_name'];
            $date = date("Y-m-d");

          
            if(isset($add_design)) {
              $color_implode = implode(', ', $colors);
              $from_implode = implode('', $from);
              $to_implode = implode('', $to);
              $rate_implode = implode('', $rate);
              for($i=0;$i<count($from);$i++)
              {
                  @$merged_arr_str .= $from[$i] . "-" . $to[$i] . " (Rate: Rs.". $rate[$i] . "/-)"; 
@$base = 
"Colors: $color_implode
Size: @$merged_arr_str
Item Name : $item_name
Date : $date";
                }
              

              if (((@$_FILES["img"]["type"] == "image/jpeg") || (@$_FILES["img"]["type"] == "image/png") || (@$_FILES["img"]["type"] == "image/gif")) && (@$_FILES["img"]["size"] < 10048576)) {
              $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
              $rand_dir_name = substr(str_shuffle($chars), 0, 15);
              include "vendor/phpqrcode/qrlib.php";
              mkdir("data/$rand_dir_name");
              mkdir("qr_data/$rand_dir_name");
              $filename = "qr_data/".$rand_dir_name.'/qr.png';
              $errorCorrectionLevel = 'L';
              $matrixPointSize = 20;
              if (isset($_REQUEST['size']))
              $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);
              QRcode::png(@$base, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
              if (file_exists("data/$rand_dir_name/" . @$_FILES['img']['name'])) {
                $error = "Image Already Exists!";
            } else {
              move_uploaded_file(@$_FILES['img']['tmp_name'], "data/$rand_dir_name/" . $_FILES['img']['name']);
              $image_name = "$rand_dir_name/" . @$_FILES['img']['name'];

              foreach($from as $index => $value) {
                $sql = "INSERT INTO `design_numbers`(`id`, `color`, `from`, `to`, `assigned_number`, `item_name`, `item_image` , `qr_code`, `rate`, `connection`, `insert_date`, `delete`) VALUES (null,'$color_implode','$from[$index]','$to[$index]','$decided_number','$item_name','$image_name','$filename','$rate[$index]','$global_id','$date','0')";
                $query = mysqli_query($conn, $sql);
              }
              
            }
            }
            }

            ?>
              <form action="add-design-number.php" method="POST" enctype='multipart/form-data'>
              <div class="row row-sm">
              <div class="col-lg">
              What are the colors?
              <input class="form-control" placeholder="Example Red, Blue & Black" type="text" name="color[]">
              <div id="new_color"></div><br>
              <input type="hidden" value="1" id="total_color">
              <button type="button" class="btn btn-outline-primary" onclick="add()">Add More +</button>
              <button type="button" onclick="remove()" class="btn btn-outline-light">Remove -</button>
            </div><!-- col -->
            <div class="col-lg">
            What is the size?
            <div class="row row-sm">
            <div class="col-lg">
              <input class="form-control" placeholder="From" type="number" name="from[]"><br>
</div>
<div class="col-lg">              
<input class="form-control" placeholder="To" type="number" name="to[]">
</div>
<div class="col-lg">              
<input class="form-control" placeholder="Rate" type="text" name="rate[]">
</div>
</div>
<input type="hidden" value="1" id="total_section">            
<div id="new_section"></div>
<button type="button" class="btn btn-outline-primary" onclick="addd()">Add More +</button>
<button type="button" onclick="removee()" class="btn btn-outline-light">Remove -</button>
            </div><!-- col -->
            </div>
            <br>
            <div class="row row-sm">
            <div class="col-lg">
            Name of item?
              <input class="form-control" placeholder="Example Fidding Top, Jacket" type="text" name="item_name">
            </div><!-- col -->
            <div class="col-lg">
            Image of item?
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="img">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div><!-- col -->
            </div>
            <hr>
            <button type="submit" name="add_design" class="btn btn-dark btn-block">Add Design</button>
        </form>
          <?php include_once('./inc/footer.php'); ?>
  </body>
</html>
<script>
function add(){
      var new_color_no = parseInt($('#total_color').val())+1;
      var new_input="<input class='form-control' placeholder='Example Red, Blue & Black' name='color[]' type='text' style='margin-top: 10px;' id='new_"+new_color_no+"'>";
      $('#new_color').append(new_input);
      $('#total_color').val(new_color_no);
      console.log(new_color_no)
    }
    function remove(){
      var last_color_no = $('#total_color').val();
      if(last_color_no>1){
        $('#new_'+last_color_no).remove();
        $('#total_color').val(last_color_no-1);
      }
    }



    function addd() {
      var new_section_no = parseInt($('#total_section').val())+1;
      var new_section='<div class="row row-sm" id="new_'+new_section_no+'" style="margin-bottom: 20px;"><div class="col-lg"><input class="form-control" placeholder="From" type="number" name="from[]"></div><div class="col-lg"><input class="form-control" placeholder="To" type="number" name="to[]"></div><div class="col-lg"><input class="form-control" placeholder="Rate" type="text" name="rate[]"></div><br></div>';
      $('#new_section').append(new_section);
      $('#total_section').val(new_section_no);
      console.log(new_section_no)
    }
    function removee(){
      var last_section_no = $('#total_section').val();
      if(last_section_no>1){
        $('#new_'+last_section_no).remove();
        $('#total_section').val(last_section_no-1);
      }
    }
</script>