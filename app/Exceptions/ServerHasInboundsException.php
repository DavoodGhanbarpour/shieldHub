<?php

namespace App\Exceptions;

use Exception;

class ServerHasInboundsException extends Exception
{
    protected $message = 'Server has inbounds connected to it';
}
