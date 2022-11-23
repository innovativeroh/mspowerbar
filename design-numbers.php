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
          <h2 class="az-content-title">List Design Numbers</h2>
          <hr class="mg-y-2">
          <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">D.No.</th>
      <th scope="col">Colors</th>
      <th scope="col">Sizes</th>
      <th scope="col">Item Name</th>
      <th scope="col">Rate</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
            $sql = "SELECT * FROM `design_numbers` WHERE `connection`='$global_id' and `delete`='0'";
            $query = mysqli_query($conn, $sql);
            while($rows = mysqli_fetch_assoc($query)) {
              $id = $rows['id'];
              $color = $rows['color'];
              $from = $rows['from'];
              $to = $rows['to'];
              $size = $from."-".$to;
              $assigned_no = $rows['assigned_number'];
              $item_name = $rows['item_name'];
              $rate = $rows['rate'];
              $qr_image = $rows['qr_code'];
              $connection = $rows['connection'];
              $insert_date = $rows['insert_date'];
              $item_image = $rows['item_image'];
              $changeDate = date("d-m-Y", strtotime($insert_date));
              echo '<tr>
              <th scope="row">'.$id.'</th>
              <td>'.$color.'</td>
              <td>'.$size.'</td>
              <td>'.$item_name.'</td>
              <td>'.$rate.'</td>
              <td>'.$changeDate.'</td>
              <td>';
              ?>
<div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu tx-13" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="./<?=$qr_image?>" target="_blank">View QR</a>  
            <a class="dropdown-item" href="./data/<?=$item_image?>" target="_blank">View Item</a>
            <a class="dropdown-item" href="edit-design.php?id=<?=$id?>">Edit</a>
              <a class="dropdown-item" href="delete-design.php?id=<?=$id?>">Delete</a>
            </div>
          </div>
              <?php echo '</td>
            </tr>';
            }
          ?>
  </tbody>
</table>
          <?php include_once('./inc/footer.php'); ?>
  </body>
</html>
