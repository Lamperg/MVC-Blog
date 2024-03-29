<?php

Abstract Class Model_Base {

    protected $db;
    protected $table;
    private $dataResult;

    public function __construct($select = false) {
        global $dbObject;
        $this->db = $dbObject;

        //Table name
        $modelName = get_class($this);
        $arrExp = explode('_', $modelName);
        $tableName = strtolower($arrExp[1]);
        $this->table = $tableName;

        $sql = $this->_getSelect($select);
        if (sql) {
            $this->_getResult("SELECT * FROM $this->table" . $sql);
        }
    }

    //Get the name of the table
    public function getTableName() {
        return $this->table;
    }

    //Get all records
    function getAllRows() {
        if (!isset($this->dataResult) OR empty($this->dataResult)) {
            return false;
        }
        return $this->dataResult;
    }

    //Get the first record
    function getOneRow() {
        if (!isset($this->dataResult) OR empty($this->dataResult)) {
            return FALSE;
        }
        return $this->dataResult[0];
    }

    //Get one record from the DB
    function fetchOne() {
        if (!isset($this->dataResult) OR empty($this->dataResult)) {
            return FALSE;
        }
        foreach ($this->dataResult[0] as $key => $val) {
            $this->$key = $val;
        }
        return true;
    }

    //Get the record for id
    function getRowById($id) {
        try {
            $db = $this->db;
            $stmt = $db->query("SELECT * FROM $this->table WHERE id =$id");
            $row = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        return $row;
    }

    //Recording in DB
    public function save() {
        $arrayAllFields = array_keys($this->fieldsTable());
        $arraySetFields = array();
        $arrayData = array();
        foreach ($arrayAllFields as $field) {
            if (!empty($this->$field)) {
                $arraySetFields[] = $field;
                $arrayData[] = $this->$field;
            }
        }
        $forQueryFields = implode(', ', $arraySetFields);
        $rangePlace = array_fill(0, count($arraySetFields), '?');
        $forQueryPlace = implode(', ', $rangePlace);

        try {
            $db = $this->db;
            $stmt = $db->prepare("INSERT INTO $this->table ($forQueryFields) values ($forQueryPlace)");
            $result = $stmt->execute($arrayData);
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
            echo '<br/>Error sql : ' . "'INSERT INTO $this->table ($forQueryFields) values ($forQueryPlace)'";
            exit();
        }
        return $result;
    }

    //Compilation of a database query
    private function _getSelect($select) {
        if (is_array($select)) {
            $allQuery = array_keys($select);
            foreach ($allQuery as $key => $val) {
                $allQuery[$key] = strtoupper($val);
            }

            $querySql = "";
            if (in_array("WHERE", $allQuery)) {
                foreach ($select as $key => $val) {
                    if (strtoupper($key) == "WHERE") {
                        $querySql .= " WHERE " . $val;
                    }
                }
            }

            if (in_array("GROUP", $allQuery)) {
                foreach ($select as $key => $val) {
                    if (strtoupper($key) == "GROUP") {
                        $querySql .= " GROUP BY " . $val;
                    }
                }
            }

            if (in_array("ORDER", $allQuery)) {
                foreach ($select as $key => $val) {
                    if (strtoupper($key) == "ORDER") {
                        $querySql .= " ORDER BY " . $val;
                    }
                }
            }

            if (in_array("LIMIT", $allQuery)) {
                foreach ($select as $key => $val) {
                    if (strtoupper($key) == "LIMIT") {
                        $querySql .= " LIMIT " . $val;
                    }
                }
            }

            return $querySql;
        }
        return false;
    }

    //Execution a database query
    private function _getResult($sql) {
        try {
            $db = $this->db;
            $stmt = $db->query($sql);
            //var_dump($sql);exit;
            $rows = $stmt->fetchAll();
            $this->dataResult = $rows;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }

        return $rows;
    }

    //Deleting records from a database on the condition
    public function deleteBySelect($select) {
        $sql = $this->_getSelect($select);
        try {
            $db = $this->db;
            $result = $db->exec("DELETE FROM $this->table " . $sql);
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
            echo '<br/>Error sql : ' . "'DELETE FROM $this->table " . $sql . "'";
            exit();
        }
        return $result;
    }

    //Deleting a row from the database
    public function deleteRow() {
        $arrayAllFields = array_keys($this->fieldsTable());

        foreach ($arrayAllFields as $key => $val) {
            $arrayAllFields[$key] = strtoupper($val);
        }

        if (in_array('ID', $arrayAllFields)) {
            try {
                $db = $this->db;
                $result = $db->exec("DELETE FROM $this->table WHERE `id` = $this->id");
                foreach ($arrayAllFields as $one) {
                    unset($this->$one);
                }
            } catch (PDOException $e) {
                echo 'Error : ' . $e->getMessage();
                echo '<br/>Error sql : ' . "'DELETE FROM $this->table WHERE `id` = $this->id'";
                exit();
            }
        } else {
            echo "ID table `$this->table` not found!";
            exit;
        }
        return $result;
    }

    //Update records
    public function update() {
        $arrayAllFields = array_keys($this->fieldsTable());
        $arrayForSet = array();
        foreach ($arrayAllFields as $field) {
            if (!empty($this->$field)) {
                if (strtoupper($field) != 'ID') {
                    $arrayForSet[] = $field . ' = "' . $this->$field . '"';
                } else {
                    $whereID = $this->$field;
                }
            }
        }
        if (!isset($arrayForSet) OR empty($arrayForSet)) {
            echo "Array data table `$this->table` empty!";
            exit;
        }
        if (!isset($whereID) OR empty($whereID)) {
            echo "ID table `$this->table` not found!";
            exit;
        }

        $strForSet = implode(', ', $arrayForSet);

        try {
            $db = $this->db;
            $stmt = $db->prepare("UPDATE $this->table SET $strForSet WHERE `id` = $whereID");
            $result = $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
            echo '<br/>Error sql : ' . "'UPDATE $this->table SET $strForSet WHERE `id` = $whereID'";
            exit();
        }
        return $result;
    }

}
