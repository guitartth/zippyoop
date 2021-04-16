<?php

// INF653 VB OOP Project
// Author: Craig Freeburg
// Date: 4/16/2021

class Make
{
    public static function get_makes()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM makes ORDER BY make_id';
        $statement = $db->prepare($query);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
    }

    public static function get_make_name($make_id)
    {
        if (!$make_id) {
            return "All Makes";
        }
        $db = Database::getDB();
        $query = 'SELECT * FROM makes
              WHERE make_id = :make_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id',
            $make_id
        );
        $statement->execute();
        $make = $statement->fetchAll();
        $statement->closeCursor();
        return $make;
    }

    public static function delete_make($make_id)
    {
        $db = Database::getDB();
        $query = 'DELETE FROM makes
              WHERE make_id = :make_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id',
            $make_id
        );
        $statement->execute();
        $statement->closeCursor();
    }

    public static function add_make($make_name)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO makes
                (Make)
              VALUES
                (:make_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_name', $make_name);
        $statement->execute();
        $statement->closeCursor();
    }
}


?>