<?php

// INF653 VB Login Project
// Author: Craig Freeburg
// Date: 4/1/2021
?>


<h1> Register New Admin: </h1>

<br>

<section id="add" class="add">
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="register">

        <label>Username:</label>
        <input type="text" name="username" required>
    <br>
    <br>
        <label>Password:</label>
        <input type="password" name="password" required>
    <br>
    <br>
        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" required>
    <br>
    <br>
        <div class="add__addVehicle">
            <button class="add-button bold">Register</button>
        </div>
    </form>
</section>

<p><a href=".">Back Home</a></p>
<?php include('admin_footer.php'); ?>