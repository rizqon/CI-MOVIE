<?php

class Coba extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->load->library('tmdb');
		$this->load->library('pagination');
	}

	function index(){

		$movieInfo = $this->tmdb->upComing($page=1);
		//$this->load->view('coba', $movieInfo);
		for ($a=1; $a <= $movieInfo['total_pages']; $a++) { 
			$movieInfo = $this->tmdb->upComing($a);
			foreach($movieInfo['results'] as $value){
				$idMovie = $value['id'];
				$cek = $this->tmdb->movie_info($idMovie);
				$data['id'] = $cek['id'];
				$data['judul'] = $cek['title'];
				$data['tag'] = $cek['tagline'];
				$data['backdrop'] = $cek['backdrop_path'];
				$data['poster'] = $cek['poster_path'];
				$data['status'] = $cek['status'];
				$data['date'] = $cek['release_date'];
				$data['cerita'] = $cek['overview'];
				$this->load->view('coba', $data);
			}
		}
	}	
}