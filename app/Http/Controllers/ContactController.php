<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;
use App\Models\Message;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'recipient' => 'required|in:admin,petugas',
            'message' => 'required|string|max:1000',
        ]);

        // Save message to database
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'recipient' => $request->recipient,
            'message' => $request->message,
            'is_read' => false,
        ]);

        // You can also send email notification here if needed
        // Mail::to($recipient == 'admin' ? 'admin@pustakadigital.id' : 'petugas@pustakadigital.id')
        //     ->send(new ContactMessage($request->all()));

        return back()->with('success', 'Pesan Anda telah berhasil dikirim! Kami akan segera merespons.');
    }
}