<?php
    include_once('./inc/connection.php');
    $getdata = @$_GET['data'];
?>
<select class="form-control select2" multiple="multiple" disabled>
<?php
$sql = "SELECT * FROM `design_numbers` WHERE `assigned_number`='$getdata' AND`connection`='$global_id'";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query)) {
    $from = $row['from'];
    $to = $row['to'];
    $total = $from."-".$to;
    echo '<option value="'.$total.'">'.$total.'</option>';
}
?>
</select>