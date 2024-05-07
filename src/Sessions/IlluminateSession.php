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

use Illuminate\Session\Store as SessionStore;

class IlluminateSession implements SessionInterface
{
    /**
     * The session store object.
     *
     * @var SessionStore
     */
    protected $session;

    /**
     * The session key.
     *
     * @var string
     */
    protected $key = 'vspc_laratrust';

    /**
     * Constructor.
     *
     * @param SessionStore $session
     * @param string       $key
     *
     * @return void
     */
    public function __construct(SessionStore $session, ?string $key = null)
    {
        $this->session = $session;

        $this->key = $key;
    }

    /**
     * @inheritdoc
     */
    public function put($value): void
    {
        $this->session->put($this->key, $value);
    }

    /**
     * @inheritdoc
     */
    public function get()
    {
        return $this->session->get($this->key);
    }

    /**
     * @inheritdoc
     */
    public function forget(): void
    {
        $this->session->forget($this->key);
    }
}
