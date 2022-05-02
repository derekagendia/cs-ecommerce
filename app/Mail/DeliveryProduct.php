<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;


class DeliveryProduct extends Mailable
{
    use Queueable, SerializesModels;

    public string $token;
    public User $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,string $token)
    {
        $this->token = $token;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.confirm-reception')->subject('Confirm Delivery Product');
    }
}
