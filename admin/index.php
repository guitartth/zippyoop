<?php  

// INF653 VB Midterm Project
// Author: Craig Freeburg
// Date: 3/15/2021

require ('../model/database.php');
require ('../model/vehicles_db.php');
require ('../model/make_db.php');
require ('../model/type_db.php');
require ('../model/class_db.php');
require ('../model/admin_db.php');


$userMake;
$userType;
$userClass;

$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
if(!$make_id)
{
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
}

$make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_STRING);
if(!$make_name)
{
    $make_name = filter_input(INPUT_GET, 'make_name', FILTER_SANITIZE_STRING);
}

$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
if(!$type_id)
{
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
}

$type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_STRING);
if(!$type_name)
{
    $type_name = filter_input(INPUT_GET, 'type_name', FILTER_SANITIZE_STRING);
}

$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
if(!$class_id)
{
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
}

$class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_STRING);
if(!$class_name)
{
    $class_name = filter_input(INPUT_GET, 'class_name', FILTER_SANITIZE_STRING);
}

$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);

$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);

$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);

$model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);

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

//login variables

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);

$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);

//Start Session
$lifetime = 60 * 60 * 24 * 14; //cookie will save for 2 weeks
session_set_cookie_params($lifetime, '/');
session_start();

switch ($action)
{
    case "search_vehicles":
        
        if($make_id)
        {
            $vehicles = Vehicles::get_vehicles_by_make($make_id, $order);
            $makes = Make::get_makes();
            $types = Type::get_types();
            $classes = Classes::get_classes();
            include('view/vehicle_list.php');
            break;
        }
        else if(!$make_id && $type_id)
        {
            $vehicles = Vehicles::get_vehicles_by_type($type_id, $order);
            $makes = Make::get_makes();
            $types = Type::get_types();
            $classes = Classes::get_classes();
            include('view/vehicle_list.php');
            break;
        }
        else if(!$make_id && !$type_id && $class_id)
        {
            $vehicles = Vehicles::get_vehicles_by_class($class_id, $order);
            $makes = Make::get_makes();
            $types = Type::get_types();
            $classes = Classes::get_classes();
            include('view/vehicle_list.php');
            break;
        }
        else
        {
            $vehicles = Vehicles::get_vehicles_by_class($class_id, $order);
            $makes = Make::get_makes();
            $types = Type::get_types();
            $classes = Classes::get_classes();
            include('view/vehicle_list.php');
            break;
        }
    case "delete_vehicle":
        if($vehicle_id)
        {
            try
            {
                Vehicles::delete_vehicle($vehicle_id);
            }
            catch (PDOException $e)
            {
                $error = "Cannot delete vehicle without specificing vehicle first.";
                include('/view/error.php');
            }
            header("Location: .?");
        }
        break;
    case "manage_makes":
        $makes = Make::get_makes();
        include('view/make_list.php');
        break;
    case "add_make":
        Make::add_make($make_name);
        header("Location: .?action=manage_makes");
        break;
    case "delete_make":
        if($make_id)
        {
            try
            {
                Make::delete_make($make_id);
            }
            catch (PDOException $e)
            {
                $error = "Cannot delete Make with vehicles of this make still in inventory.";
                include('./view/error.php');
                exit();
            }
        }
        header("Location: .?action=manage_makes");
        break;
    case "manage_types":
        $types = Type::get_types();
        include('view/type_list.php');
        break;
    case "add_type":
        Type::add_type($type_name);
        header("Location: .?action=manage_types");
        break;
    case "delete_type":
        if ($type_id) 
        {
            try 
            {
                Type::delete_type($type_id);
            } 
            catch (PDOException $e) 
            {
                $error = "Cannot delete Type with vehicles of this type still in inventory.";
                include('./view/error.php');
                exit();
            }
        }
        header("Location: .?action=manage_types");
        break;
    case "manage_classes":
        $classes = Classes::get_classes();
        include('view/class_list.php');
        break;
    case "add_class":
        Classes::add_class($class_name);
        header("Location: .?action=manage_classes");
        break;
    case "delete_class":
        if ($class_id) 
        {
            try 
            {
                Classes::delete_class($class_id);
            } 
            catch (PDOException $e) 
            {
                $error = "Cannot delete Class with vehicles of this class still in inventory.";
                include('./view/error.php');
                exit();
            }
        }
        header("Location: .?action=manage_classes");
        break;
    case "add_vehicle":
        if($year && $price && $type_id && $class_id && $make_id && $model)
        {
            Vehicles::add_vehicle($year, $price, $type_id, $class_id, $make_id, $model);
        }
        else
        {
            $error = "Invalid or missing vehicle information. Check all fields and try again.";
            include('view/error.php');
            exit();
        }
        header("Location: .?action=default");
        break;
    case "add_vehicle_page":
        $makes = Make::get_makes();
        $types = Type::get_types();
        $classes = Classes::get_classes();
        include('./view/add_car.php');
        break;
    case "login":
        include('../model/admin.php');
        break;
    case "show_login":
        include('../model/admin.php');
        break;
    case "register":
        include('../model/admin.php');
        break;
    case "show_register":
        include('../model/admin.php');
        break;
    case "logout":
        include('../model/admin.php');
        break;
    default:
        $vehicles = Vehicles::get_vehicles_by_class($class_id, $order);
        $makes = Make::get_makes();
        $types = Type::get_types();
        $classes = Classes::get_classes();
        include('view/vehicle_list.php');
        break;
}
    

?>