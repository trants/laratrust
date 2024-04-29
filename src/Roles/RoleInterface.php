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

namespace Vspc\Laratrust\Roles;

interface RoleInterface
{
    /**
     * Returns the role's primary key.
     *
     * @return int
     */
    public function getRoleId(): int;

    /**
     * Returns the role's slug.
     *
     * @return string
     */
    public function getRoleSlug(): string;

    /**
     * Returns all users for the role.
     *
     * @return \IteratorAggregate
     */
    public function getUsers(): \IteratorAggregate;

    /**
     * Returns the user's model.
     *
     * @return string
     */
    public static function getUsersModel(): string;

    /**
     * Sets the user's model.
     *
     * @param string $usersModel
     *
     * @return void
     */
    public static function setUsersModel(string $usersModel): void;
}
