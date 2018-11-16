<?php

require_once "Error.php";

class Database extends PDO {
    private $_cfgArray;
    const CONFIG = "mysql:host=mariadb;dbname=CdP;port=3306;charset=utf8";
    const USER_NAME = "root";
    const PASSWORD = "root";

    public function __construct() {
        parent::__construct(self::CONFIG, self::USER_NAME, self::PASSWORD);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function exists($element, $table, $condition) {
        $res = $this->select($element, $table, $condition)[0];
        if (!$res)
            CdPError::redirectTo("HomePage.php");
    }

    /**
     * Select elements from table
     * @param elements The elements to fetch in the database (SELECT statement)
     * @param table The table where to fetch the elements (FROM statement).
     * @param condition The condiction of the query (WHERE statement)
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
     * @param table The table where insert the element
     * @param data The element data, it must be an associative array
     */
    public function insert ($table, $data) {
        // The second statement tests if $data is an associative array
        if (!is_string($table) &&
            array_keys($arr) !== range(0, count($arr) - 1))
                $this->typeError([$table, $data]);

        /* This part of code is taken from :
         *https://stackoverflow.com/questions/11746206/
         *php-pdo-insert-function-with-unknown-number-of-variables
         */
        $sql = 'INSERT INTO ' . $table . ' ';
        $columns = '(';
        $values = '(';
        foreach ($data as $k => $v) {
            $columns .= '`' . $k . '`, ';
            $values .= "'" . $v . "', ";
        }
        $columns = rtrim($columns, ', ') . ')';
        $values = rtrim($values, ', ') . ')';
        $sql .= $columns . ' VALUES ' . $values;
        $query = $this->prepare($sql);
        if(!$query->execute())
            $this->execError();
    }

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
