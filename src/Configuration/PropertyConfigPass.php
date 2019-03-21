<?php

namespace EasyCorp\Bundle\EasyAdminBundle\Configuration;

use EasyCorp\Bundle\EasyAdminBundle\Form\Util\FormTypeHelper;
use Symfony\Component\Form\FormRegistryInterface;
use Symfony\Component\Form\Guess\TypeGuess;
use Symfony\Component\Form\Guess\ValueGuess;

/**
 * Processes the entity fields to complete their configuration and to treat
 * some fields in a special way.
 *
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class PropertyConfigPass implements ConfigPassInterface
{
    private $defaultEntityFieldConfig = [
        // CSS class or classes applied to form field or list/show property
        'css_class' => '',
        // date/time/datetime/number format applied to form field value
        'format' => null,
        // form field help message
        'help' => null,
        // form field label (if 'null', autogenerate it; if 'false', hide it)
        'label' => null,
        // its value matches the value of 'dataType' for list/show and the value of 'fieldType' for new/edit
        'type' => null,
        // Symfony form field type (text, date, number, choice, ...) used to display the field
        'fieldType' => null,
        // Data type (text, date, integer, boolean, ...) of the Doctrine property associated with the field
        'dataType' => null,
        // is a virtual field or a real Doctrine entity property?
        'virtual' => false,
        // listings can be sorted according to the values of this field
        'sortable' => true,
        // the path of the template used to render the field in 'show' and 'list' views
        'template' => null,
        // the options passed to the Symfony Form type used to render the form field
        'type_options' => [],
        // the name of the group where this form field is displayed (used only for complex form layouts)
        'form_group' => null,
    ];

    private $defaultVirtualFieldMetadata = [
        'columnName' => 'virtual',
        'fieldName' => 'virtual',
        'id' => false,
        'length' => null,
        'nullable' => false,
        'precision' => 0,
        'scale' => 0,
        'sortable' => false,
        'type' => 'text',
        'type_options' => [
            'required' => false,
        ],
        'unique' => false,
        'virtual' => true,
    ];

    private $formRegistry;

    public function __construct(FormRegistryInterface $formRegistry)
    {
        $this->formRegistry = $formRegistry;
    }

    public function process(array $backendConfig)
    {
        $backendConfig = $this->processMetadataConfig($backendConfig);
        $backendConfig = $this->processFieldConfig($backendConfig);

        return $backendConfig;
    }

    /**
     * $entityConfig['properties'] stores the raw metadata provided by Doctrine.
     * This method adds some other options needed for EasyAdmin backends. This is
     * required because $entityConfig['properties'] will be used as the fields of
     * the views that don't define their fields.
     *
     * @param array $backendConfig
     *
     * @return array
     */
    

    /**
     * Completes the configuration of each field/property with the metadata
     * provided by Doctrine for each entity property.
     *
     * @param array $backendConfig
     *
     * @return array
     */
    

    /**
     * Resolves from type options of field
     *
     * @param array $mergedConfig
     * @param array $guessedConfig
     * @param array $userDefinedConfig
     *
     * @return array
     */
    

    /**
     * Guesses what Form Type a property of a class has.
     *
     * @param string $class
     * @param string $property
     *
     * @return TypeGuess|null
     */
    

    /**
     * Guesses if a property of a class should be a required field in a Form.
     *
     * @param string $class
     * @param string $property
     *
     * @return ValueGuess|null
     */
    

    /**
     * Returns the date/time/datetime/number format for the given field
     * according to its type and the default formats defined for the backend.
     *
     * @param string $fieldType
     * @param array  $backendConfig
     *
     * @return string The format that should be applied to the field value
     */
    
}
