<?php
/**
 * Admin menu bootstrap 
 *
 * @author   Timo Reith <timo@ifeelweb.de>
 * @version  $Id: Bootstrap.php 989446 2014-09-14 11:31:11Z worschtebrot $
 */
require_once dirname(__FILE__) . '/controllers/PsnApplicationController.php';

class Psn_Admin_Menu_Bootstrap extends IfwPsn_Zend_Application_Bootstrap_Bootstrap
{
    protected function _initResources()
    {
    }
}
