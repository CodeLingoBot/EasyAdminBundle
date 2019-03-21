<?php

namespace EasyCorp\Bundle\EasyAdminBundle\Configuration;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Normalizes the different configuration formats available for entities, views,
 * actions and properties.
 *
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class NormalizerConfigPass implements ConfigPassInterface
{
    private $defaultViewConfig = [
        'list' => [
            'dql_filter' => null,
            'fields' => [],
        ],
        'search' => [
            'dql_filter' => null,
            'fields' => [],
        ],
        'show' => [
            'fields' => [],
        ],
        'form' => [
            'fields' => [],
            'form_options' => [],
        ],
        'edit' => [
            'fields' => [],
            'form_options' => [],
        ],
        'new' => [
            'fields' => [],
            'form_options' => [],
        ],
    ];

    /** @var ContainerInterface */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function process(array $backendConfig)
    {
        $backendConfig = $this->normalizeEntityConfig($backendConfig);
        $backendConfig = $this->normalizeViewConfig($backendConfig);
        $backendConfig = $this->normalizePropertyConfig($backendConfig);
        $backendConfig = $this->normalizeFormDesignConfig($backendConfig);
        $backendConfig = $this->normalizeActionConfig($backendConfig);
        $backendConfig = $this->normalizeBatchActionConfig($backendConfig);
        $backendConfig = $this->normalizeFormConfig($backendConfig);
        $backendConfig = $this->normalizeControllerConfig($backendConfig);
        $backendConfig = $this->normalizeTranslationConfig($backendConfig);

        return $backendConfig;
    }

    /**
     * By default the entity name is used as its label (showed in buttons, the
     * main menu, etc.) unless the entity config defines the 'label' option:.
     *
     * easy_admin:
     *     entities:
     *         User:
     *             class: AppBundle\Entity\User
     *             label: 'Clients'
     *
     * @param array $backendConfig
     *
     * @return array
     */
    

    /**
     * Process the configuration of the 'form' view (if any) to complete the
     * configuration of the 'edit' and 'new' views.
     *
     * @param array $backendConfig [description]
     *
     * @return array
     */
    

    /**
     * Normalizes the view configuration when some of them doesn't define any
     * configuration.
     *
     * @param array $backendConfig
     *
     * @return array
     */
    

    /**
     * Fields can be defined using two different formats:.
     *
     * # Config format #1: simple configuration
     * easy_admin:
     *     Client:
     *         # ...
     *         list:
     *             fields: ['id', 'name', 'email']
     *
     * # Config format #2: extended configuration
     * easy_admin:
     *     Client:
     *         # ...
     *         list:
     *             fields: ['id', 'name', { property: 'email', label: 'Contact' }]
     *
     * This method processes both formats to produce a common form field configuration
     * format used in the rest of the application.
     *
     * @param array $backendConfig
     *
     * @return array
     *
     * @throws \RuntimeException
     */
    

    /**
     * Normalizes the configuration of the special elements that forms may include
     * to create advanced designs (such as dividers and fieldsets).
     *
     * @param array $backendConfig
     *
     * @return array
     */
    

    

    

    /**
     * It processes the optional 'controller' config option to check if the
     * given controller exists (it doesn't matter if it's a normal controller
     * or if it's defined as a service).
     *
     * @param array $backendConfig
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     */
    

    

    /**
     * Merges the form configuration recursively from the 'form' view to the
     * 'edit' and 'new' views. It processes the configuration of the form fields
     * in a special way to keep all their configuration and allow overriding and
     * removing of fields.
     *
     * @param array $parentConfig The config of the 'form' view
     * @param array $childConfig  The config of the 'edit' and 'new' views
     *
     * @return array
     */
    

    /**
     * The 'edit' and 'new' views can remove fields defined in the 'form' view
     * by defining fields with a '-' dash at the beginning of its name (e.g.
     * { property: '-name' } to remove the 'name' property).
     *
     * @param array $fieldsConfig
     *
     * @return array
     */
    

    
}
