<?php

namespace iutnc\tweeterapp\model;

class Like extends \Illuminate\Database\Eloquent\Model{
    protected $table='tweeter__like';
    protected $primarykey='id';
    public $timestamps=false;
}