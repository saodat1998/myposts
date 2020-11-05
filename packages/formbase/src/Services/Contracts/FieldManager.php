<?php


namespace Saodat\FormBase\Services\Contracts;


interface FieldManager
{
    /**
     * @param array $array
     * @return mixed
     */
    public function setAttributes(array $array);

    /**
     * @return mixed
     */
    public function get();

    /**
     * @return mixed
     */
    public function getOne();
}
