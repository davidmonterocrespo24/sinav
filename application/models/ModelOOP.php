<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ModelOOP {

    private $id;

    public function save($db) {
        $opccion = "";
        $variables = get_object_vars($this);
        $skipCount = 1;
        $contador = 0;
        $sql = "";
        $nombreClase = get_class($this);
        if (isset($this->id)) {
            // Actualizar
            $opccion = "UPDATE";
            $sql = "UPDATE " . $nombreClase . " SET ";
            foreach ($variables as $k => $v) {
                // Do not update the ID and make sure mysqli or hasOne properties are not included
                if ($k != "id" && $k != "mysqli" && $k != "hasOne") {
                    // propiedad=value
                    $sql .= $k . "='" . $v . "'";
                    // If it not the last property, add a colen for the next property
                    $contador++;
                    if ($contador < count($variables) - 1) {
                        $sql .= ", ";
                    }
                }
                $contador++;
            }
            $sql .= " WHERE id='" . $this->id . "'";
        } else {
            // INSERTAR
            $opccion = "INSERT";
            $sql = "INSERT INTO " . $nombreClase . " (";
            foreach ($variables as $k => $v) {
                if ($k != "id" && $k != "mysqli" && $k != "hasOne") {
                    $sql .= $k;
                    if ($contador < count($variables) - count($v) - $skipCount) {
                        $sql .= ", ";
                    }
                }
                $contador++;
            }
            $contador = 0;
            $sql .= ") VALUES (";
            foreach ($variables as $k => $v) {
                if ($k != "id" && $k != "mysqli" && $k != "hasOne") {
                    $sql .= "'" . $v . "'";
                    if ($contador < count($variables) - count($v) - $skipCount) {
                        $sql .= ", ";
                    }
                }

                $contador++;
            }
            $sql .= ")";
        }
        $db->query($sql);
        if ($opccion != "UPDATE") {
            // $this->id = $db->insert_id;
        }
        if (isset($this->hasOne)) {
            $objectData = $db->query("SELECT * FROM " . $nombreClase . " WHERE id='" . $this->id . "'");
            $row = $objectData->fetch_array(MYSQLI_ASSOC);
            $variables = get_class_vars(get_class($this));
            $hasOneKeys = $this->hasOne;
            $contador = 0;
            foreach ($hasOneKeys as $k => $v) {
                $setOneRelationalData = "
  					UPDATE " . $nombreClase . "
  					SET " . strtolower($k) . "_id='" . $v['id'] . "'
  					WHERE id='" . $this->id . "'
  				";
                if (!$db->query($setOneRelationalData)) {
                    echo "Did not save.";
                }
            }
        }
        $saved = true;
        return $saved;
    }

    public function delete($db) {
        $deleted = false;
        $class = get_class($this);
        if (isset($this->id)) {
            if ($db->query("DELETE FROM " . $class . " WHERE id='" . $this->id . "'")) {
                //The "object" was deleted from the database.
                $deleted = true;
                $db->query("START COMMIT");
            }
        }
        return $deleted;
    }

    public function getByID($db, $objID) {
        $class = get_class($this);
        $objectData = $db->query("SELECT * FROM " . get_class($this) . " WHERE id='" . $objID . "'");
        $vars = get_class_vars($class);
        $row = $objectData->fetch_array(MYSQLI_ASSOC);
        foreach ($vars as $k => $v) {
            if ($k == "hasOne") {
                $x = 0;
                while ($x < count($v)) {
                    foreach ($v as $class => $attr) {
                        $getOneRelationalData = "SELECT	*
						 FROM" . strtolower($attr['className']) . "
						 WHERE " . "id='" . $row[strtolower($attr['className'] . "_id")] . "'";
                        $result = $db->query($getOneRelationalData);
                        $this->hasOne[$attr['className']] = $result->fetch_array(MYSQL_ASSOC);
                    }
                    $x++;
                }
            } else {
                $this->$k = $row[$k];
            }
        }
    }

    public function getID() {
        return $this->id;
    }

    public function describe() {
        $vars = get_object_vars($this);
        $class = get_class($this);
        echo "This is a " . $class . " object.<br />It's properties and values are:<br /><br />";
        foreach ($vars as $k => $v) {
            echo $k . ": " . $v . "<br />";
        }
    }
//
//    public function __set($db, $propertyName, $value) {
//        if (isset($this->hasOne)) {
//            // Loop through each relational property
//            $hasOneKeys = $this->hasOne;
//            foreach ($hasOneKeys as $k => $v) {
//                if (strtolower($k) == $propertyName) {
//                    $getOneRelationalData = "SELECT *
//	  					FROM " . strtolower($propertyName) . " 
//	  					WHERE id='" . $value . "'";
//                    $result = $db->query($getOneRelationalData);
//                    $this->hasOne[$k] = $result->fetch_array(MYSQL_ASSOC);
//                }
//            }
//        }
//    }

}
