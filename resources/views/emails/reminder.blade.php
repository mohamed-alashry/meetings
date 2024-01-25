<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
</head>

<body style="font-family: sans-serif;">
    <div style="padding: 3rem 6rem;background-color: #F6F6F6">
        <div style="box-shadow: 0px 1px 9px 0px; border-radius: 1.2rem; width: 601px; height: 988px; margin: 0 auto">
            <div style="background-color: #022537; color: #fff; padding: 1%;border-radius: 1.2rem 1.2rem 0 0; ">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div style="width: 60%">
                        <h3>{{ $meeting->title }}</h3>
                        <p style="font-size: 14px; display: flex; align-items: center; gap: 6px;">
                            <img src="{{ asset('asset_mails/images') }}/calendar 1.png" alt="" srcset="">
                            23 Nov 2023, 04:00 PM
                        </p>
                        <p style="font-size: 14px; display: flex; align-items: center; gap: 6px;">
                            <img style="padding-right: 3px;" src="{{ asset('asset_mails/images') }}/Group.png" alt=""
                                srcset="">
                            Created By You
                        </p>
                        <p style="font-size: 14px; display: flex; align-items: center; gap: 6px;">
                            <img style="padding-right: 3px;" src="{{ asset('asset_mails/images') }}/hourglass 1.png"
                                alt="" srcset="">
                            Created By You
                        </p>
                    </div>
                    <div style="width: 35%">
                        <img src="{{ asset('asset_mails/images') }}/logo_light.png" width="188px"
                            class="img-fluid float-end" srcset="">
                    </div>

                </div>
            </div>
            <div>
                <div style="display: flex; justify-content: center; gap: 6px; padding: 1rem; background-color: #fff;">
                    <button type="button"
                        style="display: flex; align-items: center;justify-content: center; gap: 6px; padding: 0.8rem 0.6rem; border-radius: 1rem; font-weight: 700; background-color: #fff; box-shadow: 0px 1px 9px 0px;border: 0; width: 50%;">
                        <img src="{{ asset('asset_mails/images') }}/meet 1.png" alt="" srcset="">
                        Open in Google Meet
                    </button>
                    <button type="button"
                        style="display: flex; align-items: center;justify-content: center; gap: 6px; padding: 0.8rem 0.6rem; border-radius: 1rem; background-color: #5E1042; box-shadow: 0px 1px 9px 0px;border: 0; width: 50%; font-weight: 700; color: #fff;">
                        <img src="{{ asset('asset_mails/images') }}/appointment 1.png" alt="" srcset="">
                        Add to your Calenradr
                    </button>
                </div>
                <div style="padding: 1rem; font-size: 14px; background-color: #fff;">
                    <p style="font-weight: 700; margin: 0;">Invited Persons</p>
                    <p style="margin-top: 3px;">Invited persons by email or Name</p>
                    <div
                        style="box-shadow: 0px 1px 9px 0px; border-radius: 1.2rem; padding: 1rem; color: #022537; background-color: #fff;">
                        <p style=" font-weight: 700;">
                            Remon Nabil
                            <span style="font-weight: 500;">
                                (Senior UX Designer)
                            </span>
                        </p>
                        <p style="font-weight: 700;">
                            apple.remo95@one.com.sa
                            <span style="font-weight: 500;">
                                (External Guest)
                            </span>
                        </p>
                        <p style="font-weight: 700;">
                            Obada Alseddig
                            <span style="font-weight: 500;">
                                (IT Manger)
                            </span>
                        </p>
                        <div style="font-weight: 700; display: flex; justify-content: space-between;">
                            <p style="margin-top: 0;">
                                mohamed@one.com.sa
                                <span style="font-weight: 500;">
                                    (External Guest)
                                </span>
                            </p>
                            <p style="margin-top: 0;display: flex;gap: 6px;align-items: center;">
                                04 Persons
                                <img src="{{ asset('asset_mails/images') }}/group 1.png" alt="" srcset="">
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <div style="padding: 1rem; font-size: 14px; background-color: #fff;">
                    <p style="font-weight: 700; margin: 0;">Meeting Information</p>
                    <p style="margin-top: 3px;">Type here the meeting info</p>
                    <div
                        style="box-shadow: 0px 1px 9px 0px; border-radius: 1.2rem; padding: 1rem; color: #022537; display: flex; gap: 6px; background-color: #fff;">
                        <span>
                            <img src="{{ asset('asset_mails/images') }}/phone_forwarded.png" alt="" srcset="">
                        </span>
                        <span>
                            <p style="font-weight: 500; margin-top: 0%;">
                                Morbi ut massa in mauris semper euismod a ut mi.
                                Duis mattis massa sit amet ante vestibulum, quis laoreet augue auctor.
                                Vivamus non odio eget eros accumsan ultrices.
                            </p>
                            <p style="font-weight: 500;">
                                Vivamus sed eros ultricies, commodo dolor quis, vulputate mi.
                                Nunc quis lacus rhoncus, fermentum orci vel, venenatis magna.
                            </p>
                        </span>
                    </div>
                </div>
                <hr>
                <div
                    style="font-size: 14px; background-image: url({{ asset('asset_mails/images') }}/Frame-end-footer.png); background-repeat: no-repeat; background-position: right; background-size: 45%; border-radius: 0 0 19px 0;">
                    <div style="padding: 1rem;padding-bottom: 30px;">
                        <p style="font-weight: 700; margin: 0;">Meeting Information</p>
                        <p style="margin-top: 3px;">Type here the meeting info</p>
                        <div
                            style="display: flex; justify-content: center; gap: 25px; align-items: center;padding-bottom: 30px;">
                            <div
                                style="box-shadow: 0px 1px 9px 0px; border-radius: 1.2rem; padding: 1rem; color: #022537; width: 50%;height: fit-content; background-color: #fff;">
                                <div style="display: flex; gap: 6px; ">
                                    <span>
                                        <img src="{{ asset('asset_mails/images') }}/wi-fi 1.png" alt="" srcset="">
                                    </span>
                                    <span>
                                        <p style="font-weight: 500; margin: 3px; color: rgb(126, 126, 126);">
                                            Guest Wifi
                                        </p>
                                        <p style="font-weight: 500; margin: 3px;">
                                            Network SSID: <span style="font-weight: 700;">OC</span>
                                        </p>
                                        <p style="font-weight: 500; margin: 3px;">
                                            Password: <span style="font-weight: 700;">Guest 2024</span>
                                        </p>
                                    </span>
                                </div>
                                <div style="display: flex; gap: 6px; ">
                                    <span>
                                        <img src="{{ asset('asset_mails/images') }}/television 1.png" alt="" srcset="">
                                    </span>
                                    <span>
                                        <p style="font-weight: 500; margin: 3px; color: rgb(126, 126, 126);">
                                            Have a TV with HDMI or Wifi connection
                                        </p>
                                    </span>
                                </div>
                                <div style="display: flex; gap: 6px; ">
                                    <span>
                                        <img src="{{ asset('asset_mails/images') }}/online-meeting 1.png" alt=""
                                            srcset="">
                                    </span>
                                    <span>
                                        <p style="font-weight: 500; margin: 3px; color: rgb(126, 126, 126);">
                                            Online Meeting setup (360 Camera & Mics)
                                        </p>
                                    </span>
                                </div>

                            </div>
                            <div
                                style="box-shadow: 0px 1px 9px 0px; border-radius: 1.2rem; padding: 1rem; color: #022537; width: 50%;height: fit-content;background-color: #fff; ">
                                <div style="display: flex; gap: 6px; margin-bottom: 0.5rem;">
                                    <span>
                                        <img src="{{ asset('asset_mails/images') }}/notes 1.png" alt="" srcset="">
                                    </span>
                                    <span>
                                        <p style="font-weight: 500; margin: 3px;color: rgb(126, 126, 126);">
                                            Guest ID:
                                            <span style="font-weight: 700;color: #022537;">20213</span>
                                        </p>
                                    </span>
                                </div>
                                <div style="display: flex; gap: 6px; margin-bottom: 0.5rem;">
                                    <span>
                                        <img src="{{ asset('asset_mails/images') }}/notes 1.png" alt="" srcset="">
                                    </span>
                                    <span>
                                        <p style="font-weight: 500; margin: 3px;color: rgb(126, 126, 126);">
                                            Location on Maps:
                                            <a href="#" style="font-weight: 700;color: #5E1042;">Click here</a>
                                        </p>
                                    </span>
                                </div>
                                <div style="display: flex; gap: 6px;">
                                    <span>
                                        <img src="{{ asset('asset_mails/images') }}/phone_forwarded.png" alt=""
                                            srcset="">
                                    </span>
                                    <span>
                                        <p style="font-weight: 500; margin: 3px;color: rgb(126, 126, 126);">
                                            Location on Maps:
                                            <a href="#" style="font-weight: 700;color: #5E1042;">Click here</a>
                                        </p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
