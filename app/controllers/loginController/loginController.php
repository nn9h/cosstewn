<?php
    ob_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . "/cosstewn/app/" . "models/loginModel/loginModel.php";
    $login = new Login();

    if(isset($_POST['submit'])) {
        extract($_POST);

        $user = $login->getInfoUser($email);
        $correctPassword = $user['mat_khau'] === $password;

        if($user && $correctPassword) {
            echo "<script>window.location.href='/cosstewn/app/controllers/index.php?page=ho-so&u=" . base64_encode($user['matk']) . "';</script>";
            exit();
        } else {
            $_SESSION['error_log'] = "Sai tai khoan hoac mat khau";
            header("Location: ../index.php?page=dang-nhap");
            exit();
        }
    } else {
        // echo 1;
        // header("Location: /cosstewn/app/controllers/index.php?page=ho-so&u=" . base64_encode($user['matk']));
        echo "<script>window.location.href='/cosstewn/app/controllers/index.php?page=ho-so&u=" . base64_encode($user['matk']) . "';</script>";
        exit();
    }
    ob_end_flush();
?>