<?php

namespace EasyCorp\Bundle\EasyAdminBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Defines the configuration options of the bundle and validates its values.
 *
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('easy_admin');
        $rootNode = $this->getRootNode($treeBuilder, 'easy_admin');

        $this->addGlobalOptionsSection($rootNode);
        $this->addUserSection($rootNode);
        $this->addDesignSection($rootNode);
        $this->addViewsSection($rootNode);
        $this->addEntitiesSection($rootNode);

        return $treeBuilder;
    }

    

    

    

    

    

    
}
