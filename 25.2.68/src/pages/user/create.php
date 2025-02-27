<?php include_once('../authen.php') ?>
<?php
    
    //print_r($_POST);

header(('Access-Control-Allow-Origin: *'));
header(('Content-type: application/json; charset=utf-8'));

    // if(isset($_POST['submit'])){
    //     $role = $_POST['selectBox']; 

    //         $sql = "INSERT INTO `rq_user` (`full_name`, `uname`, `psword`, `position`, `department`, `work_group`, `mission`, `start_working`, `kind_type`, `latest_login`, `email_address`, `career_role`) 
    //                 VALUES ('".$_POST['full_name']."',
    //                         '".$_POST['uname']."', 
    //                         '".$_POST['password']."', 
    //                         '".$_POST['position']."',
    //                         '".$_POST['department']."',
    //                         '".$_POST['work_group']."',
    //                         '".$_POST['mission']."',
    //                         '".$_POST['start_working']."',
    //                         '".$_POST['kind_type']."',
    //                         '".$_POST['latest_login']."',
    //                         '".$_POST['email_address']."',
    //                         '".$_POST['craeer_role']."' )";
                          
    //         $result = $conn->query($sql) or die($conn->error);
    //         if($result){
    //             echo '<script>alert("Add Data Success!")</script>';
    //             header('Refresh:0; url="index.php"');
    //         }
       
    // } else {
    //     header('location:index.php');
    // }
?>