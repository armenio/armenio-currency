<?php
/**
 * Rafael Armenio <rafael.armenio@gmail.com>
 *
 * @link http://github.com/armenio for the source repository
 */
 
namespace Armenio\Currency;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 *
 *
 * CurrencyServiceFactory
 * @author Rafael Armenio <rafael.armenio@gmail.com>
 *
 *
 */
class CurrencyServiceFactory implements FactoryInterface
{
    /**
     * zend-servicemanager v2 factory for creating Currency instance.
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @returns Currency
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $currency = new Currency();
        return $currency;
    }
}
