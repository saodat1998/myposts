<?php

namespace Saodat\FormBase\Services;


use Illuminate\Container\Container;
/**
 * Class FormBase
 * @package Saodat\FormBase\Services
 */
class FormBase
{
    /**
     * @var array
     */
    public $fields = [];

    protected $fieldType;

    protected $service;

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @var array
     */
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
     * FormBase constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container      = $container;
    }

    /**
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function addField()
    {
        $parameters = func_get_args();

        $this->fieldType = $this->getFieldType($parameters[0]);

        /**
         * remove argument 'type' if it is not a TextField
         */
        if (!strpos($this->fieldType, 'TextField')) {
            array_shift($parameters);
        }

        $propName = lcfirst($this->fieldType);
        if (empty($this->$propName)) {
            $this->service = $this->container->make($this->fieldType);
            $this->$propName = $this->service;
        } else {
            $this->service = $this->$propName;
        }

        $this->service->addParams($parameters);

        return $this;
    }

    /**
     * @param array $attributes
     * @return $this|mixed
     */
    public function setAttributes($attributes = [])
    {
        $this->service->setAttributes($attributes);
        return $this;
    }

    /**
     * @return $this
     */
    public function get()
    {
        $this->fields[] = $this->service->getFieldSchema();
        return $this;
    }

    /**
     * @return array
     */
    public function all()
    {
        return ['fields' => $this->fields];
    }

    /**
     * @return mixed
     */
    public function getOne()
    {
        return $this->service->getFieldSchema();
    }

    /**
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

        $namespace = __NAMESPACE__ . '\\Fields\\';

        return $namespace . static::$availableFieldTypes[$type];
    }
}
