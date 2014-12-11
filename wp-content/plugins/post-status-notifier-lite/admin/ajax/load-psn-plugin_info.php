<?php
/**
 * Register Ajax request for metabox 
 *
 * @author   Timo Reith <timo@ifeelweb.de>
 * @version  $Id: load-psn-plugin_info.php 989446 2014-09-14 11:31:11Z worschtebrot $
 */
$metabox = new IfwPsn_Wp_Plugin_Metabox_PluginInfo($pm);
return $metabox->getAjaxRequest();
