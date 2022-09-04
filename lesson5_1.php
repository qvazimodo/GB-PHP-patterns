<?php
interface ISender{
    public function send();
}

abstract class SenderDecorator implements ISender{
    protected ISender $sender;

    /**
     * SenderDecorator constructor.
     * @param ISender $sender
     */
    public function __construct(ISender $sender)
    {
        $this->sender = $sender;
    }


}

class SenderEmail extends SenderDecorator{

    public function send()
    {
        // TODO: Implement send() method.
    }
}

class SenderSms extends SenderDecorator{

    public function send()
    {
        // TODO: Implement send() method.
    }
}

class SenderCN extends SenderDecorator{

    public function send()
    {
        // TODO: Implement send() method.
    }
}

$sender = new SenderCN(new SenderEmail(new SenderSms()));

$sender->send();

