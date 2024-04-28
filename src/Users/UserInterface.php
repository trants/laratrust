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

namespace Vspc\Laratrust\Users;

interface UserInterface
{
    /**
     * Returns the user primary key.
     *
     * @return int
     */
    public function getUserId(): int;

    /**
     * Returns the user login.
     *
     * @return string
     */
    public function getUserLogin(): string;

    /**
     * Returns the user login attribute name.
     *
     * @return string
     */
    public function getUserLoginName(): string;

    /**
     * Returns the user password.
     *
     * @return string
     */
    public function getUserPassword(): string;
}
