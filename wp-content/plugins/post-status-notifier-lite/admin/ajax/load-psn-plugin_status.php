<?php
/**
 * Register Ajax request for metabox 
 *
 * @author   Timo Reith <timo@ifeelweb.de>
 * @version  $Id: load-psn-plugin_status.php 989446 2014-09-14 11:31:11Z worschtebrot $
 */
$metabox = new IfwPsn_Wp_Plugin_Metabox_PluginStatus($pm);
return $metabox->getAjaxRequest();
