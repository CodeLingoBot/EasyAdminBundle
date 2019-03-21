<?php

namespace EasyCorp\Bundle\EasyAdminBundle\Configuration;

/**
 * Merges all the actions that can be configured in the backend and normalizes
 * them to get the final action configuration for each entity view.
 *
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class ActionConfigPass implements ConfigPassInterface
{
    private $views = ['edit', 'list', 'new', 'show'];
    private $defaultActionConfig = [
        // either the name of a controller method or an application route (it depends on the 'type' option)
        'name' => null,
        // 'method' if the action is a controller method; 'route' if it's an application route
        'type' => 'method',
        // action label (displayed as link or button) (if 'null', autogenerate it)
        'label' => null,
        // the HTML title attribute of the action link (useful when action only displays its icon)
        'title' => null,
        // the CSS class applied to the button/link displayed by the action
        'css_class' => null,
        // the name of the FontAwesome icon to display next to the 'label' (doesn't include the 'fa-' prefix)
        'icon' => null,
        // the value of the HTML 'target' attribute add to the links of the actions (e.g. '_blank')
        'target' => '_self',
    ];

    public function process(array $backendConfig)
    {
        $backendConfig = $this->processDisabledActions($backendConfig);
        $backendConfig = $this->normalizeActionsConfig($backendConfig);
        $backendConfig = $this->normalizeBatchActionsConfig($backendConfig);
        $backendConfig = $this->resolveActionInheritance($backendConfig);
        $backendConfig = $this->resolveBatchActionInheritance($backendConfig);
        $backendConfig = $this->processActionsConfig($backendConfig);
        $backendConfig = $this->processBatchActionsConfig($backendConfig);

        return $backendConfig;
    }

    

    /**
     * Transforms the different action configuration formats into a normalized
     * and expanded format. These are the two simple formats allowed:.
     *
     * # Config format #1: no custom option
     * easy_admin:
     *     entities:
     *         User:
     *             list:
     *                 actions: ['search', 'show', 'grantAccess']
     *
     * # Config format #2: one or more actions define any of their options
     * easy_admin:
     *     entities:
     *         User:
     *             list:
     *                 actions: ['search', { name: 'show', label: 'Show', 'icon': 'user' }, 'grantAccess']
     *
     * @param array $backendConfig
     *
     * @return array
     */
    

    /**
     * Transforms the different batch action configuration formats into a normalized
     * and expanded format. These are the two simple formats allowed:.
     *
     * # Config format #1: no custom option
     * easy_admin:
     *     entities:
     *         User:
     *             list:
     *                 batch_actions: ['delete', 'reset']
     *
     * # Config format #2: one or more actions define any of their options
     * easy_admin:
     *     entities:
     *         User:
     *             list:
     *                 batch_actions: ['delete', { name: 'reset', label: 'Reset Account' }]
     *
     * @param array $backendConfig
     *
     * @return array
     */
    

    

    /**
     * If the user overrides the configuration of a default action, they usually
     * define just the options they want to change. For example:
     *   actions: ['delete', 'list'] just to redefine the order
     *   actions: [ { name: 'list', label: 'Listing' }] just to redefine the label.
     *
     * For that reason, this method merges the full configuration of the default
     * actions with the new action configuration. This means that you get the
     * default value for any option that you don't explicitly set (e.g. the icon
     * or the CSS class).
     *
     * @param array  $actionsConfig
     * @param string $view
     *
     * @return array
     */
    

    /**
     * Actions can be added/removed globally in the edit/list/new/show views of
     * the backend and locally in each of the configured entities. Local config always
     * wins over the global config (e.g. if backend removes 'delete' action in the
     * 'list' view but some action explicitly adds 'delete' in its 'list' view,
     * then that entity shows the 'delete' action and the others don't).
     */
    

    /**
     * Batch actions can be added/removed globally in the list view of
     * the backend and locally in each of the configured entities. Local config always
     * wins over the global config (e.g. if backend removes 'delete' action in the
     * 'list' view but some action explicitly adds 'delete' in its 'list' view,
     * then that entity shows the 'delete' action and the others don't).
     */
    

    

    

    /**
     * Returns the default configuration for all the built-in actions of the
     * given view, including the actions which are not enabled by default for
     * that view (e.g. the 'show' action for the 'list' view).
     *
     * @param string $view
     *
     * @return array
     */
    

    /**
     * Returns the built-in actions defined by EasyAdmin for the given view.
     * This allows to provide some nice defaults for backends that don't
     * define their own actions.
     *
     * @param string $view
     *
     * @return array
     */
    

    /**
     * Checks whether the given string is valid as a PHP method name.
     *
     * @param string $name
     *
     * @return bool
     */
    

    /**
     * copied from Symfony\Component\Form\FormRenderer::humanize()
     * (author: Bernhard Schussek <bschussek@gmail.com>).
     *
     * @param string $content
     *
     * @return string
     */
    

    
}
