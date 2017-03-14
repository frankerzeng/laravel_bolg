<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/14
 * Time: 17:14
 */
namespace App\Helper;

class String {
    /*
     * json 转array
     */
    public function str2arr($string) {
        return json_decode($string, true);
    }
}