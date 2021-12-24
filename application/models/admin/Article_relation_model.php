<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Article_relation_model extends CI_Model
{
    protected $table = 'article_relations';
    public function __construct()
    {
        $this->load->database();
    }
    
    /**
     *  get article relations by id item
     *
     *  @param int id of item
     *  @access public
     *  @return array|null
     */
    public function getArticleRelations($id){
        $result = $this->db->select('article_relations.relation_id')
                        ->from('article_relations')
                        ->join('article', 'article_relations.article_id = article.id')
                        ->where('article_id', $id)
                        ->get()
                        ->result_array();
        return $this->getKeyToArray('relation_id', $result);
    }

    /**
     *  remove all article relation by id item
     *
     *  @param int id of item
     *  @access public
     */
    public function removeArticleRelation($id){
        return $this->db->where('article_id', $id)->delete('article_relations');
    }

    /**
     *  inset
     *
     *  @param array array full inset
     *  @access public
     *  @return bool
     */
    public function insert($arrayParams){
        return $this->db->insert_batch('article_relations', $arrayParams);
    }

    /**
     *  key to array
     *
     *  @param string key get
     *  @param array array want replace
     *  @access public
     *  @return array
     */
    private function getKeyToArray($param1,$param2 = null){
        $arrResult  = null;
        foreach ($param2 as $key => $value) {
            $arrResult[$value[$param1]] = $value;
        }
        return $arrResult;
    }
}