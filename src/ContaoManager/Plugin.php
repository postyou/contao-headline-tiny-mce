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

namespace Postyou\HeadlineTinyMceBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Postyou\HeadlineTinyMceBundle\PostyouHeadlineTinyMceBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(PostyouHeadlineTinyMceBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class])
                ->setReplace(['headlinetinymce']),
        ];
    }
}
