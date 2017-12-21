<?php
/**
 * Headline HTML
 * Extension for Contao Open Source CMS (contao.org)
 *
 * Copyright (c) 2016 POSTYOU
 *
 * @package headline-tiny-mce
 * @author  Gerald Meier
 * @link    http://www.postyou.de
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


//if (TL_MODE == 'BE')
    //$GLOBALS['TL_CSS'][] = 'system/modules/headline-tiny-mce/assets/css/h_tinyMce.css|screen';

/**
 * Style sheet
 */
$scopeMatcher=\System::getContainer()->get('contao.routing.scope_matcher');
$requestStack=\System::getContainer()->get('request_stack');
if ($scopeMatcher->isBackendRequest($requestStack->getCurrentRequest()))
{
    $GLOBALS['TL_CSS'][] = 'bundles/headlinetinymce/h_tinyMce.css|static';
}
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
    'eval' => array('rte' => 'tinyHeadlineMCE','allowHtml' => true, 'maxlength' => 200, 'helpwizard' => true, 'tl_class' => 'h_mce clr w50'),
    'explanation' => 'insertTags',
    'load_callback' => array
    (
        array('htm_tl_content', 'loadHeadline')
    ),
    'save_callback' => array
    (
        array('htm_tl_content', 'saveHeadline')
    ),
    'sql' => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['headlineOptn'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['headlineOptn'],
    'inputType' => 'select',
    'options' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6'),
    'eval' => array('tl_class' => 'w50 h_mce_optn', 'doNotSaveEmpty' => true),
    'save_callback' => array
    (
        array('htm_tl_content', 'saveHeadlineOptn')
    ),
    'load_callback' => array
    (
        array('htm_tl_content', 'loadHeadlineOptn')
    )
);
class htm_tl_content extends \Backend
{
    private $headlineTypeForLoad = "h5";
    function loadHeadline($varValue, \DC_Table $dc)
    {
        if (isset($varValue)){
            if ( @unserialize($varValue) !== false) {
                $arrData = deserialize($varValue);
                $this->headlineTypeForLoad = isset($arrData["unit"])?$arrData["unit"]:$this->headlineTypeForLoad;
                return $arrData["value"];}
            else
                return $varValue;
        } else
            return "";
    }
    function saveHeadline($varValue, \DC_Table $dc)
    {
        $temparray = array();
        $temparray["unit"] = ((isset($_POST['headlineOptn']))?\Input::post('headlineOptn'):$this->headlineTypeForLoad);
        $temparray["value"] = $varValue;
        return serialize($temparray);
    }
    function loadHeadlineOptn($varValue, \DC_Table $dc)
    {

        return $this->headlineTypeForLoad;
    }
    function saveHeadlineOptn()
    {
        return "";
        //you need this to avoid a database error
    }
}