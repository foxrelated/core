<?php
/**
 * [Nulled by DarkGoth - NCP TEAM] - 2015
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox_Component
 * @version 		$Id: index.class.php 3008 2011-09-05 18:22:14Z Raymond_Benc $
 */
class Ad_Component_Controller_Invoice_Index extends Phpfox_Component
{
	/**
	 * Controller
	 */
	public function process()
	{
		Phpfox::isUser(true);
		if (($sId = $this->request()->get('item_number')) != '')
		{
		    define('PHPFOX_SKIP_POST_PROTECTION', true);
		    $this->url()->send('ad.invoice', null,'Payment Completed');
		}
		$aCond = array();
		$aCond[] = 'ai.user_id = ' . Phpfox::getUserId();
		
		list($iCnt, $aInvoices) = Ad_Service_Ad::instance()->getInvoices($aCond);
		
		Ad_Service_Ad::instance()->getSectionMenu();
		
		$this->template()->setTitle(Phpfox::getPhrase('ad.ad_invoices'))
			->setFullSite()
			->setBreadcrumb(Phpfox::getPhrase('ad.advertise'), $this->url()->makeUrl('ad'))
			->setBreadcrumb(Phpfox::getPhrase('ad.invoices'), $this->url()->makeUrl('ad.invoice'), true)
			->setHeader('cache', array(
					'table.css' => 'style_css'
				)
			)			
			->assign(array(
					'aInvoices' => $aInvoices
				)
			);	
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('ad.component_controller_invoice_index_clean')) ? eval($sPlugin) : false);
	}
}

?>