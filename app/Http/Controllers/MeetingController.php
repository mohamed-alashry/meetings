<?php

namespace App\Http\Controllers;

use App\Services\MeetingService;
use App\Http\Requests\Meeting\CreateRequest;
use App\Http\Requests\Meeting\FilterRequest;
use App\Http\Requests\Meeting\UpdateRequest;

class MeetingController extends Controller
{
    public function __construct(private readonly MeetingService $meetingService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(FilterRequest $request)
    {
        $data['meeting'] = $this->meetingService->list($request->getData());
        return response()->json($data);
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
    public function show(string $id)
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
}
