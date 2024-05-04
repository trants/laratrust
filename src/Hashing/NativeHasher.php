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

class NativeHasher implements HasherInterface
{
    /**
     * @inheritdoc
     */
    public function hash(string $value): string
    {
        return password_hash($value, PASSWORD_DEFAULT);
    }

    /**
     * @inheritdoc
     */
    public function check(string $value, string $hashedValue): bool
    {
        return password_verify($value, $hashedValue);
    }
}
