<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Article_model extends CI_Model
{
    private $table = 'article';
    public function __construct()
    {
        $this->load->database();
    }
    public function Db_check_bai_viet_tu_vi($id,$slug)
    {
       $link = $slug.'-A'.$id.'.html'; 
       $this->db->where('link',$link);
       $query = $this->db->get('bai_viet_tu_vi');
       $result  = $query->row_array();
       if(!empty($result))
         return true;
       else
         return false;
    }
    public function Db_list($arrId = array(), $limit, $offset)
    {
        $this->db->select('id,name,slug,parent,avatar');
        $this->db->where_in('parent', $arrId);
        $this->db->where('state', 1);
        $this->db->order_by('orders', 'DESC');
        $query = $this->db->get('article');
        return $query->result_array();
    }
    public function Db_list_limit_order($limit)
    {
        $this->db->select('id,title,slug,description,content');
        $this->db->where('state', 1);
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('article');
        return $query->result_array();
    }
    public function Db_list_where_array($arrId = array())
    {
        $this->db->select('id,name,slug,parent,avatar');
        $this->db->where_in('id', $arrId);
        $this->db->where('state', 1);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('article');
        return $query->result_array();
    }

    public function Db_list_relationship($id, $parent)
    {
        $this->db->select('id,parent,name,slug,avatar');
        $this->db->from('article');
        $this->db->where('parent', $parent);
        $this->db->where('id <> ', $id);
        $this->db->where('state', 1);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function Db_get_Menu($menu_id)
    {
        $curent_menu = $this->db->select('lft,rgt')->where('id', $menu_id)->get('menu')->
            row_array();
        $this->db->select('id,name,slug,parent');
        $this->db->from('menu');
        $this->db->where('lft <= ', $curent_menu['lft']);
        $this->db->where('rgt >= ', $curent_menu['rgt']);
        $this->db->order_by('lft', 'ASC');
        $this->db->order_by('rgt', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function Db_article_feature()
    {
        $this->db->select('id,parent,name,slug,avatar,summary');
        $this->db->where('state', 1);
        $this->db->where('feature', 1);
        if ($this->agent->is_mobile()) {
            $this->db->limit(5);
        }
        else{
            $this->db->limit(10);
        }
        $this->db->order_by('id','desc');
        $query = $this->db->get('article');
        return $query->result_array();
    }

    public function Db_article_parent($parent,$limit = null,$offset = null)
    {
        $result = $this->db->select('article.*')
                    ->from('article')
                    ->join('menu','article.parent = menu.id')
                    ->where(array('article.state'=>1,'article.parent'=>$parent))
                    ->limit($limit,$offset)
                    ->order_by('created_date', 'desc')
                    ->get()
                    ->result_array();
        return $result;
    }

    public function Db_article_parent_count($parent)
    {
        $result = $this->db->select('article.*')
                    ->from('article')
                    ->join('menu','article.parent = menu.id')
                    ->where(array('article.state'=>1,'article.parent'=>$parent))
                    ->get()
                    ->num_rows();
        return $result;
    }
    
    /*public function Db_article_parent($parent)
    {
        $result = $this->db->select('article.*')
                    ->from('article')
                    ->join('menu','article.parent = menu.id')
                    ->where(array('article.state'=>1,'article.parent'=>$parent))
                    ->get()
                    ->result_array();
        return $result;
    }*/

    public function Db_congcu($menu_id)
    {
        $return = array();
        $position = $this->db->select('lft,rgt')->where('menu_id', $menu_id)->where('position',
            'top')->get('position')->row_array();
        if (!empty($position))
        {
            $this->db->select('m.name, m.slug, m.avatar, m.description,m.content');
            $this->db->from('menu as m');
            $this->db->join('position as p', 'm.id = p.menu_id');
            $this->db->where('p.lft > ', $position['lft']);
            $this->db->where('p.rgt < ', $position['rgt']);
            $this->db->where('p.position', 'top');
            $this->db->where('m.module', 'congcu');
            $this->db->order_by('p.lft', 'ASC');
            $query = $this->db->get();
            $return = $query->result_array();
        }
        return $return;

    }

    public function Db_category($menu_id, $position_node = 'category')
    {
        $return = array();
        $position = $this->db->select('lft,rgt')->where('menu_id', $menu_id)->where('position',
            $position_node)->get('position')->row_array();
        if (!empty($position))
        {
            $this->db->select('m.name, m.slug, m.avatar, m.description,m.content');
            $this->db->from('menu as m');
            $this->db->join('position as p', 'm.id = p.menu_id');
            $this->db->where('p.lft > ', $position['lft']);
            $this->db->where('p.rgt < ', $position['rgt']);
            $this->db->where('p.position', $position_node);
            $this->db->where('m.module', 'congcu');
            $this->db->order_by('p.lft', 'ASC');
            $query = $this->db->get();
            $return = $query->result_array();
        }
        return $return;

    }

    public function getLike($params){
        $result = $this->db->from($this->table);
        return $this->db->like($params)->get()->row_array();
    }

    public function getQuery($sql){
        return $this->db->query($sql)->row_array();
    }

    public function Db_baiviettuvi($nam_xem = 2020)
      {
        $this->db->select('*');
        $this->db->from('bai_viet_tu_vi');
        $this->db->where('nam_xem',$nam_xem);
        $this->db->order_by('dia_chi','ASC');
        $this->db->order_by('nam_sinh','ASC');
        $this->db->order_by('gioi_tinh','ASC');
        $query = $this->db->get();
        return $query->result_array();
      }
    public function Db_baivietxongdat($nam_xem)
      {
        $this->db->select('*');
        $this->db->from('bai_viet_xong_dat');
        $this->db->where('nam_xem',$nam_xem);
        $this->db->order_by('dia_chi','ASC');
        $this->db->order_by('nam_sinh','ASC');
        $this->db->order_by('gioi_tinh','ASC');
        $query = $this->db->get();
        return $query->result_array();
      }  
    public function Db_ajax_bai_viet_tu_vi($post)
      {
        $post['nam_xem'] = isset($post['nam_xem']) ? $post['nam_xem'] : 2021;
        $this->db->select('link');
        $this->db->where('nam_sinh',$post['nam_sinh']);
        $this->db->where('gioi_tinh',$post['gioi_tinh']);
        $this->db->where('nam_xem',$post['nam_xem']);
        $query = $this->db->get('bai_viet_tu_vi');
        return $query->row('link');
      }  
    public function Db_ajax_bai_viet_xong_dat($post)
      {
        $this->db->select('link');
        $this->db->where('nam_sinh',$post['nam_sinh']);
        $this->db->where('nam_xem',$post['nam_xem']);
        //$this->db->where('gioi_tinh',$post['gioi_tinh']);
        $query = $this->db->get('bai_viet_xong_dat');
        return $query->row('link');
      }    
    public function Db_bvlq($article_id)
      {
         $this->db->select('a.id,a.name,a.slug');
         $this->db->from('article AS a');
         $this->db->join('article_relations AS ar','a.id = ar.article_id');
         $this->db->where('a.id',$article_id);
         $query = $this->db->get();
         return $query->result_array();
      } 
 
}
