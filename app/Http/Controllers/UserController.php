<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        User::where('id', auth()->user()->id)->update(
            [
                'name' => $request->input('name'),
            ]
        );

        return response()->json(
            [
                'message' => 'User atualizado com sucesso!',
            ]
        );
    }
}
