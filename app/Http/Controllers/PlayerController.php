<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::orderBy('created_at', 'desc')->get();
        return view('players.index', compact('players'));
    }

    public function create()
    {
        return view('players.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:150',
            'contact_number' => 'required|string|max:20',
            'jersey_number' => 'required|integer|min:1|max:999'
        ]);

        $data = $request->all();
        
        $player = Player::create($data);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Player created successfully!',
                'player' => $player
            ]);
        }

        return redirect()->route('players')->with('success', 'Player created successfully!');
    }

    public function show(Player $player)
    {
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'player' => $player
            ]);
        }
        return view('players.show', compact('player'));
    }

    public function edit(Player $player)
    {
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'player' => $player
            ]);
        }
        return view('players.edit', compact('player'));
    }

    public function update(Request $request, Player $player)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:150',
            'contact_number' => 'required|string|max:20',
            'jersey_number' => 'required|integer|min:1|max:999'
        ]);

        $data = $request->all();
        
        $player->update($data);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Player updated successfully!',
                'player' => $player
            ]);
        }

        return redirect()->route('players')->with('success', 'Player updated successfully!');
    }

    public function destroy(Player $player)
    {
        $player->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Player deleted successfully!'
            ]);
        }

        return redirect()->route('players')->with('success', 'Player deleted successfully!');
    }
}