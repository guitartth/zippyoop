<!DOCTYPE html>
<html>
<!--Head Section-->
<head>
    <title>Zippy's Used Autos</title>
    <link rel="stylesheet" type="text/css" href="./view/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<!--Body Secion--> 
<body>
<header>
    <h1>Zippy Used Autos</h1>

    <div id="login-area">


    <?php if (!isset($_SESSION['userId'])){ ?>
        <form action="." method="post">
            <input type="hidden" name="action" value="register">
            <button class="register-button bold">Register User</button>
        </form>
    <?php } else if($action != "logOut" ) { ?>
        <h4>Hello, <?= $_SESSION['userId']; ?>!</h4>
        <form action="." method="post">
            <input type="hidden" name="action" value="logOut">
            <button class="register-button bold">Log Out</button>
        </form>
    <?php } else  { ?>
        <h4>Thank you, <?= $_SESSION['userId']; ?>!</h4>
    <?php } ?>
    </div>
    
    
    



    
    </section>
    <hr>
</header>