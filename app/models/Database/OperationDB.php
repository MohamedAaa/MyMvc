<?php

/**
 * Description of Insert
 *
 * @author Mario
 */
class OperationDB extends Connection {

    public function __construct() {
        parent::__construct();
    }
    
    /**
    * @param array $data <p>
    * The data of the constant add data in database .
    * </p>
    * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
    */
    public function add($data = []) {


        foreach ($data as $k => $v) {
            $name[] = $k;
            $value[] = $v;
        }
        $nameT = implode($name, ',');
        $valueT = "'" . implode($value, "','") . "'";

        $sql = "INSERT INTO {$this->table} ({$nameT}) VALUES ({$valueT}) ";

        if (mysqli_query($this->con, $sql)) {
            return TRUE;
        } else {
//            echo "</br>Error: " . $sql . "<br>" . mysqli_error($this->con);
            return FALSE;
        }
    }

    /**
    * @return all data from tebal in databse  <b>TRUE</b> on success or <b>FALSE</b> on failure.
    */
    public function all() {

        $sql = "SELECT * FROM  {$this->table} ";

        $result = mysqli_query($this->con, $sql);
        if ($result) {
            $rows = mysqli_num_rows($result);
            for ($index = 0; $index < $rows; $index++) {
                $fetch[$index] = mysqli_fetch_assoc($result);
            }

            return $fetch;
        } else {
            return FALSE;
        }
    }

    /**
    * @param int $id <p>
    * The id row in databse to select this row.
    * </p>
    * @return  data from tebal in databse   on success or <b>FALSE</b> on failure.
    */
    public function getById($id) {

        $id = int ($id);
        $sql = "SELECT * FROM  {$this->table} WHERE id={$id} ";

        $result = mysqli_query($this->con, $sql);
        if ($rows = mysqli_num_rows($result) > 0) {

            $fetch = mysqli_fetch_assoc($result);

            return $fetch;
        } else {
            return FALSE;
        }
    }

    /**
    * @param int $id <p>
    * The id row in databse to select this row.
    * </p>
    * @return  bool  <b>True</b>  on success or <b>FALSE</b> on failure.
    */
    public function update($id) {
        //var_dump($_POST);
        $sql = "UPDATE `{$this->table}` SET ";

        foreach ($_POST as $key => $value) {
            $sql.= $key . "= ";
            $sql.= "'" . $value . "' , ";
        }
        $sql.='-';
        $rep = str_replace(', -', '', $sql);
        $sql = $rep . " WHERE `id` = {$id}";

        $result = mysqli_query($this->con, $sql);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    /**
    * @param int $id <p>
    * The id row in databse to select this row.
    * </p>
    * @return  bool  <b>True</b>  on success or <b>FALSE</b> on failure.
    */
    public function delete($id) {
        //var_dump($_POST);
        $sql = "DELETE FROM `{$this->table}` WHERE `id` = {$id}";
        echo $sql;
        $result = mysqli_query($this->con, $sql);
        
        var_dump($result);
        if ($result == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
