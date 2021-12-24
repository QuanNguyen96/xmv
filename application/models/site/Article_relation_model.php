<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Article_relation_model extends CI_Model
{
    private $table = 'article_relations';
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
    public function getArticleRelationsToValue($id){
        $result = $this->db->select('article_relations.relation_id')
                        ->from('article_relations')
                        ->join('article', 'article_relations.article_id = article.id')
                        ->where('article_id', $id)
                        ->get()
                        ->result_array();
        if ($result) {
            // Fill key
            foreach ($result as $key => $value) {
                $arrLists[] = $value['relation_id'];
            }
            return $arrLists;
        }
        return null;
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
