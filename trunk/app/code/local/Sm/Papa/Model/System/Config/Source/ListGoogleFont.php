<?php
/*------------------------------------------------------------------------
 # SM papa - Version 1.1
 # Copyright (c) 2013 YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Papa_Model_System_Config_Source_ListGoogleFont
{
	public function toOptionArray()
	{	
		return array(
			array('value'=>'', 'label'=>Mage::helper('papa')->__('No select')),
			array('value'=>'Dosis', 'label'=>Mage::helper('papa')->__('Dosis')),
			array('value'=>'Questrial', 'label'=>Mage::helper('papa')->__('Questrial')),
			array('value'=>'Kameron', 'label'=>Mage::helper('papa')->__('Kameron')),
			array('value'=>'Oswald', 'label'=>Mage::helper('papa')->__('Oswald')),
			array('value'=>'Open Sans', 'label'=>Mage::helper('papa')->__('Open Sans')),
			array('value'=>'BenchNine', 'label'=>Mage::helper('papa')->__('BenchNine')),
			array('value'=>'Droid Sans', 'label'=>Mage::helper('papa')->__('Droid Sans')),
			array('value'=>'Droid Serif', 'label'=>Mage::helper('papa')->__('Droid Serif')),
			array('value'=>'PT Sans', 'label'=>Mage::helper('papa')->__('PT Sans')),
			array('value'=>'Vollkorn', 'label'=>Mage::helper('papa')->__('Vollkorn')),
			array('value'=>'Ubuntu', 'label'=>Mage::helper('papa')->__('Ubuntu')),
			array('value'=>'Neucha', 'label'=>Mage::helper('papa')->__('Neucha')),
			array('value'=>'Cuprum', 'label'=>Mage::helper('papa')->__('Cuprum'))	
		);
	}
}
