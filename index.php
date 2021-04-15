<?php  
 
// INF653 VB Midterm Project
// Author: Craig Freeburg
// Date: 3/15/2021

require ('./model/database.php');
require ('./model/vehicles_db.php');
require ('./model/make_db.php');
require ('./model/type_db.php');
require ('./model/class_db.php');


//Start Session
$lifetime = 60 * 60 * 24 * 14; //cookie will save for 2 weeks
session_set_cookie_params($lifetime, '/');
session_start();

$userMake;
$userType;
$userClass;

$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
if(!$make_id)
{
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
}

$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
if(!$type_id)
{
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
}

$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
if(!$class_id)
{
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
}

$userName = filter_input(INPUT_GET, 'userName', FILTER_SANITIZE_STRING);
if(!$userName)
{
    $userName = "testName";
}



$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if(!$action)
{
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if(!$action)
    {
        $action = 'default';
    }
}


$order = filter_input(INPUT_POST, 'order', FILTER_SANITIZE_STRING);
if(!$order)
{
    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_STRING);
}





//echo '<script>alert("'.$action.$userName.'")</script>';
switch ($action)
{
    case "search_vehicles":
        
        if($make_id)
        {
            $vehicles = get_vehicles_by_make($make_id, $order);
            $makes = get_makes();
            $types = get_types();
            $classes = get_classes();
            include('view/vehicle_list.php');
            break;
        }
        else if(!$make_id && $type_id)
        {
            $vehicles = get_vehicles_by_type($type_id, $order);
            $makes = get_makes();
            $types = get_types();
            $classes = get_classes();
            include('view/vehicle_list.php');
            break;
        }
        else if(!$make_id && !$type_id && $class_id)
        {
            $vehicles = get_vehicles_by_class($class_id, $order);
            $makes = get_makes();
            $types = get_types();
            $classes = get_classes();
            include('view/vehicle_list.php');
            break;
        }
        else
        {
            $vehicles = get_vehicles_by_class($class_id, $order);
            $makes = get_makes();
            $types = get_types();
            $classes = get_classes();
            include('view/vehicle_list.php');
            break;
        }
    case "register":   
        if($userName == "testName")
        {
            include('./view/register.php');
        }
        else
        {
            $_SESSION['userId'] = $userName;
            $names = $_SESSION['userId'];
            include('./view/success.php');
        }
        break;
    case "logOut":
        include('./view/logout.php');
        break;
    default:
        $vehicles = get_vehicles_by_class($class_id, $order);
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include('view/vehicle_list.php');
        break;
}
?>