<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Adapter;
class IndexController extends AbstractActionController
{
    public function indexAction()
    {

        // Define the database connection parameters
        $config = [
            'driver' => 'Pdo_Mysql',
            'host' => 'localhost',
            'port' => 3308,
            'database' => 'test_zmuesli',
            'username' => 'jaka.german',
            'password' => 'jaka123german',
            'charset' => 'utf8',
        ];
        $dbAdapter = new Adapter($config);
        $statement = $dbAdapter->query("select * from ka_menu_item where parent_id is null", Adapter::QUERY_MODE_EXECUTE);
        $result = $statement->toArray();
        $topMenu = $result;
        #print_r($row);
        return [
            'topMenu' => $topMenu,
            #'botMenu' => $botMenu
        ];
    }
}
