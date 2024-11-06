<?php

declare(strict_types=1);

/*
 * This file is part of postyou/headline-tiny-mce.
 *
 * (c) POSTYOU Werbeagentur
 *
 * @license LGPL-3.0+
 */

$GLOBALS['TL_DCA']['tl_module']['fields']['headline']['eval']['allowHtml'] = true;
$GLOBALS['TL_DCA']['tl_module']['fields']['headline']['eval']['rte'] = 'tinyHeadlineMCE';
