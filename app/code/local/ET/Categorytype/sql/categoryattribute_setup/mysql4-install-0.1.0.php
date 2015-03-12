<?php
$installer = $this;
$installer->startSetup();


$installer->addAttribute("catalog_category", "type",  array(
    "type"     => "int",
    "backend"  => "",
    "frontend" => "",
    "label"    => "Category type",
    "input"    => "select",
    "class"    => "",
    "source"   => "categorytype/eav_entity_attribute_source_categoryoptions",
    "global"   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    "visible"  => true,
    "required" => false,
    "user_defined"  => false,
    "default" => "",
    "searchable" => false,
    "filterable" => false,
    "comparable" => false,
	
    "visible_on_front"  => false,
    "unique"     => false,
    "note"       => ""

	));
$installer->endSetup();
	 