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

namespace Vspc\Laratrust\Reminders;

use Vspc\Laratrust\Users\UserInterface;

interface ReminderRepositoryInterface
{
    /**
     * Create a new reminder record and code.
     *
     * @param UserInterface $user
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(UserInterface $user);

    /**
     * Gets the reminder for the given user.
     *
     * @param UserInterface $user
     * @param string|null   $code
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function get(UserInterface $user, ?string $code = null);

    /**
     * Check if a valid reminder exists.
     *
     * @param UserInterface $user
     * @param string|null   $code
     *
     * @return bool
     */
    public function exists(UserInterface $user, ?string $code = null): bool;

    /**
     * Complete reminder for the given user.
     *
     * @param UserInterface $user
     * @param string        $code
     * @param string        $password
     *
     * @return bool
     */
    public function complete(UserInterface $user, string $code, string $password): bool;

    /**
     * Remove expired reminder codes.
     *
     * @return bool
     */
    public function removeExpired(): bool;
}
