<?php

// INF653 VB Midterm Project
// Author: Craig Freeburg
// Date: 3/15/2021
?>

<?php include('header.php'); ?>

<header class="list__row list__header">
    <h3> Register User: </h3>
</header>

<section id="register" class="register">
    <form action="." method="get" id="regUser" class="regUser">
        <input type="hidden" name="action" value="register">
        <label>Name:</label>
        <input type="text" name="userName" maxLength="25" required>
        <button class="submit">Register</button>
    </form>
</section>



<?php include('footer.php'); ?>