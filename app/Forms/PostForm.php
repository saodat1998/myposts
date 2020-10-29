<?php namespace App\Forms;

use Saodat\FormBase\FormBase;

class PostForm extends FormBase
{

    public function buildForm()
    {

        return $this
            ->add('text', 'name', 'label')
            ->add('textarea', 'description', 'Desc');

    }
}
