<?php

namespace App\DTOs\Meeting;


use DateTime;
use Spatie\LaravelData\Data;


class InviteDTO extends Data
{
    public int $meeting_id;
    public int $userable_id;
    public string $userable_type;
    public int $type;
    public int $status;
}
