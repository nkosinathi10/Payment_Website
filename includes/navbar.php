<?php
 include "includes/head.php";
 global $id;
 $id = $_GET['id'];
?>
<div class="Nav" id="myNav">
  <a href="home.php?id=<?=$id;?>" class="active">Home</a>
  <a href="pay.php?sp=1&id=<?=$id;?>">Deposit</a>
  <a href="pay.php?sp=0&id=<?=$id;?>">Withdraw</a>
  <a href="index.php">Sign Out</a>
  <a href="javascript:void(0);" class="icon" onclick="Navfuction()">
    <i class="fa fa-bars"></i>
  </a>
</div>