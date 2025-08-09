<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $userId = $this->route('id'); // Assuming you are using route model binding

        return [
            'name'              => 'required',
            'email'             => 'required|email|unique:users,email,' . $userId,
            'current_password'  => 'required', // Just require it for now
            'password'          => 'nullable|min:6|confirmed', // Make it nullable if not changing
        ];
    }

    /**
     * Validate the current password.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function prepareForValidation()
    {
        $userId = $this->route('id'); // Get the user ID from the route
        $user = User::find($userId); // Find the user by ID

        // Check if the user exists
        if (!$user) {
            throw ValidationException::withMessages([
                'current_password' => ['User not found.'],
            ]);
        }

        // Check if the current password is correct
        if ($this->filled('current_password') && !Hash::check($this->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['The provided password does not match the current password.'],
            ]);
        }
    }
}
