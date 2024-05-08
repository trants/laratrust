<?php
/*
 * *************************************************************************
 * Copyright (c) VSP Co., Ltd - All Rights Reserved
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 */

namespace Vspc\Laratrust\Persistences;

interface PersistableInterface
{
    /**
     * Returns the persistable key value.
     *
     * @return string
     */
    public function getPersistableId(): string;

    /**
     * Returns the persistable key name.
     *
     * @return string
     */
    public function getPersistableKey(): string;

    /**
     * Set the persistable key name.
     *
     * @return string
     */
    public function setPersistableKey(string $key);

    /**
     * Returns the persistable relationship name.
     *
     * @return string
     */
    public function getPersistableRelationship(): string;

    /**
     * Set the persistable relationship name.
     *
     * @return string
     */
    public function setPersistableRelationship(string $persistableRelationship);

    /**
     * Generates a random persist code.
     *
     * @return string
     */
    public function generatePersistenceCode(): string;
}
