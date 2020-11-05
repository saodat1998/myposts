<?php


namespace Saodat\FormBase\Services\Fields;


class SelectField extends AbstractField
{
    /**
     * @var string
     */
    protected $component = 'select';

    /**
     * @var array
     */
    protected $options;

    /**
     * CheckboxField constructor.
     * @param string $name
     * @param string $label
     * @param array $options
     * @param null $value
     * @param string $validationRule
     */
    public function __construct(string $name, string $label, array $options, $value = null, $validationRule = '')
    {
        $this->options = $options;
        parent::__construct($name, $label, $value, $validationRule);
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }


    public function getFieldSchema(): array
    {
        $fieldSchema = $this->getCommonFields();
        $fieldSchema['options'] = $this->options;

        return $fieldSchema;
    }
}
