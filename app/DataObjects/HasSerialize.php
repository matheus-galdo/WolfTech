<?php

namespace App\DataObjects;

/**
 * Reusable serialize method for DTO's
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
