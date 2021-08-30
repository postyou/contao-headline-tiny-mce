<?php

declare(strict_types=1);

/**
 * Headline HTML
 * Extension for Contao Open Source CMS (contao.org)
 *
 * Copyright (c) 2016 POSTYOU
 *
 * @package headline-tiny-mce
 * @author  Gerald Meier
 * @link    https://www.postyou.de
 * @license https://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

$GLOBALS['TL_DCA']['tl_module']['fields']['headline']['eval']['allowHtml'] = true;
$GLOBALS['TL_DCA']['tl_module']['fields']['headline']['eval']['rte'] = 'tinyHeadlineMCE';
