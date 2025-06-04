<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\User;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            // Admin bisa lihat semua pesan
            $messages = Message::with('repliedBy')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            $stats = [
                'total_messages' => Message::count(),
                'pending_messages' => Message::where('status', 'pending')->count(),
                'read_messages' => Message::where('status', 'read')->count(),
                'replied_messages' => Message::where('status', 'replied')->count(),
            ];
        } else {
            // Bidang hanya bisa lihat pesan untuk bidangnya
            $messages = Message::forBidang($user->bidang)
                ->with('repliedBy')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            $stats = [
                'total_messages' => Message::forBidang($user->bidang)->count(),
                'pending_messages' => Message::forBidang($user->bidang)->where('status', 'pending')->count(),
                'read_messages' => Message::forBidang($user->bidang)->where('status', 'read')->count(),
                'replied_messages' => Message::forBidang($user->bidang)->where('status', 'replied')->count(),
            ];
        }

        return view('dashboard.index', compact('messages', 'stats', 'user'));
    }

    public function show(Message $message)
    {
        $user = Auth::user();

        // Cek apakah user berhak melihat pesan ini
        if (!$user->isAdmin() && $message->tujuan !== $user->bidang) {
            abort(403, 'Anda tidak memiliki akses untuk melihat pesan ini.');
        }

        // Mark as read jika masih pending
        if ($message->status === 'pending') {
            $message->update(['status' => 'read']);
        }

        return view('dashboard.show', compact('message', 'user'));
    }

    public function reply(Request $request, Message $message)
    {
        $user = Auth::user();

        // Cek apakah user berhak membalas pesan ini
        if (!$user->isAdmin() && $message->tujuan !== $user->bidang) {
            abort(403, 'Anda tidak memiliki akses untuk membalas pesan ini.');
        }

        $request->validate([
            'reply_message' => 'required|string|min:10',
        ]);

        $message->update([
            'status' => 'replied',
            'reply_message' => $request->reply_message,
            'replied_by' => $user->id,
            'replied_at' => now(),
        ]);

        return redirect()->route('dashboard.show', $message)
            ->with('success', 'Balasan berhasil dikirim!');
    }
}
