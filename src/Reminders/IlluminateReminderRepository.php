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

namespace Vspc\Laratrust\Reminders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Vspc\Laratrust\Users\UserInterface;
use Vspc\Support\Traits\RepositoryTrait;
use Vspc\Laratrust\Users\UserRepositoryInterface;

class IlluminateReminderRepository implements ReminderRepositoryInterface
{
    use RepositoryTrait;

    /**
     * The Users repository instance.
     *
     * @var UserRepositoryInterface
     */
    protected $users;

    /**
     * The Eloquent reminder model name.
     *
     * @var string
     */
    protected $model = EloquentReminder::class;

    /**
     * The expiration time in seconds.
     *
     * @var int
     */
    protected $expires = 259200;

    /**
     * Constructor.
     *
     * @param UserRepositoryInterface $users
     * @param string                  $model
     * @param int                     $expires
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $users, ?string $model = null, ?int $expires = null)
    {
        $this->users = $users;

        $this->model = $model;

        $this->expires = $expires;
    }

    /**
     * @inheritdoc
     */
    public function create(UserInterface $user)
    {
        $reminder = $this->createModel();

        $code = $this->generateReminderCode();

        $reminder->fill([
            'code'      => $code,
            'completed' => false,
        ]);

        $reminder->user_id = $user->getUserId();

        $reminder->save();

        return $reminder;
    }

    /**
     * @inheritdoc
     */
    public function get(UserInterface $user, ?string $code = null)
    {
        $expires = $this->expires();

        $reminder = $this
            ->createModel()
            ->newQuery()
            ->where('user_id', $user->getUserId())
            ->where('completed', false)
            ->where('created_at', '>', $expires)
        ;

        if ($code) {
            $reminder->where('code', $code);
        }

        return $reminder->first();
    }

    /**
     * @inheritdoc
     */
    public function exists(UserInterface $user, ?string $code = null): bool
    {
        return (bool) $this->get($user, $code);
    }

    /**
     * @inheritdoc
     */
    public function complete(UserInterface $user, string $code, string $password): bool
    {
        $expires = $this->expires();

        $reminder = $this
            ->createModel()
            ->newQuery()
            ->where('user_id', $user->getUserId())
            ->where('code', $code)
            ->where('completed', false)
            ->where('created_at', '>', $expires)
            ->first()
        ;

        if ($reminder === null) {
            return false;
        }

        $credentials = compact('password');

        $valid = $this->users->validForUpdate($user, $credentials);

        if (! $valid) {
            return false;
        }

        $this->users->update($user, $credentials);

        $reminder->fill([
            'completed'    => true,
            'completed_at' => Carbon::now(),
        ]);

        $reminder->save();

        return true;
    }

    /**
     * @inheritdoc
     */
    public function removeExpired(): bool
    {
        $expires = $this->expires();

        return $this
            ->createModel()
            ->newQuery()
            ->where('completed', false)
            ->where('created_at', '<', $expires)
            ->delete()
        ;
    }

    /**
     * Returns the expiration date.
     *
     * @return Carbon
     */
    protected function expires(): Carbon
    {
        return Carbon::now()->subSeconds($this->expires);
    }

    /**
     * Returns the random string used for the reminder code.
     *
     * @return string
     */
    protected function generateReminderCode(): string
    {
        return Str::random(32);
    }
}
