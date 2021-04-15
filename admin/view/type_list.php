<?php

// INF653 VB Midterm Project
// Author: Craig Freeburg
// Date: 3/15/2021
?>

<?php include('admin_header.php'); ?>

<?php if($types) { ?>
<section id="list" class="list"?
    <header class="list__row list__header">
        <h3> Vehicles Types </h3>
    </header>

    <?php foreach ($types as $type) : ?>
    <div class="list__row">
        <div class="list__item">
            <p class="bold"><?= $type['Type'] ?></p>
        </div>
        <div class="list__removeItem">
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_type">
                <input type="hidden" name="type_id" value="<?= $type['type_id'] ?>">  
                <button class="remove-button">Delete</button>          
            </form>
        </div>
    </div>
    <?php endforeach ?>
</section>
<?php } ?>



<section id="add" class="add">
    <h3>Add Type</h3>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_type">
        <div class="add__inputs">
            <label>Type:</label>
            <input type="text" name="type_name" maxLength="50" placeholder="Type" autofocus required>
        </div>
        <div class="add__addType">
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>

<p><a href=".">Back Home</a></p>
<?php include('admin_footer.php'); ?>