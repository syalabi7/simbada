<?php
    include '../config/config.php';

  $sql = "SELECT * FROM kategori";
  $rs = mysqli_query($conn, $sql);

  $items = array();
  while ($row = mysqli_fetch_array($rs)) {
    $items[] = $row;
  }
  echo json_encode($items);
  mysqli_close($conn);
?>