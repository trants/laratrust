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

namespace Vspc\Laratrust\Activations;

use Illuminate\Database\Eloquent\Model;

class EloquentActivation extends Model implements ActivationInterface
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'activations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'completed',
        'completed_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'completed' => 'bool',
    ];

    /**
     * @inheritdoc
     */
    public function getCode(): string
    {
        return $this->attributes['code'];
    }
}
