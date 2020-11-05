<?php
namespace Saodat\FormBase;

interface FormBaseContract {

    /**
     * @return $this|mixed
     */
    public function addField();

    /**
     * @param array $attributes
     * @return mixed
     */
    public function setAttributes($attributes = []);
}
