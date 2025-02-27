<?php
require('./api/config.php'); // เรียกใช้ไฟล์ config.php สำหรับเชื่อมต่อฐานข้อมูล
session_start(); // เริ่มต้น session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputUsername = $_POST['username'] ?? '';
    $inputPassword = $_POST['password'] ?? '';

    if (empty($inputUsername) || empty($inputPassword)) {
        echo json_encode(["status" => "error", "message" => "Username and password are required."]);
        exit;
    }

    // **ส่ง request ไปยัง API**
    $postData = [
        'fnc' => 'authenUserLogin',
        'uname' => $inputUsername,
        'psword' => $inputPassword
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://192.168.4.246/request_cetificate/api/user-api.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo json_encode(["status" => "error", "message" => "API request failed: " . curl_error($ch)]);
        curl_close($ch);
        exit;
    }

    curl_close($ch);

    // **แปลง response เป็น JSON**
    $responseData = json_decode($response, true);

    if (isset($responseData['HR_FNAME'])) { // เช็คว่าข้อมูลถูกต้อง
        $_SESSION['user'] = $responseData;

        // ตรวจสอบว่าผู้ใช้มีอยู่ในฐานข้อมูลหรือไม่
        $stmt = $conn->prepare("SELECT id_user, full_name, email_address, career_role, work_group FROM rq_user WHERE uname = ?");
        $stmt->bind_param("s", $inputUsername);
        $stmt->execute();
        $result = $stmt->get_result();

        // **กำหนดค่าต่างๆ จาก API**
        $full_name = normalizeName($responseData['HR_FNAME']);
        $position = $responseData['POSITION_IN_WORK'];
        $department = $responseData['DEPARTMENT_NAME'];
        $work_group = $responseData['HR_DEPARTMENT_SUB_NAME'];
        $mission = $responseData['HR_DEPARTMENT_SUB_SUB_NAME'];
        $start_working = $responseData['HR_STARTWORK_DATE'];
        $kind_type = $responseData['HR_KIND_TYPE_NAME'];
        $email = $responseData['HR_EMAIL'];
        $leader_name = normalizeName($responseData['SUB_SUB_LEADER']);
        $levelCareer = $responseData['LEVEL_CAREER'];

        if ($result->num_rows > 0) { 
            // **มีบัญชีอยู่แล้ว อัปเดต latest_login**
            $row = $result->fetch_assoc();
            $id_user = $row['id_user'];

            $stmt = $conn->prepare("UPDATE rq_user SET latest_login = NOW() WHERE uname = ?");
            $stmt->bind_param("s", $inputUsername);
            $stmt->execute();

            $_SESSION['id_user'] = $id_user;
            $_SESSION['career_role'] = $row['career_role'];
            $_SESSION['email'] = $row['email_address'];

        } else { 
            // **ยังไม่มีบัญชี ให้เพิ่มลงฐานข้อมูล**
            $stmt = $conn->prepare("INSERT INTO rq_user (full_name, uname, psword, position, department, work_group, mission, start_working, kind_type, latest_login, email_address, career_role)
            VALUES ('$fname','$inputUsername','$inputPassword','$position','$department','$work_group','$mission','$start_working','$kind_type',NOW(),'$email','$levelCareer')");

           
            
            if ($stmt->execute()) {
                $id_user = $conn->insert_id;
                $_SESSION['id_user'] = $id_user;
                $_SESSION['career_role'] = $levelCareer;
                $_SESSION['email'] = $email;
            } else {
                echo json_encode(["status" => "error", "message" => "Error saving user data: " . $conn->error]);
                exit;
            }
        }

        echo json_encode([
            "status" => "success",
            "message" => "Login successful",
            "id_user" => $id_user,
            "role" => $levelCareer,
            "email" => $email,
            "work_group" => $work_group,
            "leader_name" => $leader_name,
            "fullname" => $full_name
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid login credentials."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

// **ฟังก์ชันปรับแต่งชื่อ**
function normalizeName($name) {
    $name = preg_replace('/\s+/', '', $name);
    $name = str_ireplace(["นาย", "นาง", "น.ส."], "", $name);
    return strtolower($name);
}
?>
