<?php

class Util {

    public static function selectAll($tableName) {
 
        $sql = 'SELECT * FROM ' . $tableName;
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve " . $tableName);
        }
        else {
            $data = $stmt->fetchAll();
            return $data;
        }
    }
	
    public static function selectByID($tableName, $id) {
 
//        $sql = 'SELECT * FROM ' . $tableName . ' WHERE id = ' . $id;
        $sql = 'SELECT * FROM ' . $tableName . ' WHERE id = ' . $id;
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve " . $tableName . " by id: " . $id);
        }
        else {
            $data = $stmt->fetch();
            return $data;
        }
	}
	
    public static function selectColumnByID($tableName, $columnName, $id) {
 
        $sql = 'SELECT ' . $columnName . ' FROM ' . $tableName . ' WHERE id = ' . $id;
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve " . $columnName . " from " . $tableName . " by id: " . $id);
        }
        else {
            $data = $stmt->fetchAll();
            return $data;
        }
	}
	
	public static function selectColumn($tableName, $columnName) {
 
        $sql = 'SELECT ' . $columnName . ' FROM ' . $tableName;
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve " . $columnName . " from " . $tableName);
        }
        else {
            $data = $stmt->fetchAll();
            return $data;
        }
    }
    
	
}
?>
