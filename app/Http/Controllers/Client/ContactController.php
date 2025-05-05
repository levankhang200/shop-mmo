<?php


namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('client.contact');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ]);

        // Gửi email hoặc lưu DB tuỳ mục tiêu
        // Ví dụ log hoặc flash session
        return back()->with('success', 'Cảm ơn bạn đã liên hệ, chúng tôi sẽ phản hồi sớm!');
    }
}
