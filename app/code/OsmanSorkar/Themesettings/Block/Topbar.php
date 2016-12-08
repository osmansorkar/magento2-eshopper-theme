<?php
namespace OsmanSorkar\Themesettings\Block;

/**
 * Categoryr Filter Block;
 */
class Topbar extends \Magento\Framework\View\Element\Template
{
    public function getPhone(){
        if (empty($this->_data['phone_number'])) {
            $this->_data['phone_number'] = $this->_scopeConfig->getValue(
                'design/eshopper/phone_number',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
        }
        return $this->_data['phone_number'];
    }
    public function getEmail(){
        if (empty($this->_data['email_address'])) {
            $this->_data['email_address'] = $this->_scopeConfig->getValue(
                'design/eshopper/email_address',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
        }
        return $this->_data['email_address'];
    }
    public function getSocialUrl($name){
        $name="social_".$name;
        if (empty($this->_data[$name])) {
            $this->_data[$name] = $this->_scopeConfig->getValue(
                'design/eshopper/'.$name,
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
        }
        return $this->_data[$name];
    }
}
