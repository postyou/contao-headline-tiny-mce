<?php

declare(strict_types=1);

/*
 * This file is part of postyou/headline-tiny-mce.
 *
 * (c) POSTYOU Digital- & Filmagentur
 *
 * @license LGPL-3.0+
 */

namespace Postyou\HeadlineTinyMceBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;

#[AsCallback('tl_content', 'config.onload')]
#[AsCallback('tl_module', 'config.onload')]
class OnLoadCallbackListener
{
    public function __invoke(): void
    {
        $GLOBALS['TL_CSS'][] = 'bundles/postyouheadlinetinymce/h_tinyMce.css|static';
    }
}
