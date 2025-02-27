<meta charset="UTF-8">
<meta name="viewport" content="width=320, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<?php include_once('../authen.php') ?>
<?php
//print_r($_POST);
    if(isset($_POST['submit'])){

        $role = $_POST['selectBox']; 

        $sql = "UPDATE `item_user` 
                SET username = '".$_POST['username']."', 
                    password = '".$_POST['password']."', 
                    role = '".$role."', 
                    emp_id = '".$_POST['emp_id']."', 
                    emp_name = '".$_POST['emp_name']."', 
                    department = '".$_POST['department']."',
                    position = '".$_POST['position']."'
                    WHERE id = '".$_POST['id']."'; ";

        $result = $conn->query($sql) or die($conn->error);
        if($result){
            echo '<script> alert("Updated Success!") </script>';
            header('Refresh:0; url=index.php');
        }

    } else {
        header('Refresh:0; url=index.php');
    }
?>