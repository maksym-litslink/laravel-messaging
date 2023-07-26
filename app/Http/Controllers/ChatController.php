<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(User $user)
    {
        $messages = Message::where(function ($query) use ($user) {
            $query->where('from_user_id', Auth::id());
            $query->where('to_user_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('from_user_id', $user->id);
            $query->where('to_user_id', Auth::id());
        })->get();
        return view('chat.index', compact('user', 'messages'));
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'message' => 'required'
        ]);

        Message::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $user->id,
            'message' => $request->message,
        ]);

        return back();
    }

    public function destroy(Message $message)
    {
        if (Auth::id() !== $message->from_user_id) {
            return redirect()->back()->with('error', 'You are not authorized to delete this message.');
        }

        $message->delete();

        return redirect()->back()->with('success', 'Message deleted successfully.');
    }
}
