<?php
 include "includes/navbar.php";
 include "init.php";

 $query = $db->query("SELECT * FROM user WHERE userid = '$id'");
 $user = mysqli_fetch_assoc($query);
 
?>
<section >
<div class="container">
    <h2 class="h2signin">Balance: <?=$user['Amount'];?></h2>
</div>
</section>
<?php
 include "includes/footer.php";
?>