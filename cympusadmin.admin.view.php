<?php
/**
 * cympusadminAdminView class
 * Admin view class of cympusadmin module
 *
 * @author NURIGO (contact@nurigo.net)
 * @package /modules/cympusadmin
 * @version 0.1
 */
class cympusadminAdminView extends cympusadmin 
{
	function dispCympusadminIndex() 
	{
		$this->setTemplatePath($this->module_path.'tpl');
		$this->setTemplateFile(_CYMPUSADMIN_INDEX_);

		$status = getCympusStatus();
		Context::set('status', $status);

	}
}
