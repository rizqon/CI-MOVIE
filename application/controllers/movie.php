<?php
class Movie extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->load->library('tmdb');
		$this->load->library('pagination');
	}

	function top_rated($page=1){
		$id = "87421";
		$json = $this->tmdb->top_rated($page);
		$config["uri_segment"] = 3;
		$config['base_url'] = base_url().'/index.php/movie/top_rated';
		$config['total_rows'] = $json['total_pages'];
		$config['per_page'] = 1;
		$this->pagination->initialize($config);
		for ($i=0; $i < count($json['results']); $i++) { 
			$data['judul'] = $json['results'][$i]['original_title'];
            $data['backdrop'] = $json['results'][$i]['backdrop_path'];
            $data['id'] = $json['results'][$i]['id'];
            $data['release'] = $json['results'][$i]['release_date'];
            $data['poster'] = $json['results'][$i]['poster_path'];
            $data['popular'] = $json['results'][$i]['popularity'];
            $data['title'] = $json['results'][$i]['title'];
            $data['vote_average'] = $json['results'][$i]['vote_average'];
            $data['vote_count'] = $json['results'][$i]['vote_count'];
            $this->load->view('top_rated', $data);
		}
		echo $this->pagination->create_links();
	}

	function up_coming($page=null){
		$data['movie'] = $this->tmdb->upComing($page);	
		$config["uri_segment"] = 3;
		$config['base_url'] = base_url().'/index.php/movie/up_coming';
		$config['total_rows'] = $data['movie']['total_pages'];
		$config['per_page'] = 1;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('up_coming', $data);
		
		//echo "<pre>";
		//print_r($data['movie']);
		//echo "</pre>";
	}
		
		

		

		//echo "<pre>";
		//print_r($json);
		//echo "</pre>";
}