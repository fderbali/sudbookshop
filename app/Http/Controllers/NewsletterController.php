<?php namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Http\Requests\NewsletterRequest;
use Illuminate\Support\Facades\Redirect;

class NewsletterController extends Controller {

    public function postFormNewsletter(NewsletterRequest $request)
    {
            $newsletter = new Newsletter;
            $newsletter->first_name = $request->input('first_name');
            $newsletter->last_name = $request->input('last_name');
            $newsletter->email = $request->input('email');
            $newsletter->save();
            return Redirect::to('/')->with('subscibesuccess', 'Subscribed successfully');
    }
}

