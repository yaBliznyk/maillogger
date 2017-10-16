<?php

/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 15.10.17
 * Time: 16:00
 */
class FileMailerTransfer extends MailTransferAbstract
{
    public $file;

    public function send(MailMessageAbstract $message)
    {
        file_put_contents(
            Yii::getPathOfAlias('application.runtime') . DIRECTORY_SEPARATOR . $this->file,
            $message->getMessage(),
            FILE_APPEND
        );
    }
}