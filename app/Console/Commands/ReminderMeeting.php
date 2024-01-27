<?php

namespace App\Console\Commands;

use App\Models\Meeting;
use Illuminate\Console\Command;

class ReminderMeeting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reminder-meeting';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $meetings = Meeting::whereDate('start_date', now())->whereTime('start_time', '>=', now()->subHour(4))->whereNull('alert_date')->get();
            if (count($meetings) > 0) {

                foreach ($meetings as $meeting) {
                    $emails = $meeting->invitations->pluck('userable.email')->toArray();
                    \Illuminate\Support\Facades\Mail::to($emails)->send(new \App\Mail\ReminderMeeting($meeting));
                    $meeting->update(['alert_date' => now()]);
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
