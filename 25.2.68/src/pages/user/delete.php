<meta charset="UTF-8">
<meta name="viewport" content="width=320, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<?php include_once('../authen.php') ?>
<?php
    if (isset($_GET['id_user'])){
        $sql = "DELETE FROM `rq_user` WHERE `id_user` = '".$_GET['id_user']."' ";
        $result = $conn->query($sql);

        if( $conn->affected_rows ){
            echo '<script> alert("Deleted Success!")</script>'; 
            header('Refresh:0; url=index.php'); 
        } else {
            echo '<script> alert("No Data!")</script>'; 
            header('Refresh:0; url=index.php');
        }

    } else {
        header('Refresh:0; url=index.php');
    }

?>