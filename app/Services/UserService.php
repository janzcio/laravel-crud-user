<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Repositories\UserRepository;

/**
 * Class UserService
 *
 * Handles user-related business logic and interacts with the UserRepository
 * for data persistence.
 *
 * @package App\Services
 */
class UserService
{
    /**
     * UserService constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(protected UserRepository $userRepository)
    {
    }

    /**
     * Retrieve all users.
     *
     * @return mixed
     */
    public function getAllUsers()
    {
        return $this->userRepository->getAll();
    }

    /**
     * Create a new user.
     *
     * @param array $data
     * @return mixed
     */
    public function createUser(array $data)
    {
        return $this->userRepository->create($data);
    }

    /**
     * Update an existing user.
     *
     * @param mixed $user
     * @param array $data
     * @return mixed
     */
    public function updateUser($user, array $data)
    {
        return $this->userRepository->update($user, $data);
    }

    /**
     * Delete a user.
     *
     * @param mixed $user
     * @return void
     */
    public function deleteUser($user)
    {
        $this->userRepository->delete($user);
    }

    /**
     * Find a user by ID or fail.
     *
     * @param int $id
     * @return mixed
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findUserOrFail($id)
    {
        return $this->userRepository->findOrFail($id);
    }

    /**
     * Handle user login.
     *
     * @param LoginRequest $request
     * @return mixed
     */
    public function login(LoginRequest $request)
    {
        return $this->userRepository->login($request);
    }
}
