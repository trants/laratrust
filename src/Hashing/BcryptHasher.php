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

class BcryptHasher implements HasherInterface
{
    use Hasher;

    /**
     * The hash strength.
     *
     * @var int
     */
    public $strength = 8;

    /**
     * @inheritdoc
     */
    public function hash(string $value): string
    {
        $salt = $this->createSalt();

        $strength = str_pad($this->strength, 2, '0', STR_PAD_LEFT);

        $prefix = '$2y$';

        return crypt($value, $prefix.$strength.'$'.$salt.'$');
    }

    /**
     * @inheritdoc
     */
    public function check(string $value, string $hashedValue): bool
    {
        return $this->slowEquals(crypt($value, $hashedValue), $hashedValue);
    }
}
