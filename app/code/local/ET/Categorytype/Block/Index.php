<?php   
class ET_Categorytype_Block_Index extends Mage_Core_Block_Template{   
	protected $_defaultColumnCount = 5;
	public function getSubcategories(){
		$currentCat = Mage::registry('current_category');
	    $subCats 	= Mage::getModel('catalog/category')->load($currentCat->getId())->getChildren();
	    //get sub category ids
	    if($subCats) {
	    	$subCatIds = explode(',',$subCats);	
	    } else {
	    	$subCatIds = array();
	    }
	    return $subCatIds;
	}
	public function getProductCollection($categoryid=0){
		$category 	= Mage::getModel('catalog/category')->load($categoryid);
	    $collection = $category->getProductCollection();
	    $collection->addAttributeToSelect(array('name', 'description', 'small_image','product_url'))	
	    ->setCurPage(1)
	    ->addAttributeToFilter('status', array('eq' => 1))
        ->addFieldToFilter('visibility', Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH)
     	->setPageSize(5);
	    return $collection;
	}
	public function getColumnCount()
    {
        if (!$this->_getData('column_count')) {
            $pageLayout = $this->getPageLayout();
            if ($pageLayout && $this->getColumnCountLayoutDepend($pageLayout->getCode())) {
                $this->setData(
                    'column_count',
                    $this->getColumnCountLayoutDepend($pageLayout->getCode())
                );
            } else {
                $this->setData('column_count', $this->_defaultColumnCount);
            }
        }

        return (int) $this->_getData('column_count');
    }
     public function getPageLayout()
    {
        return $this->helper('page/layout')->getCurrentPageLayout();
    }
     public function getColumnCountLayoutDepend($pageLayout)
    {
        if (isset($this->_columnCountLayoutDepend[$pageLayout])) {
            return $this->_columnCountLayoutDepend[$pageLayout];
        }

        return false;
    }
}