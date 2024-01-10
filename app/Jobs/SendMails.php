<?php

namespace App\Jobs;

use App\Mail\InviteMeeting;
use App\Mail\ReminderMeeting;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendMails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $type;// reminder, invite
    public $meeting;
    public $emails;

    /**
     * Create a new job instance.
     */
    public function __construct($type, $emails, $meeting)
    {
        $this->type = $type;
        $this->emails = $emails;
        $this->meeting = $meeting;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->type == 'reminder') {
            Mail::to($this->emails)->send(new ReminderMeeting($this->meeting));
        } else {
            Mail::to($this->emails)->send(new InviteMeeting($this->meeting));
        }
    }
}
