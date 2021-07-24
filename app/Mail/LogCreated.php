<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LogCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $log;
    public $task;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($log, $task)
    {
        $this->log = $log;
        $this->task = $task;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $log = $this->log;
        $task = $this->task;
        return $this->view('mails.log.created', compact('log', 'task'))
            ->subject('New Log created');
    }
}
