<?php

declare(strict_types=1);

/*
 * This file is part of postyou/headline-tiny-mce.
 *
 * (c) POSTYOU Digital- & Filmagentur
 *
 * @author  Gerald Meier
 * @link    https://www.postyou.de
 * @license LGPL-3.0-or-later
 */

$GLOBALS['TL_DCA']['tl_content']['fields']['headline']['eval']['allowHtml'] = true;
$GLOBALS['TL_DCA']['tl_content']['fields']['headline']['eval']['rte'] = 'tinyHeadlineMCE';
