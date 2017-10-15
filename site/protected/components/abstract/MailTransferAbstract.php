<?php

/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 15.10.17
 * Time: 15:58
 */
abstract class MailTransferAbstract extends CApplicationComponent
{
    abstract public function send(MailMessageAbstract $message);
}