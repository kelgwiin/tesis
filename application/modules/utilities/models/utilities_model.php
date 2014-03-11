<?php

class Utilities_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

  	 
    /**
     * PRE-CONDITION: Cada elemento pasado debe contener un valor, si en el
     * formulario está vacío, omitir la inclusión dentro del array ya que ello
     * afecta en la construcción de la sentencia para insertar.
     * 
     * Genera de manera genérica el insertar en una tabla. Siguiendo el esquema
     * estricto de (clave,valor).
     * 
     * @param Array $data Contendrá los datos para agregar un usuario,
     * para cada par de valores tendran la forma: (CLAVE de la tabla, VALOR). La
     * clave de la tabla es estrictamente necesaria, el orden no importa, si
     * un campo es nulo no es necesaria agregar la entrada en el array.
     * 
     * @param String $name Nombre de la tabla.
     * 
     * @return Boolean True/False Ello depende si lo agregó o no a la base de datos.
     */
    public function add($data,$name){
        $sql = "INSERT INTO " . $name . "( ";
        
        $claves = array_keys($data);
        $vals = array_values($data);
        
        $values = "VALUES (";
        foreach ($claves as $item) {
            $sql.=  $item . ',';
            $values .= "?,";
        }
        $tama = strlen($sql);
        $sql[$tama-1] = ')';
        
        $tama_values = strlen($values);
        $values[$tama_values-1] = ')';
        
        $sql.= " " . $values . ";";
        
        return $this->db->query($sql,$vals);
    }

} // /class Utilities_model.php
//Location: ./modules/utilities/models/utilities_model.php