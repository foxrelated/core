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
 * @version 		$Id: notify.class.php 2632 2011-05-26 19:28:02Z Raymond_Benc $
 */
class Notification_Component_Block_Notify extends Phpfox_Component
{
	/**
	 * Controller
	 */
	public function process()
	{
		$this->template()->assign(array(
				'iTotalUnseenNotifications' => 0 // Phpfox::getService('notification')->getUnseenTotal()
			)
		);			
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('notification.component_block_notify_clean')) ? eval($sPlugin) : false);
	}
}

?>