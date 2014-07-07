<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 14.01.14
 * Time: 17:03
 */

$ImportMessages = function()
{
    include dirname(__FILE__) . '/import.class.php';
    $types = new ImportMessagesType();
    $types->importList();

    $messages = new ImportMessages();
    $messages->importList();
};
$ImportMessages();
