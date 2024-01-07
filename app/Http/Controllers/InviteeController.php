<?php

namespace App\Http\Controllers;

use App\Services\InviteeService;
use App\Http\Requests\Invitee\CreateRequest;
use App\Http\Requests\Invitee\FilterRequest;
use App\Http\Requests\Invitee\UpdateRequest;

class InviteeController extends Controller
{
    public function __construct(private readonly InviteeService $InviteeService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(FilterRequest $request)
    {
        $data['Invitee'] = $this->InviteeService->list($request->getData());
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
        $data['Invitee'] = $this->InviteeService->create($request->getData());
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['Invitee'] = $this->InviteeService->show($id);
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
        $data['Invitee'] = $this->InviteeService->update($request->getData(), $id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->InviteeService->delete($id);
        if ($result) {
            $data['message'] = 'deleted successfully';
        } else {
            $data['message'] = 'deleted unSuccessfully';
        }
        return response()->json($data);
    }
}
