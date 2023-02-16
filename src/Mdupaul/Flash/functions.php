<?php

if ( ! function_exists('flash')) {

    /**
     * Arrange for a flash message.
     */
    function flash(?string $message = null): \Mdupaul\Flash\FlashNotifier
    {
        $notifier = app('flash');

        if (!is_null($message)) {
            return $notifier->info($message);
        }

        return $notifier;
    }

}