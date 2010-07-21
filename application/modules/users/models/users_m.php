<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Users_m extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->table = 'users';
    }

    public function user_login($username = "", $password = "") {
        if(!empty($username) AND !empty($password)) {
            $this->db->from($this->table)
                ->where('username', $username)
                ->where('password', $password);
            $query = $this->db->get();
            if($query->num_rows() == 1) {
                return $query->row_array();
            }
            return FALSE;
        }
        return FALSE;
    }

    public function change_password($username = "", $password = "") {
        return $this->db->update($this->table, array('password' => $password), array('username' => $username));
    }
}