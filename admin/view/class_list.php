<?php

// INF653 VB Midterm Project
// Author: Craig Freeburg
// Date: 3/15/2021
?>

<?php include('admin_header.php'); ?>
<?php if($classes) { ?>
<section id="list" class="list"?
    <header class="list__row list__header">
        <h3> Vehicles Classes </h3>
    </header>

    <?php foreach ($classes as $class) : ?>
    <div class="list__row">
        <div class="list__item">
            <p class="bold"><?= $class['Class'] ?></p>
        </div>
        <div class="list__removeClass">
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_class">
                <input type="hidden" name="class_id" value="<?= $class['class_id'] ?>">  
                <button class="remove-button">Delete</button>          
            </form>
        </div>
    </div>
    <?php endforeach ?>
</section>
<?php } ?>

<section id="add" class="add">
    <h3>Add Class</h3>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_class">
        <div class="add__inputs">
            <label>Class:</label>
            <input type="text" name="class_name" maxLength="50" placeholder="Class" autofocus required>
        </div>
        <div class="add__addClass">
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>

<p><a href=".">Back Home</a></p>
<?php include('admin_footer.php'); ?>