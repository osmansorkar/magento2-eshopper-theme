<?php
namespace OsmanSorkar\Themesettings\Block;

/**
* Categoryr Filter Block;
*/
class Categoryfilter extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Catalog\Model\Category
     */
    private $categoryFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        array $data = [])
    {
        $this->validator = $context->getValidator();
        $this->resolver = $context->getResolver();
        $this->_filesystem = $context->getFilesystem();
        $this->templateEnginePool = $context->getEnginePool();
        $this->_storeManager = $context->getStoreManager();
        $this->_appState = $context->getAppState();
        $this->templateContext = $this;
        $this->pageConfig = $context->getPageConfig();
        $this->categoryFactory=$categoryFactory;
        parent::__construct($context, $data);
    }

    public function getCategoryCollection()
    {
        $rootCategory=$this->_storeManager->getStore()->getRootCategoryId();
        $storeCategory=$this->categoryFactory->create()->load($rootCategory);
        return $categoryCollection=$storeCategory->getCollection()->addAttributeToSelect(array('name', 'image', 'description','store'))
            ->addIdFilter($storeCategory->getChildren());
    }
    public function getChildCategory($id){
        $parentCategory=$this->categoryFactory->create()->load($id);
        return $categoryCollection=$parentCategory->getCollection()->addAttributeToSelect(array('name', 'image', 'description','store'))
            ->addIdFilter($parentCategory->getChildren());
    }
}
