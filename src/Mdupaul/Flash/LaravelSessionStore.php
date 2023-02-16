<?php namespace Mdupaul\Flash;

use Illuminate\Session\Store;

class LaravelSessionStore implements SessionStore
{
    function __construct(private readonly Store $session)
    {
    }

    /**
     * Flash a message to the session.
     */
    public function flash(string $name, mixed $data): void
    {
        $this->session->flash($name, $data);
    }
}