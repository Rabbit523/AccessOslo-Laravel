<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterMail;

use Newsletter;
use Alert;
class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        if (isset($request->email)) {
            if ( ! Newsletter::isSubscribed($request->email) ) {
                Newsletter::subscribe($request->email);
                $message = "You have successfully been registered to our newsletter. Stay tuned!";
                Mail::to($request->email)->send(new NewsletterMail($message));
                Alert::success('You have successfully applied for our Newsletter.')->autoclose(5000);
                return redirect()->back();
            }
            $message = "This email is already registered to our newsletter.";
            Mail::to($request->email)->send(new NewsletterMail($message));
            Alert::info('Sorry', 'This email address had already applied for our Newsletter.')->autoclose(5000);
        } else {
            Alert::error('Whoops', 'Please enter your email address.')->autoclose(5000);
        }
        return redirect()->back();   
    }
}
