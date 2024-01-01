<?php

namespace App\Services;

use App\DTOs\CreateRoomDTO;
use App\Models\Room;

class RoomService
{

    public function create(CreateRoomDTO $data): Room
    {
        return Room::create($data->toArray());
    }
}
