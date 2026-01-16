<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Mail\NewsletterMail;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function newsletter()
    {
        $newsletters = Newsletter::get();
        return view('administrator.pages.newsletter', compact('newsletters'));
    }

    public function newsletter_send(Request $request)
    {
        $data = $request->all();

        $newsletters = Newsletter::pluck('email');

        foreach ($newsletters as $recipient) {
            Mail::to($recipient)->send(new NewsletterMail($data));
        }

        return back()->with('success', 'Message sent successfully');
    }

    public function newsletter_destroy($id)
    {
        $newsletter = Newsletter::where('id', $id)->firstOrFail();

        if ($newsletter) {
            return $newsletter->delete()
                ? back()->with('success', 'User deleted successfully')
                : back()->with('error', 'Error Deleting User!, Try again later');
        } else {
            return back()->with('error', 'Date not found');
        }
    }
}
