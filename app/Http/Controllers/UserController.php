<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\FilterRequest;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    public function __construct(private readonly UserService $UserService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(FilterRequest $request)
    {
        $data['User'] = $this->UserService->list($request->getData());
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
        $data['User'] = $this->UserService->create($request->getData());
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['User'] = $this->UserService->show($id);
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
        $data['User'] = $this->UserService->update($request->getData(), $id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->UserService->delete($id);
        if ($result) {
            $data['message'] = 'deleted successfully';
        } else {
            $data['message'] = 'deleted unSuccessfully';
        }
        return response()->json($data);
    }
}
