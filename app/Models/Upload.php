<?php
if ( !defined( 'BASEPATH' ) )exit( 'No direct script access allowed' );

class Upload extends CI_Model {
	
	function __construct() {
		$this->tableName = 'uploads';
		$this->primaryKey = 'id';
	}

	public
	function insert( $data = array() ) {
		if ( !array_key_exists( "timestamp", $data ) ) {
			$data[ 'timestamp' ] = date( "Y-m-d H:i:s" );
		}
		if ( !array_key_exists( "timestamp", $data ) ) {
			$data[ 'timestamp' ] = date( "Y-m-d H:i:s" );
		}
		$insert = $this->db->insert( $this->tableName, $data );
		if ( $insert ) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}
}