<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $validated['password'] = isset($validated['password']) ? Hash::make($validated['password']) : null;
        if (!isset($validated['password']))
            unset($validated['password']);

        try {
            $user->update($validated);
        } catch (Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('dashboard.index');
        }

        $request->session()->flash('success', 'Changes successfully saved!');
        return redirect()->route('dashboard.index');
    }
}