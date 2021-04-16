<?php

// INF653 VB OOP Project
// Author: Craig Freeburg
// Date: 4/16/2021

class Type
{
    public static function get_types()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM types ORDER BY type_id';
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    }

    public static function get_type_name($type_id)
    {
        if (!$type_id) {
            return "All Types";
        }
        $db = Database::getDB();
        $query = 'SELECT * FROM types
                  WHERE type_id = :type_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $type = $statement->fetchAll();
        $statement->closeCursor();
        return $type;
    }

    public static function delete_type($type_id)
    {
        $db = Database::getDB();
        $query = 'DELETE FROM types
                  WHERE type_id = :type_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function add_type($type_name)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO types
                    (Type)
                  VALUES
                    (:type_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_name', $type_name);
        $statement->execute();
        $statement->closeCursor();
    }
}


?>