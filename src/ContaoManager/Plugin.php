<?php

/*
 * This file is part of Contao.
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace Postyou\HeadlineTinyMceBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\NewsBundle\ContaoNewsBundle;
use Postyou\HeadlineTinyMceBundle\HeadlineTinyMceBundle;

/**
 * Plugin for the Contao Manager.
 *
 * @author Andreas Schempp <https://github.com/aschempp>
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(HeadlineTinyMceBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class])
                ->setReplace(["headlinetinymce"])
        ];
    }
}
