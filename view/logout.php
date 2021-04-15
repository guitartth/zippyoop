<?php

// INF653 VB Midterm Project
// Author: Craig Freeburg
// Date: 3/15/2021
?>

<?php include('header.php'); ?>
<?php 
    unset($_SESSION['userId']);
    session_destroy();
    $session = session_name();
    $expire = strtotime('-1 year');
    $params = session_get_cookie_params();
    $path = $params['path'];
    $domain = $params['domain'];
    $secure = $params['secure'];
    $httponly = $params['httponly'];
    setcookie($session, '', $expire, $path, $domain, $secure, $httponly);
    ?>

<meta http-equiv="refresh" content="3;url=./?action=default&userName='.$userName.'" />
<h2>Logout Successful!</h2>
You will be redirected Home in 3 seconds.
<hr>
<?php include('footer.php'); ?>
