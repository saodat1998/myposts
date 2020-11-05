<?php
namespace App\Forms;

use Saodat\FormBase\FormBaseContract as FormBase;

class PostForm
{

    /**
     * @var FormBase
     */
    protected $formBase;

    /**
     * PostForm constructor.
     * @param FormBase $formBase
     */
    public function __construct(FormBase $formBase)
    {
        $this->formBase = $formBase;
    }

    /**
     * @return array
     */
    public function buildForm()
    {
        /**
         * addField(type, name, label, options, validationRule, value, placeholder)
         */
        $options = [1 => 'a', 2 => 'b', 3 => 'c'];
        $attributes = ['dense'=>true, "cols"=>'6', 'class'=> 'my-class'];
        return $this->formBase->addField('select', 'name', 'select-label', $options)->setAttributes($attributes)
            ->addField('text', 'name', 'label')->setAttributes($attributes);
    }
}
