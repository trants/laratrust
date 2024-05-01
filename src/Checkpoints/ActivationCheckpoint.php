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
use Vspc\Laratrust\Activations\ActivationRepositoryInterface;

class ActivationCheckpoint implements CheckpointInterface
{
    use AuthenticatedCheckpoint;

    /**
     * The Activations repository instance.
     *
     * @var ActivationRepositoryInterface
     */
    protected $activations;

    /**
     * Constructor.
     *
     * @param ActivationRepositoryInterface $activations
     *
     * @return void
     */
    public function __construct(ActivationRepositoryInterface $activations)
    {
        $this->activations = $activations;
    }

    /**
     * @inheritdoc
     */
    public function login(UserInterface $user): bool
    {
        return $this->checkActivation($user);
    }

    /**
     * @inheritdoc
     */
    public function check(UserInterface $user): bool
    {
        return $this->checkActivation($user);
    }

    /**
     * Checks the activation status of the given user.
     *
     * @param UserInterface $user
     *
     * @throws NotActivatedException
     *
     * @return bool
     */
    protected function checkActivation(UserInterface $user): bool
    {
        $completed = $this->activations->completed($user);

        if (! $completed) {
            $exception = new NotActivatedException('Your account has not been activated yet.');

            $exception->setUser($user);

            throw $exception;
        }

        return true;
    }
}
