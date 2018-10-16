<?php
namespace Lib;

interface IRepository
{
    public function get($uniqID);

    public function create($uniqId,$url);

    public function list();
}