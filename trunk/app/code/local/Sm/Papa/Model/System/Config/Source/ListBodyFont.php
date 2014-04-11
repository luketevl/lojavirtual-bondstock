<?php
/*------------------------------------------------------------------------
 # SM papa - Version 1.1
 # Copyright (c) 2013 YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Papa_Model_System_Config_Source_ListBodyFont
{
	public function toOptionArray()
	{	
		return array(
			array('value'=>'segoe ui', 'label'=>Mage::helper('papa')->__('Segoe UI')),
			array('value'=>'Arial', 'label'=>Mage::helper('papa')->__('Arial')),
			array('value'=>'Arial Black', 'label'=>Mage::helper('papa')->__('Arial-black')),
			array('value'=>'Courier New', 'label'=>Mage::helper('papa')->__('Courier')),
			array('value'=>'Georgia', 'label'=>Mage::helper('papa')->__('Georgia')),
			array('value'=>'Impact', 'label'=>Mage::helper('papa')->__('Impact')),
			array('value'=>'Lucida Console', 'label'=>Mage::helper('papa')->__('Lucida-console')),
			array('value'=>'Lucida Grande', 'label'=>Mage::helper('papa')->__('Lucida-grande')),
			array('value'=>'Palatino', 'label'=>Mage::helper('papa')->__('Palatino')),
			array('value'=>'Tahoma', 'label'=>Mage::helper('papa')->__('Tahoma')),
			array('value'=>'Times New Roman', 'label'=>Mage::helper('papa')->__('Times')),	
			array('value'=>'Trebuchet', 'label'=>Mage::helper('papa')->__('Trebuchet')),	
			array('value'=>'Verdana', 'label'=>Mage::helper('papa')->__('Verdana'))		
		);
	}
}
