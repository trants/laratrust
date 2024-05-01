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

trait AuthenticatedCheckpoint
{
    /**
     * @inheritdoc
     */
    public function fail(?UserInterface $user = null): bool
    {
        return true;
    }
}
