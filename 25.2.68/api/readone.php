<?php
include '../api/db.php';
try {
    $stmt = $db->prepare('SELECT * FROM rq_user WHERE id_user = ?');
   $stmt->execute([$_GET['id_user']]);
   foreach ($stmt as $row) {
      print_r($row);
   }

   $db = null;
} catch (PDOException $e) {
    print "Error! : " . $e->getMessage() . "<br/>";
    die();
}
?>