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
                @if ($meeting->status != 2)
                <table style="padding: 4% 0;background-color: #fff !important;  width: 100%;">
                    <tr>
                        <th style="text-align: center;width: 50%;">
                            <a href="{{ $meeting->generateGoogleCalendarLink() }}" class="border-dark"
                                style="text-decoration: none; padding: 2% 4%; border-radius: 1rem;background-color: #5E1042 !important;  font-weight: 600; color: #fff !important;">
                                <span>
                                    <img src="https://safavisa.sirv.com/Images/appointment%201.png" alt=""
                                        style="max-width: 20px; width:6%;vertical-align: middle;">
                                </span>
                                <span style="vertical-align: middle;font-size: 1vw;">
                                    Add to your Calendar
                                </span>
                            </a>
                        </th>
                    </tr>
                </table>
                @endif
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
                @if ($meeting->brief)
                <hr style="border-color: #fff !important;">
                <div style="padding: 1rem;">
                    <p style="font-weight: bold; margin: 0;font-size: 1vw; color: #022537 !important">Meeting
                        Information
                    </p>
                    <p style="margin-top: 3px;font-size: 1vw; color: #0225378A !important">Type Here The Meeting
                        Info
                    </p>
                    <div class="border-dark"
                        style=" border-radius: 0.8rem; padding: 0.3rem; color: #022537 !important; background-color: #fff !important;">
                        <table style="font-weight: bold; width: 100%; padding: 0;">
                            <tr>
                                <th style="text-align: start; vertical-align: baseline;width: 9px; font-size: 1vw">
                                    <p style="font-weight: 500; color:rgb(126,126,126) !important;">
                                        {!! $meeting->brief !!}
                                    </p>
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
                @endif
                @if ($meeting->send_room_properties)
                    <hr style="border-color: #fff;">
                    <div
                        style="padding: 1rem; font-size: 14px;
                background-image: url(https://safavisa.sirv.com/Images/Frame-email.png);
                background-repeat: no-repeat;
                background-position: right bottom;
                background-size: 30vw 50%;
                border-radius: 0 0 19px ;">
                    <p style="font-weight: bold; margin: 0;font-size: 1vw; color: #022537 !important">Meeting Room
                        Specs </p>
                    <p style="margin-top: 3px;font-size: 1vw; color: #0225378A !important">here the meeting room
                        info</p>
                    <table style="font-weight: 500; width: 100%; padding: 0;">
                        <tr>
                            <th style="text-align: start; vertical-align: baseline; float: inline-start; width: 42%;">

                                    <div
                                        style="border: solid 1px #cccc; border-radius: 0.8rem; padding: 0.3rem; color: #022537; width: 63%;height: fit-content; background-color: #fff; float: inline-end; font-size: 1vw">
                                        @foreach ($meeting->room->features as $feature)
                                            @if ($feature->name == 'wifi' && $feature->value)
                                                <p style="font-weight: 500; margin: 0.2rem 0.2rem;">
                                                    <span
                                                        style="font-weight: 500; color:rgb(126,126,126); vertical-align: text-bottom;">
                                                        Guest Wifi
                                                    </span>
                                                </p>
                                                <p>
                                                    <span style="padding-left:.5rem">
                                                        Network SSID: <b>One1Guest</b>
                                                    </span>
                                                </p>
                                                <p>
                                                    <span style="padding-left:.5rem">
                                                        Password: <b>Welcome2one1</b>
                                                    </span>
                                                </p>
                                            @endif
                                            @if ($feature->name == 'online_meeting' && $feature->value)
                                                <p style="font-weight: 500; margin: 0.2rem 0.2rem;">
                                                    <span
                                                        style="font-weight: 500; color:rgb(126,126,126); vertical-align: text-bottom;">
                                                        Meeting System
                                                    </span>
                                                </p>
                                            @endif
                                            @if ($feature->name == 'projector' && $feature->value)
                                                <p style="font-weight: 500; margin: 0.2rem 0.2rem;">
                                                    <span
                                                        style="font-weight: 500; color:rgb(126,126,126); vertical-align: text-bottom;">
                                                        Projector
                                                    </span>
                                                </p>
                                            @endif
                                            @if ($feature->name == 'tv' && $feature->value)
                                                <p style="font-weight: 500; margin: 0.2rem 0.2rem;">
                                                    <span
                                                        style="font-weight: 500; color:rgb(126,126,126); vertical-align: text-bottom;">
                                                        Smart TV
                                                    </span>
                                                </p>
                                            @endif
                                            @if ($feature->name == 'sound_system' && $feature->value)
                                                <p style="font-weight: 500; margin: 0.2rem 0.2rem;">
                                                    <span style="font-weight: 500; color:rgb(126,126,126);">
                                                        Sound System
                                                    </span>
                                                </p>
                                            @endif
                                            @if ($feature->name == 'interactive_smart_board' && $feature->value)
                                                <p style="font-weight: 500; margin: 0.2rem 0.2rem;">
                                                    <span style="font-weight: 500; color:rgb(126,126,126);">
                                                        Interactive Smart Board
                                                    </span>
                                                </p>
                                            @endif
                                        @endforeach
                                        @foreach ($meeting->room->properties as $item)
                                            <p style=" font-weight: 500; color:rgb(126,126,126); margin: 0.3rem;">
                                                {{ $item->key }}
                                                <span style="font-weight: 500;">
                                                    {{ $item->value }}
                                                </span>
                                            </p>
                                        </span>
                                    </div>
                                    @endif
                                    <div>
                                        <span
                                            style="font-weight: 500; margin: 0.2rem; color: rgb(126, 126, 126) !important;">
                                            Guide PDF:
                                            <p style="margin: 0;">
                                                <a href="{{ $meeting->room->attachment_path }}" download="guide_room"
                                                    style="font-weight: bold;color: #5E1042 !important; margin-left: 1.6rem">
                                                    Click here to download
                                                </a>
                                            </p>
                                        </span>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </table>
                </div>
                @else
                    <div style="text-align: right">
                        <img src="https://safavisa.sirv.com/Images/Frame-email.png" alt="" style="width: 50%">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

</html>
