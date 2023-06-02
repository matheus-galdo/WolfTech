<?php

namespace App\DataObjects;

use JsonSerializable;

/**
 * 
 */
trait HasSerialize
{
    /**
     * Serialize the DTO
     * @return array
     */
    function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}