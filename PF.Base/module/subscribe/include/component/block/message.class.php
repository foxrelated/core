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
 * @package  		Module_Subscribe
 * @version 		$Id: message.class.php 225 2009-02-13 13:24:59Z Raymond_Benc $
 */
class Subscribe_Component_Block_Message extends Phpfox_Component
{
	/**
	 * Controller
	 */
	public function process()
	{		
		
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('subscribe.component_block_message_clean')) ? eval($sPlugin) : false);
	}
}

?>