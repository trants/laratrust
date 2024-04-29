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

class StrictPermissions implements PermissionsInterface
{
    use PermissionsTrait;

    /**
     * @inheritdoc
     */
    protected function createPreparedPermissions(): array
    {
        $prepared = [];

        if (! empty($this->getSecondaryPermissions())) {
            foreach ($this->getSecondaryPermissions() as $permissions) {
                $this->preparePermissions($prepared, $permissions);
            }
        }

        if (! empty($this->getPermissions())) {
            $this->preparePermissions($prepared, $this->getPermissions());
        }

        return $prepared;
    }
}
