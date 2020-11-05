<?php


namespace Saodat\FormBase\Services\Fields;

/**
 * Class RadioField
 * @package Saodat\FormBase\Services\Fields
 */
class RadioField extends AbstractField
{
    /**
     * @var string
     */
    protected $component = 'radio';

    /**
     * @var array
     */
    protected $options;

    /**
     * CheckboxField constructor.
     * @param string $name
     * @param string $label
     * @param null $value
     * @param array $options
     */
    public function __construct(string $name, string $label,  $options = [], $value = null)
    {
        $this->options = $options;
        parent::__construct($name, $label, $value);
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return array
     */
    public function getFieldSchema(): array
    {
        $fieldSchema = $this->getCommonFields();
        $fieldSchema['options'] = $this->options;

        return $fieldSchema;
    }
}
