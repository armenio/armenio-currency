<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Armenio\Currency;

// use Zend\Mvc\ModuleRouteListener;
// use Zend\Mvc\MvcEvent;

class Module
{
    // public function onBootstrap(MvcEvent $e)
    // {
    //     $eventManager        = $e->getApplication()->getEventManager();
    //     $moduleRouteListener = new ModuleRouteListener();
    //     $moduleRouteListener->attach($eventManager);
    // }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getModuleDependencies()
    {
        return [];
    }

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ],
            ],
        ];
    }
}
