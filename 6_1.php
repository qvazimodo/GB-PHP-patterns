<?php
// Реализация паттерна "Наблюдатель"
abstract class Subject {
    abstract public function attach(Observer $observer);

    abstract public function detach(Observer $observer);

    abstract protected function notify();
}

class VacancyRegisterManager extends Subject {
    /** @var Observer[] */
    protected array $observers = [];

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        foreach($this->observers as $key => $item){
            if ($item == $observer ){
                unset($this->observers[$key]);
            }
        }

    }

    protected function notify(){
        foreach ($this->observers as $observer) {
            $observer->handle($this);
        }
    }

    public function vacancyRegister()
    {
        //
        $this->notify();
        //
        return true;
    }
}

interface Observer {
    public function handle($subject);
}

class User implements Observer {
    protected string $userName;
    protected string $userMail;
    protected int $userExp;

    /**
     * User constructor.
     * @param string $userName
     * @param string $userMail
     * @param $userExp
     */
    public function __construct(string $userName, string $userMail, $userExp)
    {
        $this->userName = $userName;
        $this->userMail = $userMail;
        $this->userExp = $userExp;
    }

    public function handle($subject)
    {
        mail($this->userMail,"",$subject);
    }

}

$vacancyManager = new VacancyRegisterManager();

$vacancyManager->attach(new User("Иван","123@erfg.ru",));




