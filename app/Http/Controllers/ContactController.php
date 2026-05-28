<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactQuery;
use App\Mail\ContactSubmissionMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle the contact query submission.
     */
    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'mobile' => ['required', 'string', 'max:20'],
            'ihsid' => ['nullable', 'string', 'max:50'],
            'query_for' => ['required', 'string', 'max:2000'],
        ]);

        $contactQuery = ContactQuery::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'mobile' => $validated['mobile'],
            'ihsid' => $validated['ihsid'] ?? null,
            'query_for' => $validated['query_for'],
        ]);

        Mail::to('dv63829@gmail.com')->send(new ContactSubmissionMail($contactQuery));

        return back()->with('success', 'Your inquiry has been submitted successfully! We will get back to you soon.');
    }
}
