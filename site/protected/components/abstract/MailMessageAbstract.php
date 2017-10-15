<?php
/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 15.10.17
 * Time: 17:46
 */

abstract class MailMessageAbstract
{
    protected $message;
    protected $from;
    protected $to;

    public function __construct($from, $to, $message)
    {
        $this->from = $from;
        $this->to = $to;
        $this->message = $message;
    }

    /**
     * @return string
     */
    abstract public function getMessage();

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }
}