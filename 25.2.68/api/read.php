<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json; charset=utf-8');
include '../api/db.php';
try {
    $user = 'root';
    $pass = '';
    $db = new PDO('mysql:host=localhost;dbname=db_item', $user, $pass);
    $users = array();
    foreach($db->query('SELECT * from rq_user') as $row) {
        array_push($users , array(
            'id_user' => $row['id_user'],
            'full_name' => $row['full_name'],
            'uname' => $row['uname'],
            'psword' => $row['psword'],
            'position' => $row['position'],
            'department' => $row['department'],
            'work_group' => $row['work_group'],
            'mission' => $row['mission'],
            'start_working' => $row['start_working'],
            'kind_type' => $row['kind_type'],
            'latest_login' => $row['latest_login'],
            'email_address' => $row['email_address'],
            'career_role' => $row['career_role']
        ));
    }

    echo json_encode($users);
    $db = null;
} catch (PDOException $e) {
    print "Error! : " . $e->getMessage() . "<br/>";
    die();
    }
?>