<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">
    <style>
        @media (prefers-color-scheme: dark) {
            .dark-mode {
                background: #022537 !important;
                color: white !important;
            }

            .border-dark {
                border-color: black !important;

            }
        }
    </style>

</head>

<div>
    <div style="background: #F6F6F6; width:75%; margin:0 auto;">
        <div style="border: solid 1px #cccc; background-color: #fff; ">
            <table style="background-color: #022537; color: #fff; padding: 1%; width: 100%;">
                <tr style="width: 100%;">
                    <th style="width: 50%; text-align: start;">
                        <h3 style="font-weight: bold;font-size: 1vw;">
                            {{ $meeting->title }}
                            @if ($meeting->status == 2)
                                - (Cancelled)
                            @endif
                        </h3>
                        <p style="font-size: 1vw; color: #fff !important">
                            <img src="https://safavisa.sirv.com/Images/calendar%201.png" alt="" srcset=""
                                style="padding-right: 3px;width: 8%;max-width: 20px;vertical-align: bottom;">
                            {{ $meeting->start_date_format }},
                            {{ $meeting->start_time_format }}
                        </p>
                        <p style="font-size: 1vw; color: #fff !important">
                            <img style="padding-right: 3px;width: 8%;max-width: 20px;vertical-align: bottom;"
                                src="https://safavisa.sirv.com/Images/Group.png" alt="" srcset="">
                            {{ $meeting->room->name }}
                        </p>
                        <p style="font-size: 1vw; color: #fff !important">
                            <img style="padding-right: 3px;width: 8%;max-width: 20px;vertical-align: bottom;"
                                src="https://safavisa.sirv.com/Images/hourglass%201.png" alt="" srcset="">
                            End Time {{ $meeting->end_time_format }}
                        </p>
                    </th>
                    <th style="width: 50%; text-align: end;">
                        <img src="https://safavisa.sirv.com/Images/white-logo.png" alt="" srcset=""
                            style="width: inherit;">
                    </th>
                </tr>

            </table>
            <div>
                <div style="padding: 0rem 1rem;">
                    <p style="font-weight: bold; margin: 0;font-size: 1vw; color: #022537 !important">Invited Persons
                    </p>
                    <p style="margin-top: 3px;font-size: 1vw; color: #0225378A !important">Invited persons by email or
                        Name
                    </p>
                    <div class="border-dark"
                        style=" border-radius: 0.8rem; padding: 0.3rem; color: #022537 !important;background-color: #fff !important;">

                        @foreach ($meeting->invitations as $invitee)
                            <p style=" font-weight: bold; margin: 0.3rem; font-size: 1vw;">
                                {{ $invitee->userable->name }}
                                <span style="font-weight: 500;">
                                    ({{ $invitee->userable->email }})
                                </span>
                            </p>
                        @endforeach
                    </div>
                </div>
                <hr style="border-color: #fff;">
                <div style="padding: 1rem;">
                    <p style="font-weight: bold; margin: 0;font-size: 1vw; color: #022537 !important">Meeting
                        Information
                    </p>
                    <div class="border-dark"
                        style=" border-radius: 0.8rem; padding: 0.3rem; color: #022537 !important; background-color: #fff !important;">
                        <table style="font-weight: bold; width: 100%; padding: 0;">
                            <tr>
                                <th style="text-align: start; vertical-align: baseline;width: 9px; font-size: 1vw">
                                    <p style="font-weight: 500; color:rgb(126,126,126) !important;">
                                        {!! $meeting->minutes !!}
                                    </p>
                                </th>
                            </tr>
                        </table>
                    </div>
                    <div style="text-align: right">
                        <img src="https://safavisa.sirv.com/Images/Frame-email.png" alt="" style="width: 50%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</html>
