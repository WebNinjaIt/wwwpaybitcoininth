<?php


/**
 * Helper Class for the Store Locator
 */
class AgileStoreLocator_Helper {


	/**
	 * [slugify Create Slug]
	 * @param  [type] $string [description]
	 * @return [type]         [description]
	 */
	public static function slugify($store) {

		$string = $store['title'].'-'.$store['city'];

    $string = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));

    return preg_replace('/-+/', '-', $string);
	}

	/**
	 * [getLnt Get the Coordinates]
	 * @param  [type]  $_address [description]
	 * @param  [type]  $key      [description]
	 * @param  boolean $debug    [description]
	 * @return [type]            [description]
	 */
	public static function getLnt($_address,$key,$debug = false) {

		$response = new \stdclass();
		$response->success = false;

		$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($_address);

		if($key) {
			$url .= '&key='.$key;
		}

		/*
		$crl = curl_init();
		
		curl_setopt($crl, CURLOPT_URL, $url );                                                               
		curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);             
		curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, 0);                
		
		$result = curl_exec($crl);

		if($result === false) {

		    $response->error_message = 'Curl error: ' . curl_error($crl);
		}
		*/
		

		$error_message = null;
		$result 			 = wp_remote_request($url);
		

		//Debug
		if($debug) {

			return $result;
		}

		if($result) {

			if(is_object($result)) {
				//	Failed to fetch records
				return array();
			}
			else if(isset($result['body'])) {

				$result 	= json_decode($result['body'], true);

				if(isset($result['results'][0])) {

					$result1=$result['results'][0];

					$result1 = array(
						'address'=> $result1['formatted_address'],
						'lat' => $result1['geometry']['location']['lat'],
						'lng' => $result1['geometry']['location']['lng']
					);
					return $result1;
				}
				else
					return array();
			}
		}

		return array();
	}


	/**
	 * [validate_coordinate Check if the Coordinates are correct]
	 * @return [type] [description]
	 */
	public static function validate_coordinate($lat, $lng) {

			if($lat && $lng && is_numeric($lat) && is_numeric($lng)) {

					if ($lat < -90 || $lat > 90) {
						return false;
					}


					if ($lng < -180 || $lng > 180) {
						return false;
					}

					return true;
			}

			return false;
	}

	/**
	 * [create_upload_dirs Create the upload directories if not exist]
	 * @return [type] [description]
	 */
	public static function create_upload_dirs() {

		//	CREATE DIRECTORY IF NOT EXISTS
		if(!file_exists(ASL_UPLOAD_DIR)) {

			mkdir( ASL_UPLOAD_DIR, 0775, true );
		}

		//	4 folders to copy
		$folders_to_copy = array('icon', 'Logo', 'svg');

		//	Create sub-directories
		foreach ($folders_to_copy as $folder) {

			//	CREATE DIRECTORY IF NOT EXISTS
			if(!file_exists(ASL_UPLOAD_DIR.$folder.'/')) {

				mkdir( ASL_UPLOAD_DIR.$folder.'/', 0775, true );
			}
		}
	}


	/**
	 * [tmpl_name Get the full name of the template by id]
	 * @param  [type] $template [description]
	 * @return [type]           [description]
	 */
	private static function tmpl_name($template) {

		switch ($template) {
			
			case '0':
			case '1':
			case '2':
			case '3':
			case 'list':
				
				$template = 'template-frontend-'.$template.'.php';
				break;

			case 'search':

				$template = 'asl-search.php';
				break;

			case 'form':

				$template = 'asl-store-form.php';
				break;

			case 'store':

				$template = 'asl-store-page.php';
				break;
			
			default:
				
				$template = null;
				break;
		}


		return $template;
	}

	/**
	 * [backup_template Copy the template file into theme Directory]
	 * @param  [type] $template_id [description]
	 * @return [type]              [description]
	 */
	public static function backup_template($template_id) {
		
		$template_name 			= self::tmpl_name($template_id);

		//	Validate the name
		if(!$template_name) {
			return ['success' => false, 'msg' => __('Error! Template file is not valid.', 'asl_admin')];
		}

		//$theme_directory = get_template_directory();
    $theme_directory = get_stylesheet_directory();

		$template_file_path = ASL_PLUGIN_PATH.'public/partials/'.$template_name;

		
    if (@copy($template_file_path, $theme_directory.'/'.$template_name)) {

    	return ['success' => true, 'msg' => __('Template file moved to theme directory.', 'asl_admin')];
    }

    return ['success' => false, 'msg' => __('Error! fail to move the file, check permisions.', 'asl_admin')];
	}


	/**
	 * [backup_template Remove the template file from theme Directory]
	 * @param  [type] $template_id [description]
	 * @return [type]              [description]
	 */
	public static function remove_template($template_id) {
		
		$template_name 			= self::tmpl_name($template_id);

		//	Validate the name
		if(!$template_name) {
			return ['success' => false, 'msg' => __('Error! Template file is not valid.', 'asl_admin')];
		}

		//$theme_directory = get_template_directory();
    $theme_directory = get_stylesheet_directory();

    
    if(!file_exists($theme_directory.'/'.$template_name)) {

    	return ['success' => false, 'msg' => __("Error! Template file doesn't exist.", 'asl_admin')];
    }

		//$template_file_path = ASL_PLUGIN_PATH.'public/partials/'.$template_name;

    if (@unlink($theme_directory.'/'.$template_name)) {

    	return ['success' => true, 'msg' => __('Template file removed from the theme directory.', 'asl_admin')];
    }

    return ['success' => false, 'msg' => __('Error! fail to move the file, check permisions.', 'asl_admin')];
	}


	/**
	 * [migrate_assets Migrate the Assets]
	 * @return [type] [description]
	 */
	public static function migrate_assets() {

		WP_Filesystem();

		$is_copied = false;

		//	Create Directories
		self::create_upload_dirs();

		//	Check for the dependency
		if (!function_exists('copy_dir')) {
			require_once(ABSPATH . 'wp-admin/includes/file.php');
		}

		// Check if get_plugins() function exists. This is required on the front end of the
    if ( ! function_exists( 'get_plugins' ) ) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }

    $plugins = get_plugins();


    //  Current version
    $active_version = explode('/', trim(ASL_PLUGIN_PATH, '/'));
    $active_version = $active_version[count($active_version) - 1];

    foreach ($plugins as $key => $plugin) {
      
      if($plugin['TextDomain']  == 'asl_locator' || $plugin['TextDomain']  == 'agile-store-locator') {

        $sl_path_bath = explode('/', $key);
        $sl_path_bath = $sl_path_bath[0];
        

        if($active_version != $sl_path_bath) {

        	//	Copy the Folders
					$folders_to_copy = array('icon', 'Logo', 'svg');

					foreach ($folders_to_copy as $folder) {
						
						$target_dir  = ASL_UPLOAD_DIR.$folder.'/';
						$plugin_path = WP_PLUGIN_DIR.'/'.$sl_path_bath;
						$source_dir  = $plugin_path.'/public/'.$folder.'/';

						@copy_dir($source_dir, $target_dir);

						$is_copied = true;
					}
          
        }
      }
    }

    return $is_copied;
	}


	/**
	 * [copy_assets Copy the assets directory to the uploads folder]
	 * @return [type] [description]
	 */
	public static function copy_assets() {

		WP_Filesystem();

		//	Create Directories
		self::create_upload_dirs();

		//	Check for the dependency
		if (!function_exists('copy_dir')) {
			require_once(ABSPATH . 'wp-admin/includes/file.php');
		}

		//	4 folders to copy
		$folders_to_copy = array('icon', 'Logo', 'svg');

		foreach ($folders_to_copy as $folder) {
			
			$target_dir = ASL_UPLOAD_DIR.$folder.'/';
			$source_dir = ASL_PLUGIN_PATH.'public/'.$folder.'/';

			@copy_dir($source_dir, $target_dir);
		}
	}


	/**
	 * [openHours Provide string of Opening Hours]
	 * @param  [type] $store [description]
	 * @return [type]        [description]
	 */
	public static function openHours($store) {

		$timings  	= '';

		$days_str   = array('sun'=>__( 'Sun','asl_locator'), 'mon'=>__('Mon','asl_locator'), 'tue'=>__( 'Tues','asl_locator'), 'wed'=>__( 'Wed','asl_locator' ), 'thu'=> __( 'Thur','asl_locator'), 'fri'=>__( 'Fri','asl_locator' ), 'sat'=> __( 'Sat','asl_locator'));

		if($store->open_hours) {

        $open_hours = json_decode($store->open_hours);

        $timings  	= '';

        if(is_object($open_hours)) {

          $open_details = array();

          foreach($open_hours as $key => $_day) {

            $key_value = '';

            if($_day && is_array($_day)) {

              $key_value = implode(',', $_day);

              $timings  .= '<div class="sl-day">';
              $timings  .= '<div class="sl-day-lbl">'.$days_str[$key].'</div><div class="sl-timings">';


              //	Loop Over the Timing
              foreach ($_day as $time) {
              	
              	$timings .= '<span class="sl-time">'.$time.'</span>';
              }

              $timings  .= '</div></div>';

            }
            else if($_day == '1') {

              $key_value = $_day;
            }
            else  {

              $key_value = '0';
            }

            $open_details[] = $key.'='.$key_value;
          }

          $open_hours_value = implode('|', $open_details);
        }

    }


    return $timings;
	}

	/**
	 * [fix_backward_compatible Fix the Backward Compatibility]
	 * @return [type] [description]
	 */
	public static function fix_backward_compatible()
	{
		
		global $wpdb;

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		
		$prefix 	 = $wpdb->prefix."asl_";
		$table_name  = ASL_PREFIX."stores_timing";
		$store_table = ASL_PREFIX."stores";
		$database    = $wpdb->dbname;

		//Add Open Hours Column		
		$sql 	= "SELECT count(*) as c FROM information_schema.COLUMNS WHERE TABLE_NAME = '{$store_table}' AND COLUMN_NAME = 'open_hours';";// AND TABLE_SCHEMA = '{$database}'
		$result = $wpdb->get_results($sql);
		
		if($result[0]->c == 0) {

			$wpdb->query("ALTER TABLE {$store_table} ADD open_hours text;");
		}
		else {
			
			return;
		}


		//Check if Exist
		/*
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			return;
		}
		*/
		


		//Convert All Timings
		$stores = $wpdb->get_results("SELECT s.`id` , s.`start_time`, s.`time_per_day` , s.`end_time`, t.* FROM {$store_table} s LEFT JOIN {$table_name} t ON s.`id` = t.`store_id`");
		
		foreach($stores as $timing) {

			$time_object = new \stdClass();
			$time_object->mon = array();
			$time_object->tue = array();
			$time_object->wed = array();
			$time_object->thu = array();
			$time_object->fri = array();
			$time_object->sat = array();
			$time_object->sun = array();
			

			if($timing->time_per_day == '1') {

				if($timing->start_time_0 && $timing->end_time_0) {

					$time_object->sun[] = $timing->start_time_0 .' - '. $timing->end_time_0;
				}

				if($timing->start_time_1 && $timing->end_time_1) {

					$time_object->mon[] = $timing->start_time_1 .' - '. $timing->end_time_1;
				}

				if($timing->start_time_2 && $timing->end_time_2) {

					$time_object->tue[] = $timing->start_time_2 .' - '. $timing->end_time_2;
				}


				if($timing->start_time_3 && $timing->end_time_3) {

					$time_object->wed[] = $timing->start_time_3 .' - '. $timing->end_time_3;
				}

				if($timing->start_time_4 && $timing->end_time_4) {

					$time_object->thu[] = $timing->start_time_4 .' - '. $timing->end_time_4;
				}

				if($timing->start_time_5 && $timing->end_time_5) {

					$time_object->fri[] = $timing->start_time_5 .' - '. $timing->end_time_5;
				}

				if($timing->start_time_6 && $timing->end_time_6) {

					$time_object->sat[] = $timing->start_time_6 .' - '. $timing->end_time_6;
				}
			}
			else if(trim($timing->start_time) && trim($timing->end_time)) {

				$time_object->mon[] = $time_object->sun[] = $time_object->tue[] = $time_object->wed[] = $time_object->thu[] =$time_object->fri[] = $time_object->sat[] = trim($timing->start_time) .' - '. trim($timing->end_time);
			}
			else {

				$time_object->mon = $time_object->tue = $time_object->wed = $time_object->thu = $time_object->fri = $time_object->sat = $time_object->sun = '1';
			}
			
			$time_object = json_encode($time_object);

			//Update new timings
			$wpdb->update(ASL_PREFIX."stores",
				array('open_hours'	=> $time_object),
				array('id' => $timing->id)
			);
		}


		$sql = "DROP TABLE IF EXISTS `".$table_name."`;";
		$wpdb->query( $sql );
	}

	/**
	 * [getaddress Get the Address]
	 * @param  [type] $lat [description]
	 * @param  [type] $lng [description]
	 * @return [type]      [description]
	 */
	public static function getaddress($lat,$lng) {

		$url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng);

		$json = @file_get_contents($url);
		$data=json_decode($json);
		$status = $data->status;
		if($status=="OK")
		return $data->results[0]->formatted_address;
		else
		return false;
	}


	/**
	 * [getCoordinates Get the Coordinates]
	 * @param  [type] $street  [description]
	 * @param  [type] $city    [description]
	 * @param  [type] $state   [description]
	 * @param  [type] $zip     [description]
	 * @param  [type] $country [description]
	 * @param  [type] $key     [description]
	 * @return [type]          [description]
	 */
	public static function getCoordinates($street,$city,$state,$zip,$country,$key)
	{
		$params = array(
			'address' => $street,'city'=> $city, 'state'=> $state,'postcode'=> $zip, 'country' => $country
		);

		if($params['postcode'] || $params['city'] || $params['state']) {

			$_address = $params['address'].', '.$params['postcode'].'  '.$params['city'].' '.$params['state'].' '.$params['country'];
			$response = self::getLnt($_address,$key);
			
			if(/*$response['address'] && */isset($response['lng']) && $response['lng'] && isset($response['lat']) && $response['lat']) {
				
				return $response;
			}
			else {
				return null;
			}
		}
		else
		{
			return null;
		}
		
		return true;
	}


	/**
	 * [create_zip Create a Zip File]
	 * @param  array   $files       [description]
	 * @param  string  $destination [description]
	 * @param  boolean $overwrite   [description]
	 * @return [type]               [description]
	 */
	public static function create_zip($files = array(),$destination = '',$overwrite = false) {
		
		//if the zip file already exists and overwrite is false, return false
		if(file_exists($destination) && !$overwrite) { return false; }
		

		//vars
		$valid_files = array();
		//if files were passed in...
		if(is_array($files)) {
			//cycle through each file
			foreach($files as $file) {

				//make sure the file exists
				if(file_exists($file)) {
					$valid_files[] = $file;
				}
			}
		}

		//if we have good files...
		if(count($valid_files)) {
			//create the archive
			$zip = new ZipArchive();
			//if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
			if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
				
				return false;
			}

			//add the files
			foreach($valid_files as $file) {

				$relativePath = str_replace(ASL_UPLOAD_DIR, '', $file);
				$zip->addFile($file,$relativePath);
			}
			//debug
			//echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
			
			//close the zip -- done!
			$zip->close();
			
			//check to make sure the file exists
			return file_exists($destination);
		}
		else
		{
			return false;
		}
	}


	/**
	 * [extract_assets Extract a Zip FIle]
	 * @param  [type] $zip_path [description]
	 * @return [type]           [description]
	 */
	public static function extract_assets($zip_path) {

		if(!file_exists($zip_path)) {
			return false;
		}

		$zip = new ZipArchive();
		
		if ($zip->open($zip_path) === true) {

		    $allow_exts = array('jpg','png','jpeg','JPG','gif','svg','SVG');	
		    
		    for($i = 0; $i < $zip->numFiles; $i++) {
		        
	        $a_file = $zip->getNameIndex($i);
	        
	        $extension  = explode('.', $a_file);
	        $extension  = $extension[count($extension) - 1];

		      //Extract only allowed extension
					if(in_array($extension, $allow_exts)) {

						//$zip->extractTo(ASL_PLUGIN_PATH.'public', array($a_file));
						$zip->extractTo(ASL_UPLOAD_DIR, array($a_file));
					}
		    }  

		    //Close the connection                 
		    $zip->close();   

		    return true;                
		}

		return false;
	}
}

?>
