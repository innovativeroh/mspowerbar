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
            <span>DM</span>
</div>
          <h2 class="az-content-title">List DM's</h2>
          <hr class="mg-y-2">
          <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Master</th>
      <th scope="col">Material</th>
      <th scope="col">Remarks</th>
      <th scope="col">Date / Time</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
            $sql = "SELECT * FROM `dm_data` WHERE `connection`='$global_id' and `delete`='0'";
            $query = mysqli_query($conn, $sql);
            while($rows = mysqli_fetch_assoc($query)) {
              $id = $rows['id'];
              $master = $rows['master'];
              $material = $rows['material'];
              $remarks = $rows['remarks'];
              $date = $rows['time']." ".$rows['date'];
              echo '
              <tr>
              <th scope="row">'.$id.'</th>
              <td>'.$master.'</td>
              <td>'.$material.'</td>
              <td>'.$remarks.'</td>
              <td>'.$date.'</td>
              <td>';
              ?>
<div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu tx-13" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#" target="_blank">View PDF</a>
            <a class="dropdown-item" href="edit-design.php?id=<?=$id?>">Edit</a>
            <a class="dropdown-item" href="delete-dm.php?id=<?=$id?>">Delete</a>
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
