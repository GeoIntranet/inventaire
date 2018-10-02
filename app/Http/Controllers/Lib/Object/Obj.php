<?php namespace App\Http\Controllers\Lib;

class Obj
{
    /**
     * Obj constructor.
     */
    public function __construct( $data)
    {
        $this->data = $data ;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public static function boot($data){
        $instance = new self($data);
        return $instance;
    }
}