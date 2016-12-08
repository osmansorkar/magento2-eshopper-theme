<?php
namespace OsmanSorkar\Themesettings\Block\Widget;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Widget\Block\BlockInterface;

class Productslide extends \Magento\Catalog\Block\Product\AbstractProduct implements BlockInterface
{
    /**
     * @var \Magento\Catalog\Model\Category
     */
    private $categoryFactory;

    public function __construct(
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
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
        $this->stockRegistry = $context->getStockRegistry();
        $this->categoryFactory=$categoryFactory;
        parent::__construct($context, $data);
    }

    public function getCategoryIds(){
        return $this->getData("category_ids");
    }

    public function getProducts(){
        $categorys=$this->categoryFactory->create()->load($this->getCategoryIds());
        return $categorys->getProductCollection()->addAttributeToSelect('*')->setPageSize(6);
    }
}