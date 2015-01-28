<?php

namespace postyou;

checkConfFile();

if (TL_MODE == 'BE')
    $GLOBALS['TL_CSS'][] = 'system/modules/headline-tiny-mce/assets/css/h_tinyMce.css|screen';

foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $key => $palette) { //alle Bereiche (Paletten) durchgehen
    if (!is_array($palette) && is_string($palette)) {
        if (strpos($palette, ",headline")) { //wenn irgendwo ein headlinefeld vorkommt -> mce rein
            $GLOBALS['TL_DCA']['tl_content']['palettes'][$key] = str_replace('headline', 'headline,headlineOptn', $GLOBALS['TL_DCA']['tl_content']['palettes'][$key]);
        }
//        if (strpos($palette, ",mooHeadline")) { //wenn irgendwo ein headlinefeld vorkommt -> mce rein
//            $GLOBALS['TL_DCA']['tl_content']['palettes'][$key] = str_replace('mooHeadline', 'headline,headlineOptn', $GLOBALS['TL_DCA']['tl_content']['palettes'][$key]);
//        }

    }
}

$GLOBALS['TL_DCA']['tl_content']['fields']['headline'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['headline'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'textarea',
    'eval' => array('rte' => 'h_tinyMCE', 'maxlength' => 200, 'helpwizard' => true, 'tl_class' => 'h_mce clr w50'),
    'explanation' => 'insertTags',
    'allowHtml' => true,
    'load_callback' => array
    (
        array('postyou\tl_content', 'loadHeadline')
    ),
    'save_callback' => array
    (
        array('postyou\tl_content', 'saveHeadline')
    ),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['headlineOptn'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['headlineOptn'],
    'default' => 'h5',
    'exclude' => true,
    'search' => false,
    'inputType' => 'select',
    'options' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6'),
    'eval' => array('tl_class' => 'w50 h_mce_optn', 'doNotSaveEmpty' => true),
    'save_callback' => array
    (
        array('postyou\tl_content', 'saveHeadlineOptn')
    ),
    'load_callback' => array
    (
        array('postyou\tl_content', 'loadHeadlineOptn')
    ), 'sql' => "char(2) NOT NULL default ''"
);


class tl_content extends \Backend
{

    private $headlineTypeForLoad = "h1";


    function loadHeadline($varValue, \DC_Table $dc)
    {

        if (isset($varValue)){
            if ( @unserialize($varValue) !== false) {
            $arrData = deserialize($varValue);
            $this->headlineTypeForLoad = $arrData["unit"];
            return $arrData["value"];}
            else
                return $varValue;
        } else
            return "";

    }

    function saveHeadline($varValue, \DC_Table $dc)
    {
        $temparray = array();
        $temparray["unit"] = $_POST['headlineOptn'];
        $temparray["value"] = $varValue;
        return serialize($temparray);
    }

    function loadHeadlineOptn($varValue, \DC_Table $dc)
    {
        return $this->headlineTypeForLoad;
    }

    function saveHeadlineOptn()
    {
        //you need this to avoid a database error
    }

}

function checkConfFile()
{
    if (!file_exists("/system/config/h_tinyMCE.php")) {
        if (!file_exists("/system/config/h_tinyMCE.php")) {
            $fileOld = new \File("/system/modules/headline-tiny-mce/config/h_tinyMCE.php");
            $fileOld->copyTo("/system/config/h_tinyMCE.php");
            $fileOld->close();
        } else {
            throw new \Exception("/system/modules/headline-tiny-mce/config/h_tinyMCE.php existiert nicht mehr!");
        }
    }
}
