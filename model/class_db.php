<?php

// INF653 VB OOP Project
// Author: Craig Freeburg
// Date: 4/16/2021

class Classes
{
    public static function get_classes()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM classes ORDER BY class_id';
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();
        return $classes;
    }

    public static function get_class_name($class_id)
    {
        if (!$class_id) {
            return "All Classes";
        }
        $db = Database::getDB();
        $query = 'SELECT * FROM classes
              WHERE class_id = :class_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id',
            $class_id
        );
        $statement->execute();
        $class = $statement->fetchAll();
        $statement->closeCursor();
        return $class;
    }

    public static function delete_class($class_id)
    {
        $db = Database::getDB();
        $query = 'DELETE FROM classes
              WHERE class_id = :class_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id',
            $class_id
        );
        $statement->execute();
        $statement->closeCursor();
    }

    public static function add_class($class_name)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO classes
                (Class)
              VALUES
                (:class_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_name', $class_name);
        $statement->execute();
        $statement->closeCursor();
    }
}



?>