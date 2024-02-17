<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Meeting;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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

            // Retrieve meetings with their reminder minutes
            $meetings = Meeting::whereDate('start_date', Carbon::today())
                ->whereNull('alert_date')
                ->where('status', 1)
                ->get();

            // Send email reminders for meetings with start time within the reminder time frame
            foreach ($meetings as $meeting) {
                // Calculate the reminder time based on the meeting's start time and reminder minutes
                $reminderTime = Carbon::parse($meeting->start_time)->subMinutes($meeting->reminder_time);

                // Check if the current time is within the reminder time frame
                if (Carbon::now()->gte($reminderTime)) {
                    // Send email reminder using Laravel Mail
                    $emails = $meeting->invitations->pluck('userable.email')->toArray();
                    \Illuminate\Support\Facades\Mail::to($emails)->send(new \App\Mail\ReminderMeeting($meeting));

                    // Update the alert date to prevent sending duplicate reminders
                    $meeting->update(['alert_date' => now()]);
                }
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
