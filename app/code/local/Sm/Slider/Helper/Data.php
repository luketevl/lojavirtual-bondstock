<?php
/*------------------------------------------------------------------------
 # SM Slider - Version 1.1
 # Copyright (c) 2013 YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Slider_Helper_Data extends Mage_Core_Helper_Abstract {
	public function __construct(){
		$this->defaults = array(
			/* General setting */
			'isenabled'		=> '1',
			'title' 		=> 'SM [Modulename]',
			/* Module options */
			'slider_title_text' 		=> 'Title Slider',
			'product_links_target' =>'_self',
			'theme' 			=> 'theme1',	
			'button_display' 			=> '1',
			'control' 			=> 'style',
			'anchor' 			=> 'top',			
			/* product query */
			'product_source'		=> 'catalog',
			'product_category' 		=> array(),				// Select category
			'product_order_by'		=> '',					// Sort list product
			'product_order_dir' 	=> '',					// ASC or DESC
			'product_limitation' 	=> '7',  				// Always exclude these products
			
			/* product details */
			'product_image_width'	=> '199',
			'product_image_height'	=> '150',
			
			'product_title_disp'	=> '1',
			'product_title_max_characters'=> '20',
			
			'product_description_disp' 		=> '1',
			'product_description_max_characters' 	=> '100',
			'item_description_striptags' 		=> '1',
			'item_description_keeptags'		=> '',			
			
			'product_readmore_disp' 		=> '1',
			'product_readmore_text' 		=> 'Details',

			'product_price_disp'	=> '1',
			'product_reviews_count'	=> '1',
			
			'start'	=> '1',
			'scroll'			=> '1',
			'duration'			=> '800',
			'delay'	=> '2500',
			'stop'  => '1',

			'include_jquery'	=> '1',
			'deviceclass_sfx'			=> 'preset01-4 preset02-3 preset03-2 preset04-2 preset05-1',
			'pretext'			=> '',
			'posttext'			=> ''
			
			/**config_fields**/
		);
	}

	function get($attributes=array())
	{
		$data = $this->defaults;
		$general 					= Mage::getStoreConfig("slider_cfg/general");
		$module_setting				= Mage::getStoreConfig("slider_cfg/module_setting");
		$product_selection 			= Mage::getStoreConfig("slider_cfg/product_selection");
		$product_display_setting 	= Mage::getStoreConfig("slider_cfg/product_display_setting");
		$effect_setting 	        = Mage::getStoreConfig("slider_cfg/effect_setting");
		$advanced 					= Mage::getStoreConfig("slider_cfg/advanced");
		if (!is_array($attributes)) {
			$attributes = array($attributes);
		}
		if (is_array($general))					$data = array_merge($data, $general);
		if (is_array($module_setting)) 			$data = array_merge($data, $module_setting);
		if (is_array($product_selection)) 		$data = array_merge($data, $product_selection);
		if (is_array($product_display_setting)) $data = array_merge($data, $product_display_setting);
		if (is_array($effect_setting)) $data = array_merge($data, $effect_setting);
		if (is_array($advanced)) 				$data = array_merge($data, $advanced);
		
		return array_merge($data, $attributes);;
	}
	

	public function truncate($string, $length, $etc='...'){
		return defined('MB_OVERLOAD_STRING')
		? self::_mb_truncate($string, $length, $etc)
		: self::_truncate($string, $length, $etc);
	}
	
	/**
	 * Truncate string if it's size over $length
	 * @param string $string
	 * @param int $length
	 * @param string $etc
	 * @return string
	 */
	private static function _truncate($string, $length, $etc='...'){
		if ($length>0 && $length<strlen($string)){
			$buffer = '';
			$buffer_length = 0;
			$parts = preg_split('/(<[^>]*>)/', $string, -1, PREG_SPLIT_DELIM_CAPTURE);
			$self_closing_tag = split(',', 'area,base,basefont,br,col,frame,hr,img,input,isindex,link,meta,param,embed');
			$open = array();
	
			foreach($parts as $i => $s){
				if( false===strpos($s, '<') ){
					$s_length = strlen($s);
					if ($buffer_length + $s_length < $length){
						$buffer .= $s;
						$buffer_length += $s_length;
					} else if ($buffer_length + $s_length == $length) {
						if ( !empty($etc) ){
							$buffer .= ($s[$s_length - 1]==' ') ? $etc : " $etc";
						}
						break;
					} else {
						$words = preg_split('/([^\s]*)/', $s, - 1, PREG_SPLIT_DELIM_CAPTURE);
						$space_end = false;
						foreach ($words as $w){
							if ($w_length = strlen($w)){
								if ($buffer_length + $w_length < $length){
									$buffer .= $w;
									$buffer_length += $w_length;
									$space_end = (trim($w) == '');
								} else {
									if ( !empty($etc) ){
										$more = $space_end ? $etc : " $etc";
										$buffer .= $more;
										$buffer_length += strlen($more);
									}
									break;
								}
							}
						}
						break;
					}
				} else {
					preg_match('/^<([\/]?\s?)([a-zA-Z0-9]+)\s?[^>]*>$/', $s, $m);
					//$tagclose = isset($m[1]) && trim($m[1])=='/';
					if (empty($m[1]) && isset($m[2]) && !in_array($m[2], $self_closing_tag)){
						array_push($open, $m[2]);
					} else if (trim($m[1])=='/') {
						$tag = array_pop($open);
						if ($tag != $m[2]){
							// uncomment to to check invalid html string.
							// die('invalid close tag: '. $s);
						}
					}
					$buffer .= $s;
				}
			}
			// close tag openned.
			while(count($open)>0){
				$tag = array_pop($open);
				$buffer .= "</$tag>";
			}
			return $buffer;
		}
		return $string;
	}
	
	/**
	 * Truncate mutibyte string if it's size over $length
	 * @param string $string
	 * @param int $length
	 * @param string $etc
	 * @return string
	 */
	public function _mb_truncate($string, $length, $etc='...'){
		$encoding = mb_detect_encoding($string);
		if ($length>0 && $length<mb_strlen($string, $encoding)){
			$buffer = '';
			$buffer_length = 0;
			$parts = preg_split('/(<[^>]*>)/', $string, -1, PREG_SPLIT_DELIM_CAPTURE);
			$self_closing_tag = explode(',', 'area,base,basefont,br,col,frame,hr,img,input,isindex,link,meta,param,embed');
			$open = array();
	
			foreach($parts as $i => $s){
				if (false === mb_strpos($s, '<')){
					$s_length = mb_strlen($s, $encoding);
					if ($buffer_length + $s_length < $length){
						$buffer .= $s;
						$buffer_length += $s_length;
					} else if ($buffer_length + $s_length == $length) {
						if ( !empty($etc) ){
							$buffer .= ($s[$s_length - 1]==' ') ? $etc : " $etc";
						}
						break;
					} else {
						$words = preg_split('/([^\s]*)/', $s, -1, PREG_SPLIT_DELIM_CAPTURE);
						$space_end = false;
						foreach ($words as $w){
							if ($w_length = mb_strlen($w, $encoding)){
								if ($buffer_length + $w_length < $length){
									$buffer .= $w;
									$buffer_length += $w_length;
									$space_end = (trim($w) == '');
								} else {
									if ( !empty($etc) ){
										$more = $space_end ? $etc : " $etc";
										$buffer .= $more;
										$buffer_length += mb_strlen($more);
									}
									break;
								}
							}
						}
						break;
					}
				} else {
					preg_match('/^<([\/]?\s?)([a-zA-Z0-9]+)\s?[^>]*>$/', $s, $m);
					//$tagclose = isset($m[1]) && trim($m[1])=='/';
					if (empty($m[1]) && isset($m[2]) && !in_array($m[2], $self_closing_tag)){
						array_push($open, $m[2]);
					} else if (trim($m[1])=='/') {
						$tag = array_pop($open);
						if ($tag != $m[2]){
							// uncomment to to check invalid html string.
							// die('invalid close tag: '. $s);
						}
					}
					$buffer .= $s;
				}
			}
			// close tag openned.
			while(count($open)>0){
				$tag = array_pop($open);
				$buffer .= "</$tag>";
			}
			return $buffer;
		}
		return $string;
	}	
}
?>