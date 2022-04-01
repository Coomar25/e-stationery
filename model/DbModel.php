
<?php

function db_connect() {
    $db['host'] = "localhost";
    $db['username'] = "root";
    $db['password'] = "";
    $db['db_name'] = "webtechnology";
    $conn = new mysqli($db['host'], $db['username'], $db['password'], $db['db_name']);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function login_user($uname, $password)
{
 $conn = db_connect();
    $sql = "SELECT user_id,uname,user_type FROM user where uname='$uname' and password='$password' limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return false;
    }

}

function get_aboutus(){
     $conn = db_connect();
     $sql = "SELECT * FROM about ";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}
function find_user_by_email($email) {
    $conn = db_connect();
    $sql = "SELECT * FROM user where email='$email' limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function find_user_by_id($id) {
    $conn = db_connect();
    $sql = "SELECT * FROM user where id=$id limit 1";
    $result = $conn->query($sql);
    //var_dump($result);die;
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function get_food_item()
{
$conn = db_connect();
$sql = "select * from food_item";
$result = $conn->query($sql);
$conn->close();
if($result->num_rows > 0)
{
    return $result;
}
else
{
    return false;
}

}


function signup_new_user($name, $email, $password, $address, $phone, $target,$usertype, $create_date) {
    $conn = db_connect();
    $stmt = $conn->prepare("INSERT INTO user (uname,email,password,address,phone,imageurl,user_type,created_date) values(?, ?, ?,?, ?, ?,?,?)");
    $stmt->bind_param('ssssssis', $name, $email, $password, $address, $phone, $target,$usertype, $create_date);
    $result = $stmt->execute();
    if ($result) {
        $stmt->close();
        $conn->close();
        return $result;
    } else {
        $stmt->close();
        $conn->close();
        return false;
    }
}

function employer_signup_new_user($name, $cname, $csize, $email, $password, $address, $phone, $target, $date) {
    $conn = db_connect();
    $stmt = $conn->prepare("INSERT INTO employer (name,cname,csize,email,password,address,phone,img,date) values(?, ?, ?, ?, ?, ?, ?, ?,?)");
    $stmt->bind_param('ssssssssi', $name, $cname, $csize, $email, $password, $address, $phone, $target, $date);
    $result = $stmt->execute();

    if ($result) {

        $stmt->close();
        $conn->close();
        return $result;
    } else {
        $stmt->close();
        $conn->close();
        return false;
    }
}

function db_login($email, $password) {

    $conn = db_connect();

    $sql = "SELECT user_id,uname,user_type FROM user where email='$email' and password='$password' limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return false;
    }
}

function employer_login($email, $password) {

    $conn = db_connect();

    $sql = "SELECT id,name FROM employer where email='$email' and password='$password' limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return false;
    }
}

