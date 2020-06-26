<?php

namespace App\Exceptions;

use App\Services\ApiMessageBuilder;
use Exception;

abstract class ApiException extends Exception
{
    /**
     * @var ApiMessageBuilder
     */
    protected $messageBuilder;

    /**
     * @param string          $message
     * @param int             $code
     * @param \Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->messageBuilder = new ApiMessageBuilder();
    }
}
