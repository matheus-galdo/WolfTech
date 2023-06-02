<?php

namespace App\DataObjects;

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