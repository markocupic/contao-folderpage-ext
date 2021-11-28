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

namespace Markocupic\ContaoFolderpageExt\Listener\ContaoHooks;

use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\Template;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * @Hook(ParseTemplateListener::TYPE, priority=100)
 */
class ParseTemplateListener
{
    public const TYPE = 'parseTemplate';

    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var ScopeMatcher
     */
    private $scopeMatcher;

    public function __construct(RequestStack $requestStack, ScopeMatcher $scopeMatcher)
    {
        $this->requestStack = $requestStack;
        $this->scopeMatcher = $scopeMatcher;
    }

    public function __invoke(Template $objTemplate): void
    {
        if ($this->isFrontend()) {
            if (0 === strpos($objTemplate->getName(), 'nav_')) {
                $items = $objTemplate->items;

                foreach ($items as $k => $v) {
                    if ('folder' === $v['type']) {
                        $arrClass = explode(' ', (string) $v['class']);
                        $arrClass[] = 'folder';
                        $items[$k]['class'] = implode(' ', array_filter(array_unique($arrClass)));
                    }
                }
                $objTemplate->items = $items;
            }
        }
    }

    private function isFrontend()
    {
        return $this->scopeMatcher->isFrontendRequest($this->requestStack->getCurrentRequest());
    }
}
