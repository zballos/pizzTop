<?php
/**
 * Created by PhpStorm.
 * User: zballos
 * Date: 23/05/17
 * Time: 00:13
 */
namespace data;

/**
 * Class Debug
 * @package data\Debug
 */
class Debug
{
    public function __construct()
    {
        //
    }

    /**
     * @param $value
     */
    public static function show($value)
    {
        print_r("<pre>" . var_dump($value) . "</pre>");
    }
}