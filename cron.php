<?php

ini_set('memory_limit', '256M');
$_SERVER['REQUEST_METHOD'] = "POST";

include_once(dirname(__FILE__) . '/../../config/config.inc.php');
include_once(dirname(__FILE__) . '/../../init.php');
include(dirname(__FILE__) . '/tochat_whatsapp.php');

if (substr(Tools::encrypt('tochat_whatsapp/cron'), 0, 10) != Tools::getValue('token') || !Module::isInstalled('tochat_whatsapp'))
    die('Bad token');

$tochat_whatsapp = new tochat_whatsapp();
$tochat_whatsapp->abandonedCart();
$tochat_whatsapp->automateMessage();
echo "DONE";