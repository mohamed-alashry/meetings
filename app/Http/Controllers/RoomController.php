<?php

namespace App\Http\Controllers;

use App\Services\RoomService;
use App\Http\Requests\Room\CreateRequest;
use App\Http\Requests\Room\UpdateRequest;
use App\Http\Requests\Meeting\FilterRequest as FilterMeetingRequest;
use App\Http\Requests\Room\FilterRequest as FilterRoomRequest;

class RoomController extends Controller
{
    public function __construct(private readonly RoomService $roomService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function monitor(FilterMeetingRequest $request)
    {
        if (request()->wantsJson()) {
            $data['rooms'] = $this->roomService->monitor($request->getData());
            return response()->json($data);
        }
        return view('monitor');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(FilterRoomRequest $request)
    {
        $data['rooms'] = $this->roomService->list($request->getData());
        if (request()->wantsJson()) {
            return response()->json($data);
        }

        return view('rooms');
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
        $data['room'] = $this->roomService->create($request->getData());
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['room'] = $this->roomService->show($id);
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
        $data['room'] = $this->roomService->update($request->getData(), $id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->roomService->delete($id);
        if ($result) {
            $data['message'] = 'deleted successfully';
        } else {
            $data['message'] = 'deleted unSuccessfully';
        }
        return response()->json($data);
    }
}
