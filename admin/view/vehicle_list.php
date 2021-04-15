<?php

// INF653 VB Midterm Project
// Author: Craig Freeburg
// Date: 3/15/2021
?>

<?php include('admin_header.php'); ?>
<section id="userSelect" class="userSelect">
<h3>Narrow Results:</h3>
    
    <form action="." method="get" id="select_make" class="select_make">
        <input type="hidden" name="action" value="search_vehicles">
        <select name="make_id" id="make_drop">
            <option value="0">Select Vehicle Make</option>
            <?php foreach ($makes as $make) : ?>
            <?php if ($make_id == $make['make_id']) { ?>
                <option value="<?= $make['make_id'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $make['make_id'] ?>">
                    <?php } ?>
                    <?= $make['Make'] ?>
                </option> 
                <?php endforeach; ?>
        </select>
        
    
    <br>
    
        <select name="type_id" id="type_drop">
            <option value="0">Select Vehicle Type</option>
            <?php foreach ($types as $type) : ?>
            <?php if ($type_id == $type['type_id']) { ?>
                <option value="<?= $type['type_id'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $type['type_id'] ?>">
                    <?php } ?>
                    <?= $type['Type'] ?>
                </option> 
                <?php endforeach; ?>
        </select>
        
    
    <br>
    
        <select name="class_id" id="class_drop">
            <option value="0">Select Vehicle Class</option>
            <?php foreach ($classes as $class) : ?>
            <?php if ($class_id == $class['class_id']) { ?>
                <option value="<?= $class['class_id'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $class['class_id'] ?>">
                    <?php } ?>
                    <?= $class['Class'] ?>
                </option> 
                <?php endforeach; ?>
        </select>
        <br>
        <input type="radio" id="price" name="order" value="price">
        <label for="price">Price</label>
        <input type="radio" id="year" name="order" value="year">
        <label for="year">Year</label>



        <button class="narrow-button bold">Search</button>
    </form>
    <hr>

    <?php if($vehicles) { ?>
        <?php foreach ($vehicles as $vehicle) : ?>
        <div class="list_row">
            <div class="list_vehicles">
                <?= $vehicle['year'] ?>
                <?= $vehicle['Make'] ?>
                <?= $vehicle['model'] ?>
                <?= $vehicle['Class'] ?>
                <?= $vehicle['Type'] ?>
                <?= '$'.number_format($vehicle['price']) ?>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_vehicle">
                    <input type="hidden" name="vehicle_id" value="<?=
                    $vehicle['vehicle_id'] ?>">
                    <button class="delete_button">❌</button>
                </form>
            </div>
        </div>
        
        <?php endforeach; ?>
    <?php } else { ?>
    <br>
    <?php if ($make_id) { ?>
    <p>No tasks exist for this category yet.</p>
    <?php } else { ?>
    <p>No tasks exist yet.</p>
    <?php } ?>
    <br>
    <?php } ?>

    <section id="addVehicles" class="addVehicles">
    <form action="." method="post">
        <input type="hidden" name="action" value="add_vehicle_page">
        <button class="modify-button bold">Add Vehicles</button>
    </form>
    
    </section>

    <section id="manageMakes" class="manageMakes">
    <form action="." method="post">
        <input type="hidden" name="action" value="manage_makes">
        <button class="modify-button bold">Manage Makes</button>
    </form>
    
    </section>
    <section id="manageTypes" class="manageTypes">
    <form action="." method="post">
        <input type="hidden" name="action" value="manage_types">
        <button class="modify-button bold">Manage Types</button>
    </form>
    
    </section>
    <section id="manageClasses" class="manageClasses">
    <form action="." method="post">
        <input type="hidden" name="action" value="manage_classes">
        <button class="modify-button bold">Manage Classes</button>
    </form>
    
    </section>
    
    
<hr>
<?php include('admin_footer.php'); ?>