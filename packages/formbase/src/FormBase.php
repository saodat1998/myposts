<?php

namespace Saodat\FormBase;

class FormBase implements FormBaseContract
{
    public $fields = [];
    protected $attributes = [];

    protected static $availableFieldTypes = [
        'text' => 'TextField',
        'email' => 'TextField',
        'url' => 'TextField',
        'tel' => 'TextField',
        'search' => 'TextField',
        'password' => 'TextField',
        'hidden' => 'TextField',
        'number' => 'TextField',
        'color' => 'TextField',
        'range' => 'TextField',
        'time' => 'TextField',
        'week' => 'TextField',
        'textarea' => 'TextareaField',
        'select' => 'SelectField',
        'treeselect' => 'TreeselectField',
        'checkbox' => 'CheckboxField',
        'choice' => 'CheckboxField',
        'radio' => 'RadioField',
        'file' => 'FileField',
        'image' => 'FileField',
        'datetime-local' => 'DateField',
        'month' => 'DateField',
        'date' => 'DateField',
    ];


    /**
     * @return $this|mixed
     * @throws \ReflectionException
     */
    public function addField()
    {
        $parameters = func_get_args();

        $fieldType = $this->getFieldType($parameters[0]);

        /**
         * remove argument 'type' if it is not a TextField
         */
        if(!strpos($fieldType, 'TextField')){
            array_shift($parameters);
        }

        $reflection = new \ReflectionClass($fieldType);
        $this->field = $reflection->newInstanceArgs($parameters);

        $this->fields[] = $this->field->getFieldSchema();
        return $this;
    }

    /**
     * @param array $array
     * @return $this|mixed
     */
    public function setAttributes($array = [])
    {
        $this->field['attributes'] = $array;
        return $this;
    }

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

        $namespace = __NAMESPACE__ . '\\Fields\\';

        return $namespace . static::$availableFieldTypes[$type];
    }
}
