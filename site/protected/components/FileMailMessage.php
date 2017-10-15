<?php

/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 15.10.17
 * Time: 17:55
 */
class FileMailMessage extends MailMessageAbstract
{
    /**
     * @return string
     */
    public function getMessage()
    {
        return "From: {$this->from}" . PHP_EOL
            . "To: {$this->to}" . PHP_EOL
            . "Message: {$this->message}" . PHP_EOL . PHP_EOL;
    }
}