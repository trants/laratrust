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

use Vspc\Laratrust\Users\UserInterface;

interface PersistenceRepositoryInterface
{
    /**
     * Checks for a persistence code in the current session.
     *
     * @return string|null
     */
    public function check(): ?string;

    /**
     * Finds a persistence by persistence code.
     *
     * @param string $code
     *
     * @return PersistenceInterface|null
     */
    public function findByPersistenceCode(string $code): ?PersistenceInterface;

    /**
     * Finds a user by persistence code.
     *
     * @param string $code
     *
     * @return UserInterface|null
     */
    public function findUserByPersistenceCode(string $code): ?UserInterface;

    /**
     * Adds a new user persistence to the current session and attaches the user.
     *
     * @param PersistenceInterface $persistable
     * @param bool                 $remember
     *
     * @return bool|null
     */
    public function persist(PersistableInterface $persistable, bool $remember = false): bool;

    /**
     * Adds a new user persistence, to remember.
     *
     * @param PersistableInterface $persistable
     *
     * @return bool
     */
    public function persistAndRemember(PersistableInterface $persistable): bool;

    /**
     * Removes the persistence bound to the current session.
     *
     * @return bool|null
     */
    public function forget(): ?bool;

    /**
     * Removes the given persistence code.
     *
     * @param string $code
     *
     * @return bool|null
     */
    public function remove(string $code): ?bool;

    /**
     * Flushes persistences for the given user.
     *
     * @param PersistableInterface $persistable
     * @param bool                 $forget
     *
     * @return void
     */
    public function flush(PersistableInterface $persistable, bool $forget = true): void;
}
