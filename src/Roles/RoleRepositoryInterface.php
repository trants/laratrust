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

interface RoleRepositoryInterface
{
    /**
     * Finds a role by the given primary key.
     *
     * @param int $id
     *
     * @return RoleInterface|null
     */
    public function findById(int $id): ?RoleInterface;

    /**
     * Finds a role by the given slug.
     *
     * @param string $slug
     *
     * @return RoleInterface|null
     */
    public function findBySlug(string $slug): ?RoleInterface;

    /**
     * Finds a role by the given name.
     *
     * @param string $name
     *
     * @return RoleInterface|null
     */
    public function findByName(string $name): ?RoleInterface;
}
