<?php

namespace Saodat\FormBase;

class FormHelper
{
    /**
     * All available field types
     *
     * @var array
     */
    protected static $availableFieldTypes = [
        'text'           => 'InputType',
        'email'          => 'InputType',
        'url'            => 'InputType',
        'tel'            => 'InputType',
        'search'         => 'InputType',
        'password'       => 'InputType',
        'hidden'         => 'InputType',
        'number'         => 'InputType',
        'date'           => 'InputType',
        'file'           => 'InputType',
        'image'          => 'InputType',
        'color'          => 'InputType',
        'datetime-local' => 'InputType',
        'month'          => 'InputType',
        'range'          => 'InputType',
        'time'           => 'InputType',
        'week'           => 'InputType',
        'select'         => 'SelectType',
        'textarea'       => 'TextareaType',
        'button'         => 'ButtonType',
        'buttongroup'    => 'ButtonGroupType',
        'submit'         => 'ButtonType',
        'reset'          => 'ButtonType',
        'radio'          => 'CheckableType',
        'checkbox'       => 'CheckableType',
        'choice'         => 'ChoiceType',
        'form'           => 'ChildFormType',
        'entity'         => 'EntityType',
        'collection'     => 'CollectionType',
        'repeated'       => 'RepeatedType',
        'static'         => 'StaticType'
    ];

    protected static $reservedFieldNames = [
        'save'
    ];


    /**
     * Get proper class for field type.
     *
     * @param $type
     * @return string
     */
    public function getFieldType($type)
    {
        $types = array_keys(static::$availableFieldTypes);

        if (!$type || trim($type) == '') {
            throw new \InvalidArgumentException('Field type must be provided.');
        }

        if (!in_array($type, $types)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Unsupported field type [%s]. Available types are: %s',
                    $type,
                    join(', ', $types)
                )
            );
        }
        $namespace = __NAMESPACE__.'\\Fields\\';

        return $namespace . static::$availableFieldTypes[$type];
    }

    public function checkFieldName($name, $className)
    {
        if (!$name || trim($name) == '') {
            throw new \InvalidArgumentException(
                "Please provide valid field name for class [{$className}]"
            );
        }

        if (in_array($name, static::$reservedFieldNames)) {
            throw new \InvalidArgumentException(
                "Field name [{$name}] in form [{$className}] is a reserved word. Please use a different field name." .
                "\nList of all reserved words: " . join(', ', static::$reservedFieldNames)
            );
        }

        return true;
    }

}
