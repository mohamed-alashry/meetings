<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<div>
    <div style="background: #F6F6F6; width:65%; margin:0 auto;">
        <div style="border: solid 1px #cccc; border-radius: 1.2rem; background-color: #fff; ">
            <table
                style="background-color: #022537; color: #fff; padding: 1%;border-radius: 1.2rem 1.2rem 0 0; width: 100%;">
                <tr style="width: 100%;">
                    <th style="width: 50%; text-align: start;">
                        <h3 style="font-weight: bold;font-size: 1vw;">
                            {{ $meeting->title }}
                            @if ($meeting->status == 2)
                                - (Cancelled)
                            @endif
                        </h3>
                        <p style="font-size: .8vw; color: #fff !important">
                            <img src="https://safavisa.sirv.com/Images/calendar%201.png" alt="" srcset="">
                            {{ $meeting->start_date_format }},
                            {{ $meeting->start_time_format }}
                        </p>
                        <p style="font-size: .8vw; color: #fff !important">
                            <img style="padding-right: 3px;" src="https://safavisa.sirv.com/Images/Group.png"
                                alt="" srcset="">
                            {{ $meeting->room->name }}
                        </p>
                        <p style="font-size: .8vw; color: #fff !important">
                            <img style="padding-right: 3px;" src="https://safavisa.sirv.com/Images/hourglass%201.png"
                                alt="" srcset="">
                            Duration: {{ $meeting->duration }} min
                        </p>
                    </th>
                    <th style="width: 50%; text-align: end;">
                        <img src="https://safavisa.sirv.com/Images/white-logo.png" alt="" srcset=""
                            style="width: inherit;">
                    </th>
                </tr>

            </table>
            <div>
                <div style="padding: 1rem 1rem;">
                    <p style="font-weight: bold; margin: 0;font-size: 1vw; color: #022537 !important">Invited Persons
                    </p>
                    <p style="margin-top: 3px;font-size: 1vw; color: #0225378A !important">Invited persons by email or
                        Name
                    </p>
                    <div
                        style="border: solid 1px #cccc; border-radius: 1.2rem; padding: 1rem; color: #022537;background-color: #fff;">

                        @foreach ($meeting->invitations as $invitee)
                            <p style=" font-weight: bold; margin: 0.3rem;">
                                {{ $invitee->userable->name }}
                                <span style="font-weight: 500;">
                                    ({{ $invitee->userable->email }})
                                </span>
                            </p>
                        @endforeach
                        <table style="font-weight: bold; width: 100%; padding: 0;">
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
                <div style="padding: 1rem;">
                    <p style="font-weight: bold; margin: 0;font-size: 1vw; color: #022537 !important">Meeting
                        Information
                    </p>
                    <p style="margin-top: 3px;font-size: 1vw; color: #0225378A !important">Type Here The Meeting Info
                    </p>
                    <div
                        style="border: solid 1px #cccc; border-radius: 1.2rem; padding: 1rem; color: #022537; background-color: #fff;">
                        <table style="font-weight: bold; width: 100%; padding: 0;">
                            <tr>
                                <th style="text-align: start; vertical-align: baseline;width: 9px;">
                                    <p style="font-weight: 500; color:rgb(126,126,126);">
                                        {!! $meeting->minutes !!}
                                    </p>
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</html>
