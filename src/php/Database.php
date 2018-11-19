<?php

require_once "Error.php";

class Database extends PDO {
    private $_cfgArray;
    const CONFIG = "mysql:host=mariadb;dbname=CdP;port=3306;charset=utf8";
    const USER_NAME = "root";
    const PASSWORD = "root";

    /**
     * Init the database with the correct database.
     */
    public function __construct() {
        parent::__construct(self::CONFIG, self::USER_NAME, self::PASSWORD);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Check if the wanted element is present in the database
     * @param String $element the wanted column of the database (SELECT)
     * @param String $table The wanted table of the database (FROM)
     * @param String $condition The condition of the wanted element (WHERE)
     */
    public function exists($element, $table, $condition) {
        $res = $this->select($element, $table, $condition)[0];
        if (!$res)
            CdPError::redirectTo("HomePage.php");
    }

    /**
     * Select elements from table
     * @param String $elements The elements to fetch in the database (SELECT
     *  statement)
     * @param String $table The table where to fetch the elements
     * (FROM statement).
     * @param String $condition The condiction of the query (WHERE statement)
     * @return Array The array of all elemenst found
     */
    public function select ($elements, $table, $condition = "") {
        if (!is_string($table) || !is_string($elements))
            throw new WrongTypeException();
        $request = "SELECT $elements FROM $table";
        if ($condition !== "")
            $request .= " WHERE " . $condition;
        $sql = $this->prepare($request);
        if (!$sql->execute())
            $this->execError();
        $fetch = $sql->fetchAll();
        if (! $fetch)
            $this->execError();
        return $fetch;
    }

    /**
     * Change elements fields of a database entry
     * @param String $table The table of the element to update (SELECT)
     * @param String $data The field values to change in the database (SET)
     * @param String $where The condition that defines the element in the
     * database (WHERE)
     */
    public function update ($table, $data, $where) {
        $request = "UPDATE $table SET ";
        foreach ($data as $key => $value) {
            $placeholder = $key . "=?, ";
            $request .= $placeholder;
        }
        $request = substr($request, 0, -2);
        $request .= " WHERE $where";

        $sql = $this->prepare($request);
        $sql->execute(array_values($data));
    }

    /**
     * Insert an element in a table of the database
     * @param String $table The table where insert the element
     * @param String $data The element data, it must be an associative array
     */
     public function insert ($table, $data) {
         $request = "INSERT INTO $table (";
         $holder = "VALUES (";
         $counter = 1;
         foreach ($data as $key => $value) {
            if ($counter == 1) {
                $request .= $key;
                $holder .= "?" ;
            }
            else {
                $request .= ", $key";
                $holder .= ", ?" ;
            }
            $counter += 1;
         }
         $request .= ")";
         $holder .= ")";
         $request .= $holder;

         $sql = $this->prepare($request);
        if (!$sql->execute(array_values($data))) {
            $this->execError();
        }
     }

    /**
     * Delete an element from the database
     * @param String $table The name of the table (DELETE FROM)
     * @param String $where The condition that defines the element to delete
     * (WHERE)
     */
    public function delete ($table, $where) {
        return $this->exec("DELETE FROM $table WHERE $where");
    }

    private function execError() {
        if ($this->errorCode() !== '00000')
            if ($this->_errorLog === true) {
                echo $this->errorInfo();
                throw new FailedRequestException(
                    "ERROR: ". implode(",", $this->errorInfo())
                );
            }
    }

    private function typeError($expectedMsg ,$argsArray) {
        $actualMsg = "actual (";
        foreach ($argsArray as $value)
            $actualMsg .= gettype($value).", ";
        substr($actualMsg, 0, -2);
        $errorMsg = $expectedMsg." ".$actualMsg.")";
        throw new WrongTypeException($errorMsg);
    }
}
