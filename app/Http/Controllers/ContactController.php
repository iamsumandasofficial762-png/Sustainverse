<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function index() {
        return view('about.contact-us');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $contact = Contact::create($validated);

        try {
            Mail::to(env('CONTACT_MAIL_TO', config('mail.from.address')))
                ->send(new ContactFormMail($contact));
        } catch (Throwable $exception) {
            Log::error('Contact form mail failed.', [
                'contact_id' => $contact->id,
                'error' => $exception->getMessage(),
            ]);

            return back()->with('success', 'Thank you! Your message has been submitted successfully.');
        }

        return back()->with('success', 'Thank you! Your message has been submitted successfully.');
    }
}
