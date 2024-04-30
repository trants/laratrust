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

namespace Vspc\Laratrust\Checkpoints;

use Vspc\Laratrust\Users\UserInterface;

interface CheckpointInterface
{
    /**
     * Checkpoint after a user is logged in. Return false to deny persistence.
     *
     * @param UserInterface $user
     *
     * @return bool
     */
    public function login(UserInterface $user): bool;

    /**
     * Checkpoint for when a user is currently stored in the session.
     *
     * @param UserInterface $user
     *
     * @return bool
     */
    public function check(UserInterface $user): bool;

    /**
     * Checkpoint for when a failed login attempt is logged. User is not always
     * passed and the result of the method will not affect anything, as the
     * login failed.
     *
     * @param UserInterface|null $user
     *
     * @return bool
     */
    public function fail(?UserInterface $user = null): bool;
}
