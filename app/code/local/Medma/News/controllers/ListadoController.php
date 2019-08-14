<?php

class Medma_News_ListadoController extends Mage_Core_Controller_Front_Action
{

	public function preDispatch(){
		parent::preDispatch();

   	#register domain event starts
        
		$generalEmail = Mage::getStoreConfig('trans_email/ident_general/email');
    $domainName = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);
		

		Mage::dispatchEvent('medma_domain_authentication',
						array(
						'email' => $generalEmail,
            'domain_name'=>$domainName,
						)

		);
		#register domain event ends
  }

	/*showing list of those news which are active---------*/
	
	public function indexAction()
	{
		
		$this->loadLayout();  
		$breadcrumbs = $this->getLayout()->getBlock('breadcrumbs');
		$breadcrumbs->addCrumb('home',array('label'=>Mage::helper('cms')->__('Home'),                  					'title'=>Mage::helper('cms')->__('Home Page'),
           			'link'=>Mage::getBaseUrl())); 
		$breadcrumbs->addCrumb('News & Innovation', array('label'=>$this->__('News & Innovation'), 
                 		'title'=>'News & Innovation'
                 		));
 
		
 
		//echo $this->getLayout()->getBlock('breadcrumbs')->toHtml();   
		$this->renderLayout();
	}
}
