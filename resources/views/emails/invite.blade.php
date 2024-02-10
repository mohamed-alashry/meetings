<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<div>
    <div style="font-family: sans-serif;background: #F6F6F6;padding: 5% 20%;">
        <div style="border: solid 1px #cccc; border-radius: 1.2rem; background-color: #fff; ">
            <table
                style="background-color: #022537; color: #fff; padding: 1%;border-radius: 1.2rem 1.2rem 0 0; width: 100%;">
                <tr style="width: 100%;">
                    <th style="width: 50%; text-align: start;font-size: 75%;">
                        <h3>
                            {{ $meeting->title }}
                            @if ($meeting->status == 2)
                                - (Cancelled)
                            @endif
                        </h3>
                        <p>
                            <img src="https://safavisa.sirv.com/Images/calendar 1.png" alt="" srcset="">
                            {{ $meeting->start_date_format }},
                            {{ $meeting->start_time_format }}
                        </p>
                        <p>
                            <img style="padding-right: 3px;" src="https://safavisa.sirv.com/Images/Group.png"
                                alt="" srcset="">
                            {{ $meeting->room->name }}
                        </p>
                        <p>
                            <img style="padding-right: 3px;" src="https://safavisa.sirv.com/Images/hourglass 1.png"
                                alt="" srcset="">
                            Duration: {{ $meeting->duration }} min
                        </p>
                    </th>
                    <th style="width: 50%; text-align: end;">
                        <img src="https://safavisa.sirv.com/Images/logoModel.png" alt="" srcset="">
                    </th>
                </tr>

            </table>
            <div>
                <table style="padding: 2rem 0;background-color: #fff;  width: 100%;">
                    <tr style="width: 100%;">
                        <th style="text-align: end; padding-top: 0.5%;">
                            <a href="{{ $meeting->google_meet_link }}"
                                style="text-decoration: none; padding: 5% 15%; border-radius: 1rem; font-weight: 600;font-size: 75%; background-color: #fff; border: solid 1px #cccc;">
                                <span>
                                    <img src="https://safavisa.sirv.com/Images/meet 1.png" alt=""
                                        srcset="">
                                </span>
                                <span style="vertical-align: top;">
                                    Open in Google Meet
                                </span>
                            </a>
                        </th>
                        <th style="text-align: start;">
                            <a href="{{ $meeting->add_to_calendar }}"
                                style="text-decoration: none; padding: 5% 15%; border-radius: 1rem;background-color: #5E1042; border: solid 1px #cccc; font-weight: 600;font-size: 75%; color: #fff;">
                                <span>
                                    <img src="https://safavisa.sirv.com/Images/appointment 1.png" alt=""
                                        srcset="">
                                </span>
                                <span style="vertical-align: super;">
                                    Add to your Calendar
                                </span>
                            </a>
                        </th>
                    </tr>

                </table>
                <div style="padding: 0% 5%; font-size: 75%;">
                    <p style="font-weight: 700; margin: 0;">Invited Persons</p>
                    <p style="margin-top: 3px;">Invited persons by email or Name</p>
                    <div
                        style="border: solid 1px #cccc; border-radius: 1.2rem; padding: 1rem; color: #022537;background-color: #fff;">

                        @foreach ($meeting->invitations as $invitee)
                            <p style=" font-weight: 700; margin: 0.3rem;">
                                {{ $invitee->userable->name }}
                                <span style="font-weight: 500;">
                                    ({{ $invitee->userable->email }})
                                </span>
                            </p>
                        @endforeach
                        <table style="font-weight: 700; width: 100%; padding: 0;">
                            <tr>
                                <th style="width: 50%;text-align: start;">
                                    {{-- <p style="margin-top: 0;">
                                        mohamed@one.com.sa
                                        <span style="font-weight: 500;">
                                            (External Guest)
                                        </span>
                                    </p> --}}
                                </th>
                                <th style="width: 50%; text-align: end;">
                                    <p style="margin-top: 0;">
                                        {{ count($meeting->invitations) }} Persons
                                        <img src="https://safavisa.sirv.com/Images/group 1.png" alt=""
                                            srcset="">
                                    </p>
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr style="border-color: #fff;">
                <div style="padding: 1rem; font-size: 14px;">
                    <p style="font-weight: 700; margin: 0;">Meeting Information</p>
                    <p style="margin-top: 3px;">Type here the meeting info</p>
                    <div
                        style="border: solid 1px #cccc; border-radius: 1.2rem; padding: 1rem; color: #022537; background-color: #fff;">
                        <table style="font-weight: 700; width: 100%; padding: 0;">
                            <tr>
                                <th style="text-align: start; vertical-align: baseline;width: 9px;">
                                    <img src="https://safavisa.sirv.com/Images/phone_forwarded.png" alt=""
                                        srcset="">
                                </th>
                                <th style=" text-align: start;">
                                    <p style="font-weight: 500; margin-top: 0%;">
                                        {{ $meeting->title }}
                                    </p>
                                    <p style="font-weight: 500;">
                                        {!! $meeting->brief !!}
                                    </p>
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr style="border-color: #fff;">
                <div
                    style="padding: 1rem; font-size: 14px;
                background-image: url(https://safavisa.sirv.com/Images/Frame-end-footer.png);
                background-repeat: no-repeat;
                background-position: right;
                background-size: contain;
                border-radius: 0 0 19px ;">
                    <p style="font-weight: 700; margin: 0;">Meeting Information</p>
                    <p style="margin-top: 3px;">Type here the meeting info</p>
                    <table style="font-weight: 700; width: 100%; padding: 0;">
                        <tr>
                            <th style="text-align: start; vertical-align: baseline; float: inline-start; width: 48%;">

                                <div
                                    style="border: solid 1px #cccc; border-radius: 1.2rem; padding: 1rem; color: #022537; width: 63%;height: fit-content; background-color: #fff; float: inline-end;">
                                    @forelse ($meeting->room->features as $feature)
                                        @if ($feature->name == 'wifi' && $feature->value)
                                            <p style="font-weight: 500; margin: 0.2rem 0.2rem;">
                                                <img src="https://safavisa.sirv.com/Images/wi-fi 1.png" alt=""
                                                    srcset="">
                                                <span style="font-weight: 700;">
                                                    Guest Wifi
                                                </span>
                                            </p>
                                        @endif
                                        @if ($feature->name == 'online_meeting' && $feature->value)
                                            <p style="font-weight: 500; margin: 0.2rem 0.2rem;">
                                                <img src="https://safavisa.sirv.com/Images/online-meeting 1.png"
                                                    alt="" srcset="">
                                                <span style="font-weight: 700;">
                                                    Online meeting
                                                </span>
                                            </p>
                                        @endif
                                        @if ($feature->name == 'projector' && $feature->value)
                                            <p style="font-weight: 500; margin: 0.2rem 0.2rem;">
                                                <i class="fa-solid fa-video"></i>
                                                <span style="font-weight: 700;">
                                                    Projector
                                                </span>
                                            </p>
                                        @endif
                                        @if ($feature->name == 'tv' && $feature->value)
                                            <p style="font-weight: 500; margin: 0.2rem 0.2rem;">
                                                <img src="https://safavisa.sirv.com/Images/television 1.png"
                                                    alt="" srcset="">
                                                <span style="font-weight: 700;">
                                                    TV
                                                </span>
                                            </p>
                                        @endif
                                        @if ($feature->name == 'sound_system' && $feature->value)
                                            <p style="font-weight: 500; margin: 0.2rem 0.2rem;">
                                                <i class="fa-solid fa-volume-high"></i>
                                                <span style="font-weight: 700;">
                                                    Sound System
                                                </span>
                                            </p>
                                        @endif
                                    @empty
                                    @endforelse
                                </div>
                            </th>
                            <th style="text-align: start; vertical-align: baseline; float: inline-start; width: 48%;">
                                <div
                                    style="border: solid 1px #cccc; border-radius: 1.2rem; padding: 1rem 1rem 0; color: #022537; width: 75%;height: fit-content; background-color: #fff; float: inline-start; margin: 0 1rem 1.5rem;">
                                    <div>
                                        <img src="https://safavisa.sirv.com/Images/notes 1.png" alt=""
                                            srcset="">
                                        <span style="font-weight: 500; margin: 0.2rem; color: rgb(126, 126, 126);">
                                            Guest ID:
                                            <span style="font-weight: 700;color: #022537;">20213</span>
                                        </span>
                                    </div>
                                    @if ($meeting->send_user_location)
                                        <div style="margin-top: 1rem ">
                                            <img src="https://safavisa.sirv.com/Images/notes 1.png" alt=""
                                                srcset="">
                                            <span style="font-weight: 500; margin: 0.1rem; color: rgb(126, 126, 126);">
                                                Location on Maps:
                                                <p style="margin: 0;">
                                                    <a href="{{ $meeting->room->google_location }}" target="_blank"
                                                        style="font-weight: 700;color: #5E1042; margin-left: 1.6rem">
                                                        Click here
                                                    </a>
                                                </p>
                                            </span>
                                        </div>
                                    @endif
                                    <div>
                                        <img src="https://safavisa.sirv.com/Images/phone_forwarded.png" alt=""
                                            srcset="">
                                        <span style="font-weight: 500; margin: 0.2rem; color: rgb(126, 126, 126);">
                                            Guide PDF:
                                            <p style="margin: 0;">
                                                <a href="{{ $meeting->room->attachment_path }}" download="guide_room"
                                                    style="font-weight: 700;color: #5E1042; margin-left: 1.6rem">
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
            </div>
        </div>
    </div>
</div>

</html>
