<?php

namespace App\Livewire\Meetings;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Invitee;
use Livewire\Component;
use Livewire\Attributes\On;
use App\DTOs\Meeting\CreateDTO;
use App\Services\MeetingService;

use Illuminate\Support\Collection;
use function Laravel\Prompts\alert;
use App\Http\Requests\Meeting\CreateRequest;
use Illuminate\Validation\ValidationException;

class Create extends Component
{
    private MeetingService $meetingService;

    public int $room_id;
    public string $title;
    public ?string $brief;
    public string $description;
    public ?string $start_date;
    public ?string $start_time;
    public ?string $end_time;
    public ?int $repeatable;
    public ?string $end_date;
    public int $status;
    public bool $openCreateModal = false;
    public Collection $rooms;
    public Collection $roomFeatures;
    public array $selectedRoom;
    public Collection $invitees;
    public Collection $invitedUsers;
    public string $inviteeEmail;
    public $in_home = false;
    public $send_user_location = false;
    public $send_room_attach = false;
    public $send_room_properties = false;
    public ?int $reminder_time;

    public array $times = [];
    public $room_media = [];

    public ?string $meeting_url = null;


    public function boot(MeetingService $meetingService)
    {
        $this->meetingService = $meetingService;
    }

    protected function rules(): array
    {
        return (new CreateRequest())->rules();
    }

    function mount($room_id = 1)
    {
        $this->status = 1;
        $this->room_id = $room_id;
        $this->start_date = '';
        $this->start_time = '';
        $this->end_time = '';
        $this->inviteeEmail = '';
        $this->repeatable = 1;
        $this->reminder_time = null;
        $this->rooms = $this->meetingService->getRooms($this->start_date, $this->start_time);
        $this->invitees = collect();
        $this->invitedUsers = collect();
        $this->roomFeatures = $this->meetingService->getRoomFeatures($this->room_id);

        $this->times = $this->meetingService->getTimesArray();
        if ($room_id) {
            $this->changeRoom($this->room_id);
        }
    }

    public function updated()
    {
        $this->roomFeatures = $this->meetingService->getRoomFeatures($this->room_id);
        $this->rooms = $this->meetingService->getRooms($this->start_date, $this->start_time, $this->end_time);
        $this->invitedUsers = Invitee::whereIn('id', $this->invitedUsers->pluck('id'))->get();

        if ($this->inviteeEmail) {
            $this->invitees = Invitee::where('email', 'like', '%' . $this->inviteeEmail . '%')->whereNotIn('id', $this->invitedUsers->pluck('id'))
                ->where(function ($query) {
                    $query->where('user_id', auth()->id())
                        ->orWhere('user_id', null);
                })->get();
        } else {
            $this->invitees = collect();
        }
        if ($this->room_id) {
            $this->changeRoom($this->room_id);
        }
    }

    public function store()
    {
        $validated = $this->validate();

        $meetingStart = Carbon::parse("{$this->start_date} {$this->start_time}");
        if ($meetingStart->isPast()) {
            throw ValidationException::withMessages([
                'start_time' => ['The start time field must be a date after now.'],
            ]);
        }

        $freeRoom = $this->meetingService->getRooms($this->start_date, $this->start_time, $this->end_time)->pluck('id')->toArray();
        if (!in_array($this->room_id, $freeRoom)) {
            throw ValidationException::withMessages([
                'start_time' => ['This period has meeting. please select another time.'],
            ]);
        }

        $validated['user_id'] = auth()->id();
        $meeting = $this->meetingService->create(CreateDTO::from($validated), $this->invitedUsers);

        session()->flash('success', 'Meeting booked successfully');

        $this->meeting_url = $meeting->generateGoogleCalendarLink();

        // $this->redirect(route('meetings.card_view'), true);
    }

    public function openGoogleCalendar()
    {
        $this->dispatch('openGoogleCalendar', $this->meeting_url);
    }

    #[On('toggleCreateModal')]
    public function toggleCreateModal()
    {
        $this->openCreateModal = !$this->openCreateModal;
    }
    #[On('changeRoom')]
    public function changeRoom($room_id)
    {
        $this->room_id = $room_id;

        $this->room_media = [];
        $room = Room::find($this->room_id);
        if ($room) {
            $this->room_media = $room->media;
        }
    }



    public function addInvitee(Invitee $invitee)
    {
        $this->invitedUsers->push($invitee);
        $this->invitees = Invitee::where('email', 'like', '%' . $this->inviteeEmail . '%')->whereNotIn('id', $this->invitedUsers->pluck('id'))
            ->where(function ($query) {
                $query->where('user_id', auth()->id())
                    ->orWhere('user_id', null);
            })->get();
        $this->inviteeEmail = '';
    }

    public function addNewInvitee()
    {
        $this->validate(['inviteeEmail' => 'required|email']);
        $newInvitee = Invitee::create(['email' => $this->inviteeEmail, 'user_id' => auth()->id()]);
        $this->invitedUsers->push($newInvitee);
        $this->invitees = Invitee::where('email', 'like', '%' . $this->inviteeEmail . '%')->whereNotIn('id', $this->invitedUsers->pluck('id'))
            ->where(function ($query) {
                $query->where('user_id', auth()->id())
                    ->orWhere('user_id', null);
            })->get();
        $this->inviteeEmail = '';
    }

    public function removeInvitee(Invitee $invitee)
    {
        // remove the invitee from the collection
        $this->invitedUsers->forget($this->invitedUsers->search($invitee));
        $this->invitees = Invitee::where('email', 'like', '%' . $this->inviteeEmail . '%')->whereNotIn('id', $this->invitedUsers->pluck('id'))->get();
    }

    #[On('passFilters')]
    public function passFilters($start_date, $start_time, $end_time, $repeatable)
    {
        $this->start_date = $start_date;
        $this->start_time = $start_time;
        $this->end_time   = $end_time;
        $this->repeatable = $repeatable;
    }

    public function toggleSendUserLocation()
    {
        $this->send_user_location = !$this->send_user_location;
    }

    public function toggleSendRoomAttach()
    {
        $this->send_room_attach = !$this->send_room_attach;
    }

    public function toggleSendRoomProperties()
    {
        $this->send_room_properties = !$this->send_room_properties;
    }



    public function render()
    {

        return view('livewire.meetings.create');
    }
}
