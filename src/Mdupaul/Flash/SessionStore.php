<?php namespace Mdupaul\Flash;

interface SessionStore {

    /**
     * Flash a message to the session.
     */
    public function flash(string $name, mixed $data): void;

} 