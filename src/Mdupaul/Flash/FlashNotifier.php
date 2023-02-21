<?php namespace Mdupaul\Flash;

use Illuminate\Support\Facades\Session;

class FlashNotifier
{
    /**
     * Create a new flash notifier instance.
     */
    function __construct(private readonly SessionStore $session)
    {
    }

    /**
     * Flash an information message.
     */
    public function info(string $message): self
    {
        $this->message($message);

        return $this;
    }

    /**
     * Flash a success message.
     */
    public function success(string $message): self
    {
        $this->message($message, 'success');

        return $this;
    }

    /**
     * Flash an error message.
     */
    public function error(string $message): self
    {
        $this->message($message, 'danger');

        return $this;
    }

    /**
     * Flash a warning message.
     */
    public function warning(string $message): self
    {
        $this->message($message, 'warning');

        return $this;
    }

    /**
     * Flash a sticky message.
     */
    public function sticky(string $message): self
    {
        $this->message($message, 'sticky');

        return $this;
    }

    /**
     * Flash an overlay modal.
     */
    public function overlay(string $message, string $title = 'Notice'): self
    {
        $this->message($message);

        $this->session->flash('flash_notification.overlay', true);
        $this->session->flash('flash_notification.title', $title);

        return $this;
    }

    /**
     * Flash a general message.
     */
    public function message(string $message, string $level = 'info'): self
    {

        $messages = [];
        if ($this->hasNotificationMessages()) {
            $messages = (array)$this->getNotificationMessages();
        }
        $messages[] = [$level => $message];

        $this->session->flash('flash_notification.messages', $messages);

        return $this;
    }

    /**
     * Add an "important" flash to the session.
     */
    public function important(): self
    {
        $this->session->flash('flash_notification.important', true);

        return $this;
    }

    /**
     * Tells if there are notification messages
     */
    public function hasNotificationMessages(): bool
    {
        return Session::has('flash_notification.messages');
    }

    /**
     * Returns the notification messages
     */
    public function getNotificationMessages(): mixed
    {
        return Session::get('flash_notification.messages');
    }
}
