<?php

declare(strict_types=1);

/*
 * This file is part of Contao Folderpage Ext..
 * 
 * (c) Marko Cupic 2021 <m.cupic@gmx.ch>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/markocupic/contao-folderpage-ext
 */

namespace Markocupic\ContaoFolderpageExt\ContaoManager;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Markocupic\ContaoFolderpageExt\MarkocupicContaoFolderpageExt;
use Terminal42\FolderpageBundle\Terminal42FolderpageBundle;

/**
 * Class Plugin
 */
class Plugin implements BundlePluginInterface
{
    /**
     * @return array
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(MarkocupicContaoFolderpageExt::class)
                ->setLoadAfter(
                    [
                        ContaoCoreBundle::class,
                        Terminal42FolderpageBundle::class,
                    ]
                ),
        ];
    }
}
