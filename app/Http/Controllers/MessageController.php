<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->latest()->get();
        return view('messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $message = new Message();
        $message->content = $validatedData['content'];
        $message->user_id = Auth::id();
        $message->save();

        return redirect()->back()->with('success', 'Mensaje enviado correctamente.');
    }

    public function destroy(Message $message)
    {
        if (Auth::id() == $message->user_id) {
            $message->delete();
            return redirect()->back()->with('success', 'Mensaje eliminado correctamente.');
        }
        return redirect()->back()->with('error', 'No tienes permiso para eliminar este mensaje.');
    }
}