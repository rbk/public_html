<?php

	class Projects {

			public function __construct( $name ) {

				$this->name = $name;
				$this->path = './index';
				$this->js_url = $this->path .'/js';
				$this->css_url = $this->path .'/css';
				$this->current_dir = getcwd();
				$this->images_dir = $this->path . '/images';
				// error_log( 'Current directory: ' . $this->current_dir);
			}
			public function get_current_directory(){

				$items = scandir($this->current_dir);
				unset( $items[0] );
				unset( $items[1] );
				return $items;
				
			}

			public function list_projects(){
				$items = $this->get_current_directory();
				foreach( $items as $name ){
					if( is_dir( $name ) ){
						$url = 'localhost/' . $name;
						echo '<a href="'.$url.'">'.$name.'</a>';
					}
				}
			}
			public function rewrite_json_file() {

				$items = $this->get_current_directory();
				ksort( $items ); 
				// empty array to hold data we're about to loop through
				$json = array();

				foreach( $items as $name ){
					if( is_dir( $name ) ){

						$url = $name;
						$obj = array(
							'name' 		 => $name, 
							'url' 		 => $url,
							'imageUrl' 	 => "",
							'importance' => 18,
							'highlight'	 => false,
							'animation' => $this->insert_random_animation( )
						);
						array_push( $json, $obj );
					}

				}
				$fh = fopen( getcwd( ) . '/projects.json', 'w' ); // Open our JSON file
				
				// Check to see if we can create the file
				if( !$fh ){
					error_log( 'There was a problem creating/opening the projects.json file.' );
					error_log( 'You may need to use "chown" to change the owner of the file to root aka the server.' );
					exit();
				}
				fwrite( $fh, json_encode( $json ) );
				fclose($fh);
			}
			public function save_new_edits_json() {

				// fwrite( $fh, json_encode( $json, JSON_PRETTY_PRINT) );
				// fclose($fh);

			}
			private function insert_random_animation( ){
				$animations = array("bounce", "flash", "pulse", "rubberBand", "shake", "swing", "tada", "wobble", 
					"bounceIn", "bounceInDown", "bounceInLeft", "bounceInRight", "bounceInUp", 
					"fadeIn", "fadeInDown", "fadeInDownBig", "fadeInLeft", "fadeInLeftBig", "fadeInRight", 
					"fadeInRightBig", "fadeInUp", "fadeInUpBig", "flip", "flipInX", "flipInY", "lightSpeedIn", 
					"rotateIn", "rotateInDownLeft", "rotateInDownRight", "rotateInUpLeft", "rotateInUpRight", "rollIn", 
					"zoomIn", "zoomInDown", "zoomInLeft", "zoomInRight", "zoomInUp");
				// return $animations[ rand( 0, count($animations) ) ];
				return '';

			}

	}



	
?>
