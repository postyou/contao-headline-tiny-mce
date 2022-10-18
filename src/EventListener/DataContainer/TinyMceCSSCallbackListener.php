<?php

declare(strict_types=1);

/*
 * This file is part of postyou/headline-tiny-mce.
 *
 * (c) POSTYOU Digital- & Filmagentur
 *
 * @license LGPL-3.0+
 */

namespace Postyou\HeadlineTinyMceBundle\EventListener\DataContainer;

use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\DataContainer;

#[AsCallback(table: 'tl_content', target: 'config.onload')]
#[AsCallback(table: 'tl_module', target: 'config.onload')]
class TinyMceCSSCallbackListener
{
    public function __invoke(DataContainer $dataContainer): void
    {
        $GLOBALS['TL_CSS'][] = 'bundles/postyouheadlinetinymce/h_tinyMce.css|static';
    }
}
