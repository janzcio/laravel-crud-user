<?php

namespace App\Http\Controllers\api;

use App\Services\UserService;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\UpdateUserRequest;

/**
 * Class UserController
 *
 * Handles user-related operations including authentication,
 * user creation, retrieval, updating, and deletion.
 *
 * @package App\Http\Controllers\api
 */
class UserController extends Controller
{
    /**
     * UserController constructor.
     *
     * @param UserService $userService
     */
    public function __construct(private UserService $userService)
    {}

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = $this->userService->getAllUsers();
        return success(
            'Users retrieved successfully',
            $users
        );
    }

    /**
     * Store a newly created user in storage.
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $request)
    {
        $user = $this->userService->createUser($request->validated());
        return success(
            'User created successfully',
            $user,
            201
        );
    }

    /**
     * Display the specified user.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = $this->userService->findUserOrFail($id);
        return success(
            'User retrieved successfully',
            $user
        );
    }

    /**
     * Update the specified user in storage.
     *
     * @param UpdateUserRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user        = $this->userService->findUserOrFail($id);
        $updatedUser = $this->userService->updateUser($user, $request->validated());
        return success(
            'User updated successfully',
            $updatedUser
        );
    }

    /**
     * Remove the specified user from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $user = $this->userService->findUserOrFail($id);
        $this->userService->deleteUser($user);
        return success('User deleted successfully');
    }

    /**
     * Handle user login.
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $loginResponse = $this->userService->login($request);

        if (isset($loginResponse['status']) && $loginResponse['status'] === 401) {
            return error(
                'Unauthorized',
                $loginResponse['message'] ?? 'Invalid credentials',
                401
            );
        }

        return success(
            'Login successful',
            $loginResponse
        );
    }

    /**
     * Handle user logout.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return success('Logout successful');
    }
}
