<title>DM Print - Mspowerbar</title>
<?php include_once('./inc/connection.php'); 
@$data = @$_GET['id'];
$sql = "SELECT * FROM `dm_data` WHERE id='$data' AND `delete`='0' AND `connection`='$global_id'";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query)) {
    $master = $row['master'];
    $material = $row['material'];
    $remarks = $row['remarks'];
    $connection = $row['connection'];
    $date = $row['date'];
    $time = $row['time'];
    $auth_connection = $row['auth_connection'];
}

$sql2 = "SELECT * FROM `design_numbers` WHERE assigned_number='$auth_connection' AND `connection`='$global_id'";
$query2 = mysqli_query($conn, $sql2);
while($row2 = mysqli_fetch_assoc($query2)) {
    $qr_code = $row2['qr_code'];
    $color = $row2['color'];
    $item = $row2['item_name'];
}
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
<style type='text/css'>
* {
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
    font-weight: 400;
}
    </style>
<div class="demo" style='margin-right: auto; margin-left: auto; width: 794px; height: 1123px; background: #fff;'>
    <div style='display: flex; flex-direction: row; justify-content: space-between;'>
    <div>
        <img src='img/brand-logo.png' width='160px'>
    </div>
    <div>
        <br>
        <p style='text-align: right; font-size: 14px; line-height: 10px;'><b style='font-weight: 600;'>Address:</b> Flat No. 2, Housing Society</p>
        <p style='text-align: right; font-size: 14px; line-height: 5px;'><b style='font-weight: 600;'>Email:</b> mspowerbar@gmail.com</p>
        <p style='text-align: right; font-size: 14px; line-height: 5px;'><b style='font-weight: 600;'>Ph. No:</b> +91 89568 88109</p>
        <p style='text-align: right; font-size: 14px; line-height: 5px;'><b style='font-weight: 600;'>GSTIN:</b> 1565465165454</p>
    </div>
    </div>
    <hr style='height: 6px; border: 0px; background: #aad8d3;'>
    <div style='display: flex; flex-direction: row; justify-content: space-between;'>
    <div style='flex: 1;'>
        <img src='img/brand-logo-crop.png' width='180px' style='padding: 10px;'>
        <p style='text-align: left; font-size: 14px; line-height: 5px;'><b style='font-weight: 600;'>Address:</b> <?=$global_city?></p>
        <p style='text-align: left; font-size: 14px; line-height: 5px;'><b style='font-weight: 600;'>Email:</b> <?=$global_email?></p>
        <p style='text-align: left; font-size: 14px; line-height: 5px;'><b style='font-weight: 600;'>Ph. No:</b> +91 <?=$global_mobile?></p>
        <p style='text-align: left; font-size: 14px; line-height: 5px;'><b style='font-weight: 600;'>GSTIN:</b> <?=$global_gstin?></p>
    </div>
    <div style='flex: 1;'>
        <p style='text-align: center; font-size: 18px; padding: 5px; border: 1px solid #000; font-weight: 600;'>D. NO. <?=$auth_connection?></p>
    </div>
    <div style='flex: 1;'>
        <img src='./<?=$qr_code?>' style='float: right; margin-top: 10px;' width='100px'><br>
        <div style='clear: both;'></div>
        <p style='text-align: right; font-size: 16px; line-height: 2px;'><b style='font-weight: 600;'>UNIQUE CODE</b></p>
        <p style='text-align: right; font-size: 14px; line-height: 4px;'><b style='font-weight: 600;'>Date: </b> <?=$date?></p>
        <p style='text-align: right; font-size: 14px; line-height: 4px;'><b style='font-weight: 600;'>Time: </b> <?=$time?></p>
        <p style='text-align: right; font-size: 14px; line-height: 4px;'><b style='font-weight: 600;'>Item Name:</b> <?=$item?></p>
        <p style='text-align: right; font-size: 14px; line-height: 4px;'><b style='font-weight: 600;'>Colors:</b> <?=$color?></p>
    </div>
    </div>
    <?php
        $sql = "SELECT * FROM `dm_data_addon` WHERE `dm_data_conn`='$data' AND `connection`='$global_id'";
        $query = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($query)) {
            $material_name = $row['material_name'];
            $material_size = $row['material_size'];
            $material_qty = $row['material_qty'];
            ?>
    <div style='display: flex; flex-direction: row; margin-top: 10px;'>
    <div style='flex: 1; background: #aad8d3; padding: 10px;'>
        <p style='font-weight: 600; font-size: 14px; line-height: 4px;'>Name</p>
        <p style='font-weight: 600; font-size: 14px; line-height: 4px;'>Size</p>
        <p style='font-weight: 600; font-size: 14px; line-height: 4px;'>Qty</p>
    </div>
    <div style='flex: 9; background: #f1f1f1; padding: 10px;'>
        <p style='font-weight: 400; font-size: 14px; line-height: 4px;'><?=$material_name;?></p>
        <p style='font-weight: 400; font-size: 14px; line-height: 4px;'><?=$material_size;?></p>
        <p style='font-weight: 400; font-size: 14px; line-height: 4px;'><?=$material_qty;?></p>
    </div>
    </div>
            <?php
        }
    ?>
    <hr style='height: 80px; background: #fff; border: 0 none;'>
    <div style='display: flex; flex-direction: row; justify-content: space-between;'>
        <div style='flex: 6;'>
        <p style='font-weight: 600; font-size: 14px; line-height: 4px;'>Remarks</p>
        <p style='font-weight: 400; font-size: 14px; line-height: 4px;'><?=$remarks?></p>
        </div>
        <div style='flex: 4;'>
        <?php
        $sql = "SELECT * FROM `dm_data_addon` WHERE `dm_data_conn`='$data' AND `connection`='$global_id'";
        $query = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($query)) {
            @$material_size += $row['material_size'];
            @$material_qtity += $row['material_qty'];
        }
        $total = $material_size * $material_qtity;
            ?>
        <p style='text-align: right; font-size: 14px; line-height: 4px;'><b style='font-weight: 600;'>Total Quantity:</b> <?=$material_qtity;?></p>
        <p style='text-align: right; font-size: 14px; line-height: 4px;'><b style='font-weight: 600;'>Total Amount:</b> Rs. <?=$total;?>/-</p>
        </div>
</div>
    <hr style='height: 6px; border: 0px; background: #aad8d3;'>
    <div style='display: flex; flex-direction: row; justify-content: space-between;'>
        <div style='flex: 1; border: 2px solid #aad8d3; height: 160px; margin: 10px;'>

        </div>
        <div style='flex: 1; border: 2px solid #aad8d3; height: 160px; margin: 10px;'>

        </div>
        <div style='flex: 1; border: 2px solid #aad8d3; height: 160px; margin: 10px;'>

        </div>
    </div>
    <br>
    <center><p style='font-weight: 600; font-size: 12px;'>Powered By</p>
<img src='./img/brand-logo-crop.png' width='80px;'></center>
</div>
<center><button id="basic" href="#nada" style='background: #111; border: 1px solid #111; padding: 10px; color: #fff; font-size: 14px; border-radius: 10px; margin-top: 20px; margin-bottom: 20px; cursor: pointer;'>Print or Save PDF</button></center>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://jasonday.github.io/printThis/printThis.js"></script>
<script>
     $('#basic').on("click", function () {
      $('.demo').printThis({
        base: ""
      });
    });
    </script>