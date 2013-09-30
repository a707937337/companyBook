<?php
/**
 * 项目入口文件
 */
require './firezp/firezp.php';
$appHomeConf = array('app' => '/book','debug'=>0);//如果是当前目录填写/，如果是当前目录下的某个文件夹为/文件夹 目前仅支持这两种部署
firezp::run($appHomeConf);