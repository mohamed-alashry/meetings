<div class="row">
    <div class="col-12">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="line-bookings row mb-3 px-1 g-3">
            <span class="col-xl-10 col-lg-8 col-md-12 col-sm-12">
                <h5 class="card-title">Room Managment</h5>
                <p class="card-text">Add or Edit Rooms</p>
            </span>
            @if (in_array('create_room', $permissions))
            <livewire-rooms.create :createModal key='create' />
            @endif
            @if ($updateModal && in_array('update_room', $permissions))
            <livewire-rooms.edit :room="$room" key='{{ $room->id }}' />
            @endif
        </div>
    </div>
    <div class="col-12 table-responsive-lg">
        <table class="table rounded-4 shadow">
            <thead class="table-dark rounded-top-4">
                <tr class="border-white border-opacity-10 text-center">
                    <th class="rounded-top-4 border-1 border-start-0 rounded-end-0 py-3" scope="col">
                        Room ID
                    </th>
                    <th class="py-3 border-1" scope="col">Room Name</th>
                    <th class="py-3 border-1" scope="col">Room Capacity</th>
                    <th class="py-3 border-1" scope="col">Date Added</th>
                    <th class="rounded-top-4 rounded-start-0 py-3" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($rooms as $room)
                @if ($loop->last)
                <tr class="end-line-tebal">
                    <td class="align-middle border-1 border-bottom-0 border-start-0 rounded-bottom-4 rounded-end-0"
                        scope="col">
                        {{ $room->id }}
                    </td>
                    <td class="align-middle border-1 border-bottom-0" scope="col">
                        {{ $room->name }}
                    </td>
                    <td class="align-middle border-1 border-bottom-0" scope="col">
                        {{ $room->capacity }} Person
                    </td>
                    <td class="align-middle border-1 border-bottom-0" scope="col">
                        {{ $room->created_at->format('d M Y') }}
                    </td>
                    <td class="align-middle border-1 border-bottom-0 border-end-0 rounded-bottom-4 rounded-start-0"
                        scope="col">
                        @if (in_array('read_meeting', $permissions))
                        <a href="{{ route('meetings.calendar_view').'?room_id='.$room->id }}"
                            wire:confirm="Are you sure you want to delete this rooms?"
                            class="btn fw-bold bg-white m-1 shadow-sm btn-color-2">
                            <i class="fa-solid fa-calendar-days"></i>
                            Calendar
                        </a>
                        @endif
                        @if (in_array('delete_room', $permissions))
                        <button type="button" wire:click="deleteRoom({{ $room->id }})"
                            wire:confirm="Are you sure you want to delete this rooms?"
                            class="btn fw-bold bg-white m-1 shadow-sm btn-color-2">
                            Delete
                        </button>
                        @endif
                        @if (in_array('update_room', $permissions))
                        <button type="button" class="btn text-white fw-bold m-1 shadow-sm btn-bg-color-2"
                            wire:click="editRoom({{ $room->id }})">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Edit
                        </button>
                        @endif
                    </td>
                </tr>
                @else
                <tr>
                    <td class="align-middle border-1 border-start-0 " scope="row">
                        {{ $room->id }}
                    </td>
                    <td class="align-middle border-1" scope="col">
                        {{ $room->name }}
                    </td>
                    <td class="align-middle border-1" scope="col">
                        {{ $room->capacity }} Person
                    </td>
                    <td class="align-middle border-1" scope="col">
                        {{ $room->created_at->format('d M Y') }}
                    </td>
                    <td class="align-middle border-1 border-end-0" scope="col">
                        @if (in_array('view_meetings', $permissions))
                        <a href="{{ route('meetings.calendar_view', $room->id).'?room_id='.$room->id }}"
                            wire:confirm="Are you sure you want to delete this rooms?"
                            class="btn fw-bold bg-white m-1 shadow-sm btn-color-2">
                            <i class="fa-solid fa-calendar-days"></i>
                            Calendar
                        </a>
                        @endif
                        @if (in_array('delete_room', $permissions))
                        <button type="button" wire:click="deleteRoom({{ $room->id }})"
                            wire:confirm="Are you sure you want to delete this rooms?"
                            class="btn fw-bold bg-white m-1 shadow-sm btn-color-2">
                            Delete
                        </button>
                        @endif
                        @if (in_array('update_room', $permissions))
                        <button type="button" class="btn text-white fw-bold m-1 shadow-sm btn-bg-color-2"
                            wire:click="editRoom({{ $room->id }})">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Edit
                        </button>
                        @endif
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