function uplode_cv($fk_id, $target) {
    $conn = db_connect();
    $sql = "INSERT into resume(fk_id,file) values($fk_id,$target)";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function my_job_post() {
    $conn = db_connect();
    $sql = "SELECT * FROM jobpost where fk_id=" . $_SESSION['employer']["user_id"];
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function all_job_post() {
    $conn = db_connect();
    $sql = "SELECT * FROM jobpost order by id desc ";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function highly_paid() {
    $conn = db_connect();

    $sql = "SELECT * FROM jobpost order by salary desc ";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function view_post($fk_id) {
    $conn = db_connect();

    $sql = "SELECT * FROM jobpost where id=$fk_id ";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function delete_jobpost_by_id($id) {
    $conn = db_connect();
    $sql = "Delete from jobpost where id=$id";
    $conn->query($sql);
    if ($conn->affected_rows > 0) {
        $conn->close();
        return TRUE;
    } else {
        $conn->close();
        return false;
    }
}

function create_job_post($fk_id, $job_title, $company_name, $company_add, $experience, $salary, $vacency, $end_date, $qualification, $contact_us, $create_date) {
    $conn = db_connect();
    $stmt = $conn->prepare("INSERT INTO jobpost (fk_id,job_title,company_name,company_add,experience,salary,vacency,end_date,qualification,contact_us,create_date) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('issssssissi', $fk_id, $job_title, $company_name, $company_add, $experience, $salary, $vacency, $end_date, $qualification, $contact_us, $create_date);

    if ($stmt->execute()) {
        return $conn;
    } else {
        $stmt->close();
        $conn->close();
        return false;
    }
}

function update_post($fk_id, $job_title, $company_name, $experience, $salary, $vacancy, $end_date, $qualification, $contact_us) {
    $conn = db_connect();
    $update = "Update jobpost set job_title='$job_title', company_name='$company_name', experience ='$experience',salary='$salary',vacency='$vacancy',end_date='$end_date',qualification='$qualification',contact_us='$contact_us' "
            . "where id=$fk_id and fk_id=" . $_SESSION['employer']['user_id'];
    $result = $conn->query($update);

    if ($result) {
        return $conn;
    } else {
        $conn->close();
        return false;
    }
}

function find_jobpost_by_id($id) {
    $conn = db_connect();
    $sql = "SELECT * FROM resume RIGHT JOIN jobpost ON jobpost.id=resume.fk_jobpost_id WHERE fk_user_id=$id order by resume.id desc";
    $result = $conn->query($sql);
    
    $conn->close();
    if ($result->num_rows > 0) {
        
        return $result;
    } else {
        
        return false;
    }
}

function find_post_by_id($id){
      $conn = db_connect();
    $sql = "SELECT * FROM jobpost where id=$id limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function find_user_by_apply_job($id, $today = FALSE) {
    $conn = db_connect();
    $todayQuery = "";
    if ($today) {
        $todayQuery = " AND resume.post_date>" . strtotime("today") . " AND resume.post_date<" . strtotime("tomorrow");
    }
    $sql = "SELECT * FROM resume RIGHT JOIN jobpost ON jobpost.fk_id=resume.fk_jobpost_id RIGHT JOIN user ON user.id=resume.fk_user_id WHERE jobpost.fk_id=$id $todayQuery ORDER BY resume.id desc";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function find_employer_by_id($id) {
    $conn = db_connect();
    $sql = "SELECT * FROM employer where id=$id limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function create_note($title, $description, $fk_user_id, $create_date) {
    $conn = db_connect();
    $stmt = $conn->prepare("INSERT INTO notes (title,description,fk_user_id,create_date) values(?, ?, ?, ?)");
    $stmt->bind_param('ssii', $title, $description, $fk_user_id, $create_date);
    $result = $stmt->execute();
    if ($result) {
        $stmt->close();
        $conn->close();
        return $result;
    } else {
        $stmt->close();
        $conn->close();
        return false;
    }
}

function search_job_by_key($key) {
    $conn = db_connect();


    $sql = "SELECT * FROM jobpost where job_title like '%$key%' or qualification like '%$key%' ";
    $result = $conn->query($sql);
    $conn->close();

    // var_dump($result);
    // die();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function search_job_by_key_paid($key) {
    $conn = db_connect();


    $sql = "SELECT * FROM jobpost where job_title like '%$key%' or qualification like '%$key%'  order by salary desc";
    $result = $conn->query($sql);
    $conn->close();

    // var_dump($result);
    // die();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function images_upload() {
    $id = $_SESSION['employer']['user_id'];
    $db = mysqli_connect("localhost", "root", "", "project");
    $result = mysqli_query($db, "SELECT * FROM employer where id=$id");
    $row = mysqli_fetch_array($result);
    return $row;
//       echo "<img src='images/".$row['images']." ' height=200px;>";
//   
//    
}

function images_view() {
    $id = $_SESSION['user']['user_id'];
    $db = mysqli_connect("localhost", "root", "", "project");
    $result = mysqli_query($db, "SELECT * FROM user where id=$id");
    $row = mysqli_fetch_array($result);
    return $row;
//       echo "<img src='images/".$row['images']." ' height=200px;>";
//   
//    
}

function get_jobpost($uid) {
    // $sql = "SELECT  resume.fk_jobpost_id as jobid,resume.name as username,resume.cv as image, jobpost.job_title as job_title FROM resume "
    //       . "INNER JOIN jobpost ON resume.fk_jobpost_id=jobpost.id where jobpost.fk_id=$fk_user_id order by resume.id desc";
    $conn = db_connect($uid);
    $sql = "SELECT *  FROM jobpost where fk_id=$uid";
    $result = $conn->query($sql);

    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function apply_post($uid) {

    $conn = db_connect($uid);
    $sql = "SELECT  resume.fk_jobpost_id as jobid,resume.name as username,resume.cv as image, jobpost.job_title as job_title FROM resume "
            . "INNER JOIN jobpost ON resume.fk_jobpost_id=jobpost.id where jobpost.fk_id=$fk_user_id order by resume.id desc";
    $result = $conn->query($sql);

    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function get_resume($pid) {
    $conn = db_connect();
    $sql = "SELECT *  FROM resume where fk_jobpost_id=$pid order by id desc";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function apply_resume($uid) {
    $conn = db_connect();
    $sql = "SELECT *  FROM resume where fk_user_id=$uid order by id desc";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function resume_view($fk_user_id, $fk_jobpost_id) {
    $conn = db_connect();
    $sql = "SELECT *  FROM resume where fk_user_id=$fk_user_id and fk_jobpost_id=$fk_jobpost_id";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
//       echo "<img src='images/".$row['images']." ' height=200px;>";
//   
//    
}

function upload_resume($fk_user_id, $fk_jobpost_id, $name, $target, $time) {
    $conn = db_connect();
    $stmt = $conn->prepare("INSERT INTO resume (fk_user_id,fk_jobpost_id,name,cv,post_date) values(?,?, ? ,?,?)");

    $stmt->bind_param('iissi', $fk_user_id, $fk_jobpost_id, $name, $target, $time);
    $result = $stmt->execute();

    if ($result) {
        $stmt->close();
        $conn->close();
        return $result;
    } else {
        $stmt->close();
        $conn->close();
        return false;
    }
}
