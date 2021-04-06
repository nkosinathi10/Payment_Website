<?php
    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");
    require_once 'init.php';
    include 'includes/navbar.php';
    global $sp;
    $sp = $_GET['sp'];
    $id= $_GET['id'];
    if(isset($_POST['TXN_AMOUNT'])){
        $amount1 = $_POST['TXN_AMOUNT'];
        $query = $db->query("SELECT * FROM user WHERE userid = '$id'");
        $user = mysqli_fetch_assoc($query);
        $amount = $user['Amount'];

        if($sp == 1){
            $amount = $amount + $amount1;
            $query = $db->query("UPDATE user SET Amount='$amount' WHERE userid = '$id'");
        }
        else
        $amount = $amount - $amount1;
            $query = $db->query("UPDATE user SET Amount='$amount' WHERE userid = '$id'");
    }
?>

<body>
    <form method="POST" action="pay.php?sp=<?=$sp;?>&id=<?=$id;?>">
    
    <label for="">Transaction Amount</label>
    <input type="text" id="TXN_AMOUNT" name="TXN_AMOUNT" />
    </div>
    <input type="submit" class="btn btn-primary"/>

    </div>
    </form>
</body>
</html>