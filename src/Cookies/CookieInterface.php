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

namespace Vspc\Laratrust\Cookies;

interface CookieInterface
{
    /**
     * Put a value in the Laratrust cookie (to be stored until it's cleared).
     *
     * @param mixed $value
     *
     * @return void
     */
    public function put($value): void;

    /**
     * Returns the Laratrust cookie value.
     *
     * @return mixed
     */
    public function get();

    /**
     * Remove the Laratrust cookie.
     *
     * @return void
     */
    public function forget(): void;
}
