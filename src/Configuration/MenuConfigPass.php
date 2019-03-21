<?php

namespace EasyCorp\Bundle\EasyAdminBundle\Configuration;

/**
 * Processes the main menu configuration defined in the "design.menu"
 * option or creates the default config for the menu if none is defined.
 *
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class MenuConfigPass implements ConfigPassInterface
{
    public function process(array $backendConfig)
    {
        // process 1st level menu items
        $menuConfig = $backendConfig['design']['menu'];
        $menuConfig = $this->normalizeMenuConfig($menuConfig, $backendConfig);
        $menuConfig = $this->processMenuConfig($menuConfig, $backendConfig);

        $backendConfig['design']['menu'] = $menuConfig;

        // process 2nd level menu items (i.e. submenus)
        foreach ($backendConfig['design']['menu'] as $i => $itemConfig) {
            if (empty($itemConfig['children'])) {
                continue;
            }

            $submenuConfig = $itemConfig['children'];
            $submenuConfig = $this->normalizeMenuConfig($submenuConfig, $backendConfig, $i);
            $submenuConfig = $this->processMenuConfig($submenuConfig, $backendConfig, $i);

            $backendConfig['design']['menu'][$i]['children'] = $submenuConfig;
        }

        return $backendConfig;
    }

    /**
     * Normalizes the different shortcut notations of the menu config to simplify
     * further processing.
     *
     * @param array $menuConfig
     * @param array $backendConfig
     * @param int   $parentItemIndex The index of the parent item for this menu item (allows to treat submenus differently)
     *
     * @return array
     */
    

    
}
