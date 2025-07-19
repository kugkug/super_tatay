<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserInfoController extends Controller
{
    public function create()
    {
        return view('userinfo.create');
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
                'message' => 'Information submitted successfully! Thank you for your submission.',
                'userInfo' => $player
            ]);
        }

        return redirect()->route('userinfo.create')->with('success', 'Information submitted successfully! Thank you for your submission.');
    }
} 