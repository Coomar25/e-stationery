<?php

include 'model/DbModel.php';

if(isset($_GET["id"]))
{
    $user = get_user_by_id($_GET["id"]);
    include "view/signup.php";
    return;
}

$user = false;
if (empty($_POST)) {
    //$user = false;
    include 'view/signup.php';
    return;
}

try {
    $flag = empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['address']) || empty($_POST['phone']);

    //validate user inputdata
    if ($flag) {
        $error['body'] = 'All input field are required.';
        $error['title'] = 'Danger!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        //$user = false;
        include 'view/signup.php';
        return;
    }
    //checking minimum length of password.
    $password = filterText($_POST['password']);
    if (strlen($password) < 7) {
        $error['body'] = 'Password minimum length is 7.';
        $error['title'] = 'Danger!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        include 'view/signup.php';
        return;
    }

    //checking if email already exists.
    $email = filterText($_POST['email']);
    $valudate = find_user_by_email($email);
    if ($valudate) {
        $error['body'] = 'Email already taken.';
        $error['title'] = 'Danger!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        //$user = false;
        include 'view/signup.php';
        return;
    }

    $name = filterText($_POST['name']);
    $address = filterText($_POST['address']);
    $phone = filterText($_POST['phone']);
    $target="";
       if (!empty($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        $target = "images/".basename($_FILES['fileToUpload']['name']);
      //  echo $target;
        //die();
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target);
    }
    $id = 0 ; 
    if(isset($_POST["uid"]))
    {
    $id = $_POST["uid"];
    }
    if($id>0)
    {
        $user = update_user_by_id($name, $email, $password, $address, $phone,$target,$id);
        if ($user) {
        $msg['title']='Update Success!!';
        $msg['body']="You have successfully updated user.";
        $msg['type']='success';
        setFlash('message', $msg);
        redirect('usermanage');
        }
        else
        {
        throwError(500, 'Unable to complete your request.');
        }

    }
    else
    {
    $user = signup_new_user($name, $email, $password, $address, $phone,$target, time());
    if ($user) {
        $msg['title']='Success!!';
        $msg['body']="You have successfully signup.";
        $msg['type']='success';
        setFlash('message', $msg);
        header("location:" . $base_url . "?r=login");
    } else {
        throwError(500, 'Unable to complete your request.');
    }
    }

} catch (Exception $ex) {
    throwError();
}
?>