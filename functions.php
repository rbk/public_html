<?php

	class Projects {

			public function __construct( $name ) {

				$this->name = $name;
				$this->path = 'http://gurustudev.com/~' . $this->name . '/';
				$this->js_url = $this->path . $this->name .'/js';
				$this->css_url = $this->path . $this->name .'/css';
				$this->current_dir = '/home/'.$name.'/public_html/';
				$this->images_dir = $this->path . $this->name . '/images';

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
						$url = $this->path.$name;
						echo '<a href="'.$url.'">'.$name.'</a>';
					}
				}
			}
			public function rewrite_json_file() {

				$items = $this->get_current_directory();

				// empty array to hold data we're about to loop through
				$json = array();

				foreach( $items as $name ){
					if( is_dir( $name ) ){

						$url = $this->path.$name;
						$obj = array(
							'name' 		 => $name, 
							'url' 		 => $url,
							'imageUrl' 	 => "",
							'importance' => 18,
							'highlight'	 => false
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
				fwrite( $fh, json_encode( $json, JSON_PRETTY_PRINT) );
				fclose($fh);
			}
			public function save_new_edits_json() {

				// fwrite( $fh, json_encode( $json, JSON_PRETTY_PRINT) );
				// fclose($fh);

			}

	}



	
?>
