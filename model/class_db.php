<?php

// INF653 VB Midterm Project
// Author: Craig Freeburg
// Date: 3/15/2021

function get_classes()
{
    global $db;
    $query = 'SELECT * FROM classes ORDER BY class_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}

function get_class_name($class_id)
{
    if(!$class_id)
    {
        return "All Classes";
    }
    global $db;
    $query = 'SELECT * FROM classes
              WHERE class_id = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $class = $statement->fetchAll();
    $statement->closeCursor();
    return $class;
}

function delete_class($class_id)
{
    global $db;
    $query = 'DELETE FROM classes
              WHERE class_id = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_class($class_name)
{
    global $db;
    $query = 'INSERT INTO classes
                (Class)
              VALUES
                (:class_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_name', $class_name);
    $statement->execute();
    $statement->closeCursor();
}

?>