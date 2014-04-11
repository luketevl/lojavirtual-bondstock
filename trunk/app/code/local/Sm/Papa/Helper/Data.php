<?php
class Sm_Papa_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function __construct(){
		$this->defaults = array(
			/* general options */
			'showcpanel'				=> '1',
			'color'						=> 'cyan',
			'body_background_color'		=> '#ffffff',
			'body_link_color'			=> '#ff8a00',
			'body_text_color'			=> '#666666',
			'menu_styles'				=> '1',
			'google_font'				=> '',
			/*'google_font_font_weight'   =>'200',*/
			'google_font_targets'		=> '',
			/*'body_font_size'			=> '14px',*/
			'body_font_family'			=> 'segoe ui',
		);
	}

	function get($attributes=array())
	{
		$data = $this->defaults;
		$general = Mage::getStoreConfig("papa_cfg/general");
		if (!is_array($attributes)) {
			$attributes = array($attributes);
		}
		if (is_array($general))	
		$data = array_merge($data, $general);
		return array_merge($data, $attributes);;
	}
}
	 