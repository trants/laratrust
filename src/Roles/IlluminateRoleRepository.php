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

use Vspc\Support\Traits\RepositoryTrait;

class IlluminateRoleRepository implements RoleRepositoryInterface
{
    use RepositoryTrait;

    /**
     * The Eloquent role model FQCN.
     *
     * @var string
     */
    protected $model = EloquentRole::class;

    /**
     * Create a new Illuminate role repository.
     *
     * @param string $model
     *
     * @return void
     */
    public function __construct(?string $model = null)
    {
        $this->model = $model;
    }

    /**
     * @inheritdoc
     */
    public function findById(int $id): ?RoleInterface
    {
        return $this->createModel()->newQuery()->find($id);
    }

    /**
     * @inheritdoc
     */
    public function findBySlug(string $slug): ?RoleInterface
    {
        return $this->createModel()->newQuery()->where('slug', $slug)->first();
    }

    /**
     * @inheritdoc
     */
    public function findByName(string $name): ?RoleInterface
    {
        return $this->createModel()->newQuery()->where('name', $name)->first();
    }
}
