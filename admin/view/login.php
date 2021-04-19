<?php
echo '<script>alert("On show login!")</script>';
// INF653 VB Login Project
// Author: Craig Freeburg
// Date: 4/1/2021
?>
<h1>Login:</h1>
<section id="add" class="add">
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="login">

        <label>Username:</label>
        <input type="text" name="username" required>
    <br>
    <br>
        <label>Password:</label>
        <input type="password" name="password" required>
    <br>
    <br>
        <div class="add__addVehicle">
            <button class="add-button bold">Login</button>
        </div>
    </form>
</section>

<h4>You must login to view this page.</h4>

<p><a href=".">Back Home</a></p>
<?php include('admin_footer.php'); ?>

