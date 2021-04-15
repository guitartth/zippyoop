<?php

switch ($action)
{
    case "login":
        if(is_valid_admin_login($username, $password))
        {
            $_SESSION['is_valid_admin'] = true;
            header("Location: .?action=search_vehicles");
        }
        else
        {
            $login_mesage = 'You must login to view this page.';
            include('../admin/view/login.php');
        }
        break;
    case "show_login":
        include('../admin/view/login.php');
        break;
    case "register":
        include('../admin/util/valid_register.php');
        valid_registration($username, $password, $confirm_password);
        // check if this is correct errors array
        if(!empty($_SESSION['errors']))
        {
            include('../admin/view/register.php');
        }
        else
        {
            add_admin($username, $password);
            $_SESSION['is_valid_admin'] = true;
            header("Location: .?action=search_vehicles");
        }
        break;
    case "show_register":
        include('../admin/view/register.php');
        break;
    case "logout":
        //Unset & Destroy Session
        unset($_SESSION['is_valid_admin']);
        session_destroy();
        $session = session_name();
        $expire = strtotime('-1 year');
        $params = session_get_cookie_params();
        $path = $params['path'];
        $domain = $params['domain'];
        $secure = $params['secure'];
        $httponly = $params['httponly'];
        setcookie($session, '', $expire, $path, $domain, $secure, $httponly);
        $login_message = 'You must login to view this page.';
        include('../admin/view/login.php');
        break;
}

?>