<?php

namespace EasyCorp\Bundle\EasyAdminBundle\Configuration;

/**
 * Processes default values for some backend configuration options.
 *
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class DefaultConfigPass implements ConfigPassInterface
{
    public function process(array $backendConfig)
    {
        $backendConfig = $this->processDefaultEntity($backendConfig);
        $backendConfig = $this->processDefaultMenuItem($backendConfig);
        $backendConfig = $this->processDefaultHomepage($backendConfig);

        return $backendConfig;
    }

    /**
     * Finds the default entity to display when the backend index is not
     * defined explicitly.
     *
     * @param array $backendConfig
     *
     * @return array
     */
    

    /**
     * Finds the default menu item to display when browsing the backend index.
     *
     * @param array $backendConfig
     *
     * @return array
     */
    

    /**
     * Finds the first menu item whose 'default' option is 'true' (if any).
     * It looks for the option both in the first level items and in the
     * submenu items.
     *
     * @param array $menuConfig
     *
     * @return mixed
     */
    

    /**
     * Processes the backend config to define the URL or the route/params to
     * use as the default backend homepage when none is defined explicitly.
     * (Note: we store the route/params instead of generating the URL because
     * the 'router' service cannot be used inside a compiler pass).
     *
     * @param array $backendConfig
     *
     * @return array
     */
    
}
