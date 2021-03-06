<?php
/**
 * [Nulled by DarkGoth - NCP TEAM] - 2015
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox_Component
 * @version 		$Id: index.class.php 1014 2009-09-20 10:22:25Z Raymond_Benc $
 */
class Attachment_Component_Controller_Admincp_Index extends Phpfox_Component
{
	/**
	 * Controller
	 */
	public function process()
	{
		if (($sDeleteId = $this->request()->get('delete')))
		{
			if (Phpfox::getService('attachment.process')->deleteType($sDeleteId))
			{
				$this->url()->send('admincp.attachment', null, Phpfox::getPhrase('announcement.attachment_successfully_deleted'));
			}
		}
		
		$this->template()->settitle(Phpfox::getPhrase('attachment.attachments_title'))
			->setBreadcrumb(Phpfox::getPhrase('attachment.attachments_title'), $this->url()->makeUrl('admincp.attachment'))
			->setSectionTitle('Attachment File Types')
			->setActionMenu([
				'New Type' => [
					'url' => $this->url()->makeUrl('admincp.attachment.add'),
					'class' => 'popup'
				]
			])
			->assign(array(
					'aRows' => Phpfox::getService('attachment.type')->get()
				)
			);	
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('attachment.component_controller_admincp_index_clean')) ? eval($sPlugin) : false);
	}
}

?>