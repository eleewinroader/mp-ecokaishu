<?php
/**
 * ifeelweb.de WordPress Plugin Framework
 * For more information see http://www.ifeelweb.de/wp-plugin-framework
 *
 * Options field text
 *
 * @author   Timo Reith <timo@ifeelweb.de>
 * @version  $Id: Text.php 989446 2014-09-14 11:31:11Z worschtebrot $
 */
require_once dirname(__FILE__) . '/../Field.php';

class IfwPsn_Wp_Options_Field_Text extends IfwPsn_Wp_Options_Field
{
    public function render(array $params)
    {
        /**
         * @var IfwPsn_Wp_Options
         */
        $options = $params[0];

        $id = $options->getOptionRealId($this->_id);
        $name = $options->getPageId() . '['. $id .']';

        $extra = '';
        if (isset($this->_params['placeholder'])) {
            $extra .= sprintf('placeholder="%s" ', htmlentities($this->_params['placeholder']));
        }

        $html = '<input type="text" autocomplete="off" id="'. $id .'" name="'. $name .'" value="'. $options->getOption($this->_id) .'" '. $extra .' />';
        if (!empty($this->_description)) {
            $html .= '<br><p class="description"> '  . $this->_description . '</p>';
        }
        echo $html;
    }
}
