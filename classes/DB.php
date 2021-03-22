<?php

class DB {

    public $link;

    public function __construct() {
        $this->link = mysqli_connect("localhost", "root", "", "transcendence");
    }

    public function getLink() {
        return $this->link;
    }

    public function insert($table, $values) {
        $columnsString = $this->constructInsertColumnSQL($values);
        $valuesString = $this->constructInsertValuesSQL($values);
        $sql = "INSERT INTO $table ($columnsString)
        VALUES ($valuesString)";
        if ($this->query($sql)) {
            return $this->getResult($table, mysqli_insert_id($this->getLink()));
        }

        return false;
    }

    public function update($table, $id, $values) {
        $valuesString = $this->constructUpdateValuesSQL($values);
        $sql = "UPDATE $table SET $valuesString WHERE id = $id";

        if ($this->query($sql)) {
            return $this->getResult($table, $id);
        }

        return false;
    }

    public function delete($table, $key, $value) {
        $sql = "DELETE FROM $table WHERE $key = '$value'";

        if ($this->query($sql)) {
            return true;
        }

        return false;
    }

    public function getResults($table) {
        $sql = $this->query("SELECT * FROM $table"); 
        $results = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        return $results;
    }

    public function getResult($table, $id) {
        $sql = $this->query("SELECT * FROM $table WHERE id = $id");
        $result = mysqli_fetch_assoc($sql);
        return $result;
    }

    public function getByKey($table, $key, $value) {
        $sql = $this->query("SELECT * FROM $table WHERE $key = '$value'"); 
        $results = mysqli_fetch_assoc($sql);
        return $results;
    }

    public function getAllByKey($table, $key, $value) {
        $sql = $this->query("SELECT * FROM $table WHERE $key = '$value'"); 
        $results = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        return $results;
    }

    public function getAllByKeysOr($table, $key1, $value1, $key2, $value2) {
        $sql = $this->query("SELECT * FROM $table WHERE ($key1 = '$value1' AND $key2 = '$value2') OR ($key1 = '$value2' AND $key2 = '$value1')"); 
        $results = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        return $results;
    }

    public function query($sql) {
        return mysqli_query($this->getLink(), $sql);
    }

    public function exists($table, $key, $value) {
        $results = $this->getAllByKey($table, $key, $value);

        if (!empty($results)) {
            return true;
        }
        
        return false;
    }

    // Converts array to MySQL string
    public function constructUpdateValuesSQL($values) {
        $valuesString = '';
        $i = 0;
        foreach($values as $key => $value) {
            $valuesString .= $key . " = '" . $value . "'";
            if ($i < count($values) - 1) {
                $valuesString .= ', ';
            }
            $i++;
        }
        return $valuesString;
    }

    // Converts array to SQL columns string
    public function constructInsertColumnSQL($values) {
        $columnsString = '';
        $i = 0;
        foreach($values as $key => $value) {
            $columnsString .= $key;
            if ($i < count($values) - 1) {
                $columnsString .= ',';
            }
            $i++;
        }
        return $columnsString;
    }

    // Converts array to SQL values string
    public function constructInsertValuesSQL($values) {
        $valuesString = '';
        $i = 0;
        foreach($values as $key => $value) {
            $valuesString .= "'" . $value . "'";
            if ($i < count($values) - 1) {
                $valuesString .= ',';
            }
            $i++;
        }
        return $valuesString;
    }

}