<?php
class ET_Categorytype_Block_Catalog_Category_View extends Mage_Catalog_Block_Category_View
{
	public function getCustomHtml()
	{
		return $this->getChildHtml('custom_list');
	}
}
			