<?php

$this->startSetup();
$this->addAttribute('catalog_category', 'is_promotion_category', array(
    'group'         => 'General Information',
    'input'         => 'select',
    'type'          => 'int',
    'label'         => 'Show category on homepage',
	'source'        => 'eav/entity_attribute_source_boolean',
    'visible'       => true,
    'required'      => false,
    'visible_on_front' => true,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$this->addAttribute('catalog_category', 'promotion_text', array(
    'group'         => 'General Information',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Promotion Text',
	'source'        => 'eav/entity_attribute_source_boolean',
    'visible'       => true,
    'required'      => false,
    'visible_on_front' => true,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));
$this->endSetup();
