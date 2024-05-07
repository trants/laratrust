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

namespace Vspc\Laratrust\Sessions;

interface SessionInterface
{
    /**
     * Put a value in the Laratrust session.
     *
     * @param mixed $value
     *
     * @return void
     */
    public function put($value): void;

    /**
     * Returns the Laratrust session value.
     *
     * @return mixed
     */
    public function get();

    /**
     * Removes the Laratrust session.
     *
     * @return void
     */
    public function forget(): void;
}
