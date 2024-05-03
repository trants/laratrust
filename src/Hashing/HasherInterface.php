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

namespace Vspc\Laratrust\Hashing;

interface HasherInterface
{
    /**
     * Hash the given value.
     *
     * @param string $value
     *
     * @throws \RuntimeException
     *
     * @return string
     */
    public function hash(string $value): string;

    /**
     * Checks the string against the hashed value.
     *
     * @param string $value
     * @param string $hashedValue
     *
     * @return bool
     */
    public function check(string $value, string $hashedValue): bool;
}
