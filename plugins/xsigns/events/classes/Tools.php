<?php namespace Xsigns\events\Classes;
/**
 * Created by PhpStorm.
 * User: jorgmobes
 * Date: 24.05.18
 * Time: 09:15
 */
class Tools
{
    static public function standardize($strString,$blnPreserveUppercase = false)
    {
        $arrSearch = array('/[^a-zA-Z0-9 \.\&\/_-]+/', '/[ \.\&\/-]+/');
        $arrReplace = array('', '-');
        $strString = html_entity_decode($strString, ENT_QUOTES);
        $strString = Tools::strip_insert_tags($strString);
        $strString = preg_replace($arrSearch, $arrReplace, $strString);

        if (is_numeric(substr($strString, 0, 1))) {
            $strString = 'id-' . $strString;
        }

        if (!$blnPreserveUppercase) {
            $strString = strtolower($strString);
        }
        return trim($strString, '-');
    }

    static public function strip_insert_tags($strString)
    {
        $count = 0;

        do
        {
            $strString = preg_replace('/{{[^{}]*}}/', '', $strString, -1, $count);
        }
        while ($count > 0);

        return $strString;
    }
}