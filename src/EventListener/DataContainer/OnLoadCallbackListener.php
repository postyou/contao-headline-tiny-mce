<?php

declare(strict_types=1);

namespace Postyou\HeadlineTinyMceBundle\EventListener\DataContainer;

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
