<?php

class Tmdb_test extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('tmdb');
	}

	function index() {
		$id = "87421";
		$json = $this->tmdb->movieInfo($id);
		$cast = $this->tmdb->movieCast($id);
		$trailer = $this->tmdb->movieTrailer($id);
		//$crew = $this->tmdb->movieCrew($id);
		echo '<pre>';
		echo $json['original_title'] . '<br>';
		foreach ($cast as $key => $value) {
			echo "$key => $value<br>";
		}
		echo $trailer['youtube'][0]['source'];
		//print_r($crew);
		echo '</pre>';
	}
}

?>