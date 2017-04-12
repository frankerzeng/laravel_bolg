<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/12
 * Time: 11:29
 */

print_r(file_get_contents("php://input"));

//$request = file_get_contents("php://input");
//$content = json_decode($request);

$rest = shell_exec("cd /usr/local/nginx/html/blog && git pull git@github.com:frankerzeng/laravel_bolg.git");
$rest . PHP_EOL;

$request = date("Y-m-d H:i:s") . "-----";
$request .= $rest;

$request .= "\n";
file_put_contents("git-webhook.txt", $request, FILE_APPEND);

echo 111112;

