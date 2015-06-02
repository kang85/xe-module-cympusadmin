<?php
/**
 * vi:set sw=4 ts=4 noexpandtab fileencoding=utf-8:
 * @class  nstoreModel
 * @author NURIGO(contact@nurigo.net)
 * @brief  nstoreModel
 */
class cympusadminModel extends cympusadmin
{

    function triggerGetManagerMenu(&$manager_menu)
    {
		$oModuleModel = &getModel('module');

		$logged_info = Context::get('logged_info');

		$output = executeQueryArray('cympusadmin.getModInstList');
		if(!$output->toBool()) return $output;

		$list = $output->data;

		$menu = new stdClass();
		$menu->title = '사이트관리';
		$menu->icon = 'dashboard';
		$menu->submenu = array();

        foreach($list as $key => $val)
        {
            $grant = $oModuleModel->getGrant($val, $logged_info);
            if($grant->manager)
            {
				$submenu = new stdClass();
				$submenu->action = array('dispCympusadminAdminIndex');
				$submenu->mid = $val->mid;
				$submenu->title = '전체현황';
				$menu->submenu[] = $submenu;
            }
        }

		if(count($menu->submenu)) $manager_menu['cympusadmin'] = $menu;
	}
}

