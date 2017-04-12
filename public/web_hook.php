<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/12
 * Time: 11:29
 */

print_r(file_get_contents("php://input"));

$request = file_get_contents("php://input");
$content = json_decode($request);

file_put_contents("git-webhook.txt", $request, FILE_APPEND);

echo 11;

