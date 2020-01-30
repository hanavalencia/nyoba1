<?php
class Mlogin extends CI_Model

	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function cekadmin($u,$p)
		{
			return $this->db->query("SELECT * FROM tbl_user WHERE user_username='$u' AND user_password=md5('$p') ");
		}
	}