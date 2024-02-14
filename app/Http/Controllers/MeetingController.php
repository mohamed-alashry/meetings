<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Meeting;
use App\Services\MeetingService;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\Meeting\CreateRequest;
use App\Http\Requests\Meeting\FilterRequest;
use App\Http\Requests\Meeting\InviteRequest;
use App\Http\Requests\Meeting\UpdateRequest;

class MeetingController extends Controller
{
    public function __construct(private readonly MeetingService $meetingService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function calendar_view(FilterRequest $request)
    {
        $view_days = false;
        $query = Meeting::query();
        if (request()->filled('room_id')) {
            $view_days = true;
            $query->where('room_id', request()->room_id);
        }
        if (auth()->id() != 1) {
            $query->where('user_id', auth()->id());
        }
        $meetings = $query->get()->pluck('event_json');

        return view('calendar_view', compact('meetings', 'view_days'));
    }
    /**
     * Display a listing of the resource.
     */
    public function card_view(FilterRequest $request)
    {
        if (auth()->id() == 1) {
            $meetings = Meeting::upcoming()->limit(30)->get()->groupBy('type_date');
        }else{
            $meetings = Meeting::upcoming()->where('user_id', auth()->id())->limit(30)->get()->groupBy('type_date');
        }
        return view('card_view', compact('meetings'));
    }



    /**
     * Display a listing of the resource.
     */
    public function index(FilterRequest $request)
    {
        $data['meetings'] = $this->meetingService->list($request->getData());
        if (request()->wantsJson()) {
            return response()->json($data);
        }

        return view('meetings', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $data['meeting'] = $this->meetingService->create($request->getData());
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $data['meeting'] = $this->meetingService->show($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $data['meeting'] = $this->meetingService->update($request->getData(), $id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->meetingService->delete($id);
        if ($result) {
            $data['message'] = 'deleted successfully';
        } else {
            $data['message'] = 'deleted unSuccessfully';
        }
        return response()->json($data);
    }

    public function invite(InviteRequest $request)
    {
        $data['meeting'] = $this->meetingService->invite($request->getData());
        return response()->json($data);
    }
}
