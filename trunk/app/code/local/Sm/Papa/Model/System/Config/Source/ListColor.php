<?php
/*------------------------------------------------------------------------
 # SM papa - Version 1.0
 # Copyright (c) 2013 The YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Papa_Model_System_Config_Source_ListColor
{
	public function toOptionArray()
	{	
		return array(
		array('value'=>'pink', 'label'=>Mage::helper('papa')->__('Pink')),
		array('value'=>'blue', 'label'=>Mage::helper('papa')->__('Blue')),
		array('value'=>'brown', 'label'=>Mage::helper('papa')->__('Brown')),		
		array('value'=>'cyan', 'label'=>Mage::helper('papa')->__('Cyan')),
		array('value'=>'violet', 'label'=>Mage::helper('papa')->__('Violet')),
		array('value'=>'yellow', 'label'=>Mage::helper('papa')->__('Yellow'))
		);
	}
}
