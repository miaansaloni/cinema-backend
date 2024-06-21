<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function index()
    // {
    //     return User::all();
    // }

    public function index()
    {
        $users = User::with('reservations')->get();
        return response()->json($users);
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'birthday' => 'required|date',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:30',
            'address' => 'required|string',
            // 'user_type' => 'required|string|max:20',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            // 'user_type' => $request->user_type,
        ]);

        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }


    // public function edit(User $user)
    // {
    //     return view('users.edit', compact('user'));
    // }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => 'sometimes|string|max:50',
            'last_name' => 'sometimes|string|max:50',
            'birthday' => 'sometimes|date',
            'email' => 'sometimes|string|email|max:100|unique:users,email,' . $id,
            'password' => 'sometimes|string|min:8',
            'phone' => 'sometimes|string|max:30',
            'address' => 'sometimes|string',
            // 'user_type' => 'sometimes|string|max:20',
        ]);

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->update($request->except('password'));

        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(null, 204);
    }

    public function getUserTickets()
    {
        // Ottieni l'utente loggato
        $user = Auth::user();

        // Recupera i ticket dell'utente loggato
        $tickets = Ticket::whereHas('reservation', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        return response()->json($tickets);
    }

    
}
