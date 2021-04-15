<?php

// INF653 VB Midterm Project
// Author: Craig Freeburg
// Date: 3/15/2021

function get_makes()
{
    global $db;
    $query = 'SELECT * FROM makes ORDER BY make_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function get_make_name($make_id)
{
    if(!$make_id)
    {
        return "All Makes";
    }
    global $db;
    $query = 'SELECT * FROM makes
              WHERE make_id = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $make = $statement->fetchAll();
    $statement->closeCursor();
    return $make;
}

function delete_make($make_id)
{
    global $db;
    $query = 'DELETE FROM makes
              WHERE make_id = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_make($make_name)
{
    global $db;
    $query = 'INSERT INTO makes
                (Make)
              VALUES
                (:make_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_name', $make_name);
    $statement->execute();
    $statement->closeCursor();
}

?>