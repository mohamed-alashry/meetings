<?php

namespace App\Services;

use App\Models\Room;
use App\DTOs\CreateRoomDTO;
use App\Services\RoomService;

class CreateRoomUseCase
{
    public function __construct(private readonly RoomService $roomService)
    {
    }

    public function create(CreateRoomDTO $data): Room
    {
        return $this->roomService->create($data);
    }
}
