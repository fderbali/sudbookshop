<?php namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Http\Requests\NewsletterRequest;
use App\Repositories\NewsletterRepositoryInterface;
use Illuminate\Support\Facades\Redirect;

class NewsletterController extends Controller {

    public function postFormNewsletter(
            NewsletterRequest $request,
            NewsletterRepositoryInterface $newsletterRepository
            )
    {
        $newsletterRepository->save($request->all());
        return Redirect::to('/')->with('subscibesuccess', 'Subscribed successfully');
    }
}

