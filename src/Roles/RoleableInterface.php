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

interface RoleableInterface
{
    /**
     * Returns all the associated roles.
     *
     * @return \IteratorAggregate
     */
    public function getRoles(): \IteratorAggregate;

    /**
     * Checks if the user is in the given role.
     *
     * @param mixed $role
     *
     * @return bool
     */
    public function inRole($role): bool;

    /**
     * Checks if the user is in any of the given roles.
     *
     * @param array $roles
     *
     * @return bool
     */
    public function inAnyRole(array $roles): bool;
}
