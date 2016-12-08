<?php
namespace OsmanSorkar\Themesettings\Block\Widget;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Widget\Block\BlockInterface;

class Producttab extends \Magento\Catalog\Block\Product\AbstractProduct implements BlockInterface
{
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Category\Collection
     */
    private $categoryCollection;

    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollection,
        \Magento\Catalog\Block\Product\Context $context,
        array $data = [])
    {
        $this->_imageHelper = $context->getImageHelper();
        $this->imageBuilder = $context->getImageBuilder();
        $this->_compareProduct = $context->getCompareProduct();
        $this->_wishlistHelper = $context->getWishlistHelper();
        $this->_cartHelper = $context->getCartHelper();
        $this->_catalogConfig = $context->getCatalogConfig();
        $this->_coreRegistry = $context->getRegistry();
        $this->_taxData = $context->getTaxData();
        $this->_mathRandom = $context->getMathRandom();
        $this->reviewRenderer = $context->getReviewRenderer();
        $this->stockRegisdtry = $context->getStockRegistry();
        $this->categoryCollection=$categoryCollection;
        parent::__construct($context, $data);
    }

    public function getCategoryIds(){
        return explode(",",$this->getData("category_ids"));
    }

    public function getCategorys(){
        $categorys=$this->categoryCollection->create()->addAttributeToSelect('*');
        return $categorys->addIdFilter($this->getCategoryIds())->load();
    }
}