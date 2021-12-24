<?php
class Public_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function Db_Insert($table,$data){
        $this->db->insert($table,$data);
        return true;
    }
    
    public function Db_Update($table,$data,$file,$arr_file){
         $this->db->where_in($file,$arr_file);
         $this->db->update($table,$data);
         return true;
    }
    
    public function Db_Delete($table,$where = array()){
        if(!empty($where)){
            foreach($where as $key=>$val){
                $this->db->where_in($key,$val);
            }
         $this->db->delete($table);   
        }
        
    }
    
    public function Db_Select_One($table,$where=array(),$file='*'){
        $this->db->select($file);
        $this->db->from($table);
        foreach($where as $key=>$val){
            $this->db->where($key,$val);
        }
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function Db_Select_List($table,$where=array(),$order_by=array('id'=>'ASC'),$file='*'){
        $this->db->select($file);
        $this->db->from($table);
        foreach($where as $key=>$val){
            $this->db->where($key,$val);
        }
        foreach($order_by as $key=>$val){
            $this->db->order_by($key,$val);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function Db_Check_Alias_menu($alias,$id=null){
         if($id != null){
            $sql  = ' SELECT * FROM ( SELECT id FROM article WHERE alias = "'.$alias.'" OR new_alias = "'.$alias.'" ) newtab WHERE id <> '.$id;
            
         }else{
            $sql = 'SELECT id FROM article WHERE alias = "'.$alias.'" OR new_alias = "'.$alias.'"';
         }
         $query  = $this->db->query($sql);
         $result = $query->result_array();
         if(count($result)>0){
            return false;
         }else{
            return true;
         }
    }
    
    public function Db_Check_Alias_article($alias,$id=null){
         if($id != null){
            $sql  = ' SELECT * FROM ( SELECT id FROM article WHERE alias = "'.$alias.'" OR new_alias = "'.$alias.'" ) newtab WHERE id <> '.$id;
            
         }else{
            $sql = 'SELECT id FROM article WHERE alias = "'.$alias.'" OR new_alias = "'.$alias.'"';
         }
         $query  = $this->db->query($sql);
         $result = $query->result_array();
         if(count($result)>0){
            return false;
         }else{
            return true;
         }
    }
    
    public function Db_Check_Alias_product($alias,$id=null){
         if($id != null){
            $sql  = ' SELECT * FROM ( SELECT id FROM product WHERE alias = "'.$alias.'" OR new_alias = "'.$alias.'" ) newtab WHERE id <> '.$id;
            
         }else{
            $sql = 'SELECT id FROM product WHERE alias = "'.$alias.'" OR new_alias = "'.$alias.'"';
         }
         $query  = $this->db->query($sql);
         $result = $query->result_array();
         if(count($result)>0){
            return false;
         }else{
            return true;
         }
    }
    
    public function Db_Max_Id($table){
        $this->db->select('id');
        $this->db->from($table);
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['id'];
    }
    
    
    
    
}