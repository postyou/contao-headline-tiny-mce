<?php

declare(strict_types=1);

/*
 * This file is part of postyou/headline-tiny-mce.
 *
 * (c) POSTYOU Digital- & Filmagentur
 *
 * @author  Gerald Meier
 * @link    https://www.postyou.de
 * @license LGPL-3.0+
 */

namespace Postyou\HeadlineTinyMceBundle\EventListener;

use Contao\CoreBundle\ServiceAnnotation\Callback;

/**
 * @Callback(target="config.onload", table="tl_content")
 * @Callback(target="config.onload", table="tl_module")
 */
class OnLoadCallbackListener
{
    public function __invoke(): void
    {
        $GLOBALS['TL_CSS'][] = 'bundles/postyouheadlinetinymce/h_tinyMce.css|static';
    }
}
