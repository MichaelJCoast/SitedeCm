<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected function update(UpdateProfileRequest $request)
    {
        auth()->user()->update($request->only('email', 'password'));

        if ($request->input('password')) {
            auth()->user()->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }

        return['message' => 'Dados atualizados com sucesso!'];
    }
}
