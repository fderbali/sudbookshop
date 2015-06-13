<?php

namespace App\Repositories;
use App\Models\Newsletter;
/**
 * Data manager for newsletters
 *
 * @author Fahmi
 */
class NewsletterRepository implements NewsletterRepositoryInterface{
    protected $newsletter;
    public function __construct(Newsletter $newsletter) {
        $this->newsletter = $newsletter;
    }
    
    public function save($input) {
        $newsletter = new $this->newsletter;
        $newsletter->first_name  = $input['first_name'];
        $newsletter->last_name = $input['last_name'];
        $newsletter->email = $input['email'];
        $newsletter->save();
    }
}
