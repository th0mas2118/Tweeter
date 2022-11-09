<?php

namespace iutnc\tweeterapp\model;

class Follow extends \Illuminate\Database\Eloquent\Model{
    protected $table='tweeter__follow';
    protected $primarykey='id';
    public $timestamps=false;
}