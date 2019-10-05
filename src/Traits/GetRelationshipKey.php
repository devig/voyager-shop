<?php

/*
|--------------------------------------------------------------------------
| GetRelationshipKey Trait
|--------------------------------------------------------------------------
|
| This Traits only purpose is to return the class name in lowercase for the
| relationships in the traits.
|
*/

namespace Tjventurini\VoyagerShop\Traits;

trait GetRelationshipKey
{
    /**
     * Get the class name as lowercase string.
     *
     * @return string
     */
    private function getRelationshipKey(): string
    {
        return strtolower(static::class);
    }
}
