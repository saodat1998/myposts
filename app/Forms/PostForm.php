<?php namespace App\Forms;

use Saodat\FormBase\FormBase;

class PostForm extends FormBase
{

    public function buildForm()
    {
        $options = [1 => 'a', 2 => 'b', 3 => 'c'];
        $attributes = ['dense'=>true];
        return $this
            ->addField('checkbox', 'name', $options)
            ->addField('select', 'select', $options)
            ->addField('text', 'name', 'label')
            ->addField('textarea', 'description', 'Desc');

    }
}
