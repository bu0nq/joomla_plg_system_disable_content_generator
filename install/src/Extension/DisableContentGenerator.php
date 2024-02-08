<?php

namespace Joomla\Plugin\System\DisableContentGenerator\Extension;

\defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;

final class DisableContentGenerator extends CMSPlugin
{
    /**
     * @return void
     */
    public function onAfterDispatch() : void
    {
        if ($this->getApplication()->isClient('site')) {
            $this->getApplication()->getDocument()->setGenerator(null);
        }
    }
}
