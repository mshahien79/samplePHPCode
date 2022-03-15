<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Mail;

class NotifyPostCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $users = User::all();

        foreach($users as $user) {
           //Mail::to($user)->send('emails.post_created', $event->Announcement);
           $data = array('name'=>$user->email);
           //$data = $users;
           Mail::send(['text'=>'mail'], $data, function($message) {
              $message->to('mostafa.atef.shahien@gmail.com', 'Tutorials Point')->subject
                 ('Laravel Basic Testing Mail');
              $message->from('mostafa.atef.shahien@gmail.com','Poultry Borsa System');
           });
           echo "Basic Email Sent. Check your inbox.";
           //\Mail::to($user)->send('emails.post_created', $event->Announcement);
           //announcement_mail::build();
        }
    }
}
