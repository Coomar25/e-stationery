<?php

include 'model/DbModel.php';


if (empty($_POST)) {
    include 'view/login.php';
    return;
}

try {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = 'Email and password are required.';
      
        include 'view/login.php';
        return;
    }
    $email = filterText($_POST['email']);
    $password = filterText($_POST['password']);

    $user = db_login($email, $password);
    if ($user) {
        $_SESSION['admin']['login'] = TRUE;
        $_SESSION['admin']['user_id'] = $user['id'];
        $_SESSION['admin']['user_name'] = $user['name'];
        redirect('userprofile');
    } else {
        $error['body'] = 'No user found with given email and password.';
        $error['title'] = 'Info!!!';
        $error['type'] = 'info';
        setFlash('message', $error);
        include 'view/login.php';
        return;
    }
} catch (Exception $ex) {
    include 'controller/ErrorController.php';
}



