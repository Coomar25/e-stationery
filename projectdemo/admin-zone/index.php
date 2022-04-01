
<?php
session_start();
$base_url = 'http://localhost:8080/projectdemo/admin-zone/';
$_SESSION['base_url'] = $base_url;
$_SESSION['active_url'] = '';
include 'Helper/SpecialCharHelper.php';
include 'Helper/FlashMessageHelper.php';
include 'Helper/ErrorHelper.php';
include 'Helper/RouteHelper.php';


if (isset($_GET['r'])) {
    $controller = $_GET['r'];
    switch ($controller) {
        case 'site':
            $_SESSION['active_url'] = 'site';
            include 'controller/SiteController.php';
            break;
            case 'editfood':
            $_SESSION['active_url'] = 'editfood';
            include 'controller/editfoodController.php';
            break;
            case 'deletefood':
            $_SESSION['active_url'] = 'deletefood';
            include 'controller/deletefoodController.php';
            break;
            case 'addfood':
            $_SESSION['active_url'] = 'addfood';
            include 'controller/addfoodController.php';
            break;
            case 'managefood':
            $_SESSION['active_url'] = 'managefood';
            include 'controller/managefoodController.php';
            break;

            case 'usermanage':
            $_SESSION['active_url'] = 'usermanage';
            include 'controller/usermanageController.php';
            break;
            case 'signup':
            $_SESSION['active_url'] = 'signup';
            include 'controller/SignupController.php';
            break;

        case 'login':
            $_SESSION['active_url'] = 'login';
            include 'controller/LoginController.php';
            break;
        case 'users':
            $_SESSION['active_url'] = 'users';
            include 'controller/UsersController.php';
            break;
            case 'logout':
            include 'controller/LogoutController.php';
            break;
        case 'feedback':
            $_SESSION['active_url'] = 'feedback';
            include 'controller/FeedbackController.php';
            break;
        case 'gallery':
            $_SESSION['active_url'] = 'gallery';
            include 'controller/GallaryController.php';
            break;
        case 'services':
            $_SESSION['active_url'] = 'services';
            include 'controller/ServicesController.php';
            break;
        case 'places':
            $_SESSION['active_url'] = 'places';
            include 'controller/PlacesController.php';
            break;
     case 'setup':
                 $_SESSION['active_url'] = 'setup';
            include 'controller/SetupController.php';
            break;
      case 'about':
                 $_SESSION['active_url'] = 'about';
            include 'controller/AboutController.php';
            break;
      case 'slider':
                 $_SESSION['active_url'] = 'slider';
            include 'controller/SliderController.php';
            break;
        default :
            throwError(404, 'Requested page does not exists.');
            break;
    }
    return;
} else {
    include 'controller/SiteController.php';
}
