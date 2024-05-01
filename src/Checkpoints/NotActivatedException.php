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

class NotActivatedException extends \RuntimeException
{
    /**
     * The user which caused the exception.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * Returns the user.
     *
     * @return UserInterface
     */
    public function getUser(): UserInterface
    {
        return $this->user;
    }

    /**
     * Sets the user associated with Laratrust (does not log in).
     *
     * @param $user UserInterface
     *
     * @return void
     */
    public function setUser(UserInterface $user): void
    {
        $this->user = $user;
    }
}
