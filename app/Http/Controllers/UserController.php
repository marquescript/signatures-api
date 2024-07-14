<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{

    public function __construct(private UserService $userService)
    {}

    public function store(UserRequest $request)
    {
        $user = $this->userService->create($request->all());
        return response()->json(new UserResource($user), 201);
    }

    public function show(string $id)
    {
        $user = $this->userService->find($id);
        return response()->json(new UserResource($user), 200);
    }

    public function update(Request $request, string $id)
    {
        $user = $this->userService->update($id, $request->all());
        return response()->json(new UserResource($user), 200);
    }

    public function destroy(string $id)
    {
        $this->userService->delete($id);
        return response()->json(null, 203);
    }
}
