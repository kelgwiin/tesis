<?php
class MY_Model extends CI_Model
{
    public $before_create = array();
    public $after_create = array();
    public $before_update = array();
    public $after_get = array('query_array');
    public $return_type = 'array';
    public $return_index = FALSE;
    //agregar datos de auditoria como atributos
    
    public function my_get()
    {
        $args = func_get_args();
        
        if (count($args) > 1 || is_array($args[0]))  $this->db->where($args);
        else $this->db->where($_id, $args[0]);
        $query = $this->db->get($this->_table);
        
        return ($query) !== NULL ? $query->row() : FALSE;
    }
    public function get_custom($select,$from,$where,$join=FALSE,$order = FALSE,$limit = FALSE)
    {
        if($select !== FALSE) $this->db->select($select);
        
        if($from !== FALSE) $this->db->from($from);
        else $this->db->from($this->_table);
        
        if($join !== FALSE) $this->my_join($join);
        
        if($where !== FALSE)
        {
            if(count($where) > 1 || is_array($where)) $this->db->where($where);
            else $this->db->where($this->_id, $where);
        }
        
        if($order !== FALSE)
        {
            $this->db->order_by($order);
        }
        
        if($limit !== FALSE)
        {
            $this->db->limit("{$limit}");
        }
        
        return $this->observe('after_get', $this->db);            
        
    }
    public function my_join($tabla)
    {
        if (count($tabla) > 1 || is_array($tabla)) 
        {
            foreach($tabla as $t) 
            {
                $comparacion = '';
                $tabla2 = isset($t['tabla2']) ? $t['tabla2'] : $this->_table;
                foreach($t['campo'] as $c)
                {
                    $conector = isset($c['conector']) ? $c['conector'] : '';
                    $comparacion .= "{$t['tabla1']}.{$c['campo']} = {$tabla2}.{$c['campo']} {$conector} ";
                } 
                $this->db->join($t['tabla1'],$comparacion,"{$t['tipo']}");
            }            
        }
        else 
        {
            $join = explode(',',$tabla);
            $this->db->join($join[0],$join[1],$join[2]);
        }
        
        return $this;
    }
    public function my_insert($data, $skip_validation = FALSE, $return_data = FALSE, $audit = TRUE, $batch = FALSE)
    {
        if($audit) $data['fecha_creacion'] = $data['fecha_modificacion'] = date('Y-m-d H:i:s');
        $data = $this->observe('before_create', $data);
        
        if (!$skip_validation && !$this->validate($data)) $success = FALSE;
        else
        {
            $data = $this->observe('after_create', $data);
            if($batch) $success = $this->db->insert_batch($this->_table, $data);
            else $success = $this->db->insert($this->_table, $data);
        }
        return ($success) ? (($return_data) ? $data : $this->db->insert_id()) : FALSE;
    }
    public function my_update($where, $data, $audit = TRUE,$upd = FALSE)
    {
        if($audit) $data['fecha_modificacion'] = date('Y-m-d H:i:s');
        $data = $this->observe('before_update', $data);
        
        if($where !== FALSE)
        {
            if(count($where) > 1 || is_array($where))
            {
                foreach($where as $k => $v) $this->db->where($k,$v);            
            }
            else $this->db->where($where);
        }        
        
        if($upd !== FALSE) 
        {
            $data['temp'] = $upd;
            $data = $this->observe('after_update', $data);
            unset($data['temp']);
        }
        else $data = $this->observe('after_update', $data);

        return $this->db->update($this->_table, $data);
    }
    public function my_delete($where)
    {
        if (count($where) > 1 || is_array($where)) $this->db->where($where);
        else $this->db->where($_id, $where);
        
        return $this->db->delete($this->_table);
    }
    public function observe($event, $data)
    {
        if (isset($this->$event) && is_array($this->$event))
        {
            foreach ($this->$event as $method) $data = call_user_func_array(array($this,$method), array($data));            
        }
        return $data;
    }
    public function validate($data)
    {
        if (!empty($this->validate))
        {
            foreach ($data as $key => $value) $_POST[$key] = $value;
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules($this->validate);
            
            return $this->form_validation->run();
        }
        else return TRUE;
    }
    public function query_array($query)
    {
        switch($this->return_type)
        {
            case 'array':
                $result = $query->get()->result_array();
                if(sizeof($result))
                {
                    if($this->return_index !== FALSE)
                    {
                        foreach ($result as $row) $data[$row[$this->return_index]] = $row;
                        return $data;
                    }
                    else return $result;
                } 
                else return array();                               
            break;
            case 'object':
                $query = $query->get();
                if($query->num_rows === 1) return $query->result()->row();
                else return $query->result();       
            break;
        }
    }
    public function consola_js($ro,$method="log")
    {
        $target = json_encode($ro);
        ?> 
        <script>
            var target = <?php echo $target; ?>;
            console.<?php echo $method; ?>( target );
        </script> 
        <?php
    }
}
?>