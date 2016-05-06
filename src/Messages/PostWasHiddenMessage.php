<?php namespace Moay\Notify\Messages;

use Moay\Notify\Messages\Message;

class PostWasHiddenMessage extends Message
{
    public function __construct($post)
    {
        $this->post = $post;
        $this->prepareMessage();
    }

    /**
     * Prepares the message which should be sent to the Connectors
     * @return void
     */
    public function prepareMessage()
    {
        $this->title = 'Post hidden';
        $this->message = '@'.$this->post->user->username.'\'s post was hidden from discussion #' . $this->post->discussion->id . ' ('.$this->post->discussion->title.')';
        $this->short = 'Post hidden';
        $this->color = 'orange';

        $this->addLinkToParse('@'.$this->post->user->username, app('flarum.config')['url']."/u/{$this->post->user->id}");
        $this->addLinkToParse('discussion #'.$this->post->discussion->id, app('flarum.config')['url']."/d/{$this->post->discussion->id}");
    }
}
