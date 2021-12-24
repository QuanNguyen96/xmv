<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Seolink_model extends CI_Model {

         public function __construct(){

            $this->load->database();

         }

         

         public function Db_list_user( $limit, $offset ){

              $this->db->select( 'sl.id, sl.link, sl.title' );

              $this->db->from( 'seolink as sl' );

              $this->db->limit( $limit, $offset );

              $query = $this->db->get();

              return $query->result_array();

         }

}              