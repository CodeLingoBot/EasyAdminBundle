<?php

namespace EasyCorp\Bundle\EasyAdminBundle\Configuration;

/**
 * Processes the custom CSS styles applied to the backend design based on the
 * value of the design configuration options.
 *
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class DesignConfigPass implements ConfigPassInterface
{
    /** @var string */
    private $locale;

    public function __construct($locale)
    {
        $this->locale = $locale;
    }

    public function process(array $backendConfig)
    {
        $backendConfig = $this->processRtlLanguages($backendConfig);

        return $backendConfig;
    }

    
}
