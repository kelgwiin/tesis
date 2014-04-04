<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Data_model extends MY_Model
{
    protected $_table = 'pacientes';
    protected $_id = 'id_paciente';
    public $before_create = array();
    public $after_create = array();
    public $before_update = array();
    public $after_update = array();
    public $validate = array();
    
    function __construct()
    {// Call the Model constructor
        parent::__construct();
        date_default_timezone_set("America/Caracas" );
    } 
    function readCSV($csvFile){
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle) ) { $line_of_text[] = fgetcsv($file_handle, 1024); }
        fclose($file_handle);
        return $line_of_text;
    }
}
?>