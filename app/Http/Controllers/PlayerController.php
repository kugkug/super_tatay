<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'jersey_number' => 'required|integer|min:1|max:999',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('players', 'public');
            $data['photo'] = $photoPath;
        }

        $player = Player::create($data);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Player created successfully!',
                'player' => $player
            ]);
        }

        return redirect()->route('players.index')->with('success', 'Player created successfully!');
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
            'jersey_number' => 'required|integer|min:1|max:999',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($player->photo && Storage::disk('public')->exists($player->photo)) {
                Storage::disk('public')->delete($player->photo);
            }
            $photoPath = $request->file('photo')->store('players', 'public');
            $data['photo'] = $photoPath;
        }

        $player->update($data);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Player updated successfully!',
                'player' => $player
            ]);
        }

        return redirect()->route('players.index')->with('success', 'Player updated successfully!');
    }

    public function destroy(Player $player)
    {
        // Delete photo if exists
        if ($player->photo && Storage::disk('public')->exists($player->photo)) {
            Storage::disk('public')->delete($player->photo);
        }

        $player->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Player deleted successfully!'
            ]);
        }

        return redirect()->route('players.index')->with('success', 'Player deleted successfully!');
    }
}
