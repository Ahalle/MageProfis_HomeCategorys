<?php 
class MageProfis_PromotionCategorys_Block_Categorys extends Mage_Core_Block_Template {
	protected $_categorys = null;
	
	protected function _construct()
    {
        parent::_construct();
        $this->addData(array('cache_lifetime' => 3600)); // 1 hour
        $this->addCacheTag(array(
            Mage_Catalog_Model_Category::CACHE_TAG,
        ));
    }
    
    public function getCacheKeyInfo()
    {
        return array(
            Mage::app()->getStore()->getId(),
            Mage::getDesign()->getPackageName(),
            Mage::getDesign()->getTheme('template'),
            'homepage_categories'
        );
    }
    
    		
	/*
	 * Get All active Categorys that shall be shown on Homepage
	 * */	
	public function getCategories() 
	{
		if(is_null($this->_categorys))
		{	
			$collection = Mage::getModel('catalog/category')->getCollection()
					->addAttributeToSelect(array('name', 'image', 'url_key','promotion_text'))
					->addAttributeToFilter('is_promotion_category', 1)
					->addAttributeToFilter('is_active', 1)
					->addAttributeToSort('position', 'ASC');
			foreach($collection as $item)
			{
				$this->addCacheTag(Mage_Catalog_Model_Category::CACHE_TAG . '_' . $item->getId());
			}		
			$this->_categorys = $collection;
		}	
		return $this->_categorys;			
	}
}
