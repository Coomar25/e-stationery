
<?php
session_start();
$base_url = 'http://localhost:8080/projectdemo/';
$_SESSION['base_url'] = $base_url;
$_SESSION['active_url'] = '';
include 'Helper/SpecialCharHelper.php';
include 'Helper/FlashMessageHelper.php';
include 'Helper/ErrorHelper.php';
include 'Helper/RouteHelper.php';

if (isset($_GET['r'])) {
    $controller = $_GET['r'];
    switch ($controller) {
        case 'mylogin':
            $_SESSION['active_url'] = 'mylogin';
            include 'controller/MyloginController.php';
            break;
        case 'site':
            $_SESSION['active_url'] = 'site' ;
            include 'controller/SiteController.php';
            break;
        case 'about' :
            $_SESSION['active_url'] = 'about';
            include 'controller/AboutUsController.php';
            break;
        case 'login':
            $_SESSION['active_url'] = 'login';
            include 'controller/LoginController.php';
            break;
        case 'signup':
            $_SESSION['active_url'] = 'signup';
            include 'controller/SignupController.php';
            break;
        case 'logout':
            include 'controller/LogoutController.php';
            break;
        case 'userprofile':
            $_SESSION['active_url'] = 'userprofile';
            include 'controller/UserProfileController.php';
            break;
        case 'employerlogin':
            $_SESSION['active_url'] = 'employerlogin';
            include 'controller/EmployerLoginController.php';
            break;
        case 'employersignup':
            $_SESSION['active_url'] = 'employersignup';
            include 'controller/EmployerSignupController.php';
            break;
        case 'employerprofile':
            $_SESSION['active_url'] = 'employerprofile';
            include 'controller/EmployerProfileController.php';
            break;
     case 'jobpost':
                 $_SESSION['active_url'] = 'jobpost';
            include 'controller/JobPostController.php';
            break;
      case 'jobpostview':
                 $_SESSION['active_url'] = 'jobpostview';
            include 'controller/JobPostViewController.php';
            break;
      case 'employerjobpostview':
                 $_SESSION['active_url'] = 'employerjobpostview';
            include 'controller/EmployerJobPostViewController.php';
            break;
         case 'updatejobpost':
                 $_SESSION['active_url'] = 'updatejobpost';
            include 'controller/UpdateJobPostController.php';
            break;
        case 'applyform':
                 $_SESSION['active_url'] = 'applyform';
            include 'controller/ApplyFormController.php';
            break;
          case 'deletejobpost':
                 $_SESSION['active_url'] = 'deletejobpost';
            include 'controller/DeleteJobPostController.php';
            break;
        case 'search':
            $_SESSION['active_url']='search';
            include 'controller/JobSearchController.php';
          break;
      case 'fileupload':
            $_SESSION['active_url']='fileupload';
            include 'controller/FileUploadController.php';
          break;  
      case 'alljobpost':
            $_SESSION['active_url']='alljobpost';
            include 'controller/AllJobPostController.php';
          break;
      case 'landing':
            $_SESSION['active_url']='landing';
            include 'controller/LandingController.php';
          break;
        case 'logout':
            include 'controller/LogoutController.php';
            break;
        default :
            throwError(404, 'Requested page does not exists.');
            break;
    }
    return;
} else {
    include 'controller/SiteController.php';
}
