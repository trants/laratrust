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

namespace Vspc\Laratrust\Permissions;

interface PermissionsInterface
{
    /**
     * Returns if access is available for all given permissions.
     *
     * @param array|string $permissions
     *
     * @return bool
     */
    public function hasAccess($permissions): bool;

    /**
     * Returns if access is available for any given permissions.
     *
     * @param array|string $permissions
     *
     * @return bool
     */
    public function hasAnyAccess($permissions): bool;
}
