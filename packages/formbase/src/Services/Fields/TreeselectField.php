<?php


namespace Saodat\FormBase\Services\Fields;


class TreeselectField extends AbstractField
{
    /**
     * @var string
     */
    protected $component = 'treeselect';

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
    public function __construct(string $name, string $label, array $options, $value = null)
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
