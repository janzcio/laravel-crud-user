<?php

namespace App\Repositories;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 *
 * Handles data persistence for user-related operations,
 * including creating, updating, deleting, and retrieving users.
 *
 * @package App\Repositories
 */
class UserRepository
{
    /**
     * Retrieve all users.
     *
     * @return \Illuminate\Database\Eloquent\Collection|User[]
     */
    public function getAll()
    {
        return User::all();
    }

    /**
     * Create a new user.
     *
     * @param array $data
     * @return User
     */
    public function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Update an existing user.
     *
     * @param User $user
     * @param array $data
     * @return User
     */
    public function update(User $user, array $data)
    {
        $user->name  = $data['name'];
        $user->email = $data['email'];

        if (isset($data['password']) && !empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        return $user;
    }

    /**
     * Delete a user.
     *
     * @param User $user
     * @return void
     */
    public function delete(User $user)
    {
        $user->delete();
    }

    /**
     * Find a user by ID or fail.
     *
     * @param int $id
     * @return User
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOrFail($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Handle user login.
     *
     * @param LoginRequest $request
     * @return array
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();
            // Create a token for the user
            $token = $user->createToken('LaravelCrudUser')->plainTextToken;

            return [
                'user'  => $user,
                'token' => $token, // Return the token
            ];
        }

        return [
            'message' => 'Invalid credentials',
            'status'  => 401,
        ];
    }
}
