<?php

\defined('_JEXEC') or die;

use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Event\DispatcherInterface;
use Joomla\Plugin\System\DisableContentGenerator\Extension\DisableContentGenerator;

return new class () implements ServiceProviderInterface {
    /**
     * @param Container $container
     *
     * @return void
     */
    public function register(Container $container) : void
    {
        $container->set(
            PluginInterface::class,
            function (Container $container) {
                $plugin = new DisableContentGenerator(
                    $container->get(DispatcherInterface::class),
                    (array) PluginHelper::getPlugin('system', 'disablecontentgenerator')
                );

                $plugin->setApplication(Factory::getApplication());

                return $plugin;
            }
        );
    }
};
