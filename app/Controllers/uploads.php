<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class uploads extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model( 'Upload' );
	}

	function add() {
		if ( $this->input->post( 'imageUpload' ) ) {

			if ( !empty( $_FILES[ 'title' ][ 'image' ] ) ) {
				$config[ 'upload_path' ] = 'uploads/';
				$config[ 'allowed_types' ] = 'jpg|jpeg|png|gif';
				$config[ 'file' ] = $_FILES[ 'title' ][ 'image' ];

				$this->load->library( 'upload', $config );
				$this->upload->initialize( $config );

				if ( $this->upload->do_upload( 'image' ) ) {
					$uploadData = $this->upload->data();
					$img = $uploadData[ 'file' ];
				} else {
					$img = '';
				}
			} else {
				$img = '';
			}

			$ImageData = array(
				'title' => $this->input->post( 'title' ),
				'image' => $img
			);

			$UploadImageData = $this->Member->insert( $ImageData );

			if ( $UploadImageData ) {
				$this->session->set_flashdata( 'success_msg', 'Image uploaded successfully.' );
			} else {
				$this->session->set_flashdata( 'error_msg', 'Some problems occured, please try again.' );
			}
		}
		$this->load->view( 'uploads/add' );
	}
}