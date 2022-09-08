<?php
//Реализация паттерна "Команда"
interface CommandInterface {
    public function execute();

    public function undo();

}

class CopyCommand implements CommandInterface{
    private string $text;

    /**
     * CopyCommand constructor.
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }


    public function execute($text)
    {
        // логика команды "копировать"
    }

    public function undo($text)
    {
        // логика отмены команды "копировать"
    }

    protected function log()
    {
        // логика логгирования отмены команды "копировать"
    }
}

class CutCommand implements CommandInterface{
    private string $text;

    /**
     * CutCommand constructor.
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }


    public function execute()
    {
        // логика команды "вырезать"
    }

    public function undo()
    {
        // логика отмены команды "вырезать"
    }

    protected function log()
    {
        // логика логгирования отмены команды "вырезать"
    }
}

class PasteCommand implements CommandInterface{
    private string $text;

    /**
     * PasteCommand constructor.
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }


    public function execute()
    {
        // логика команды "вставить"
    }

    public function undo()
    {
        // логика отмены команды "вставить"
    }

    protected function log()
    {
        // логика логгирования отмены команды "вставить"
    }
}


class TextManager {
    public function submit(CommandInterface $command)
    {
        $command->execute();
    }

}

$invoker = new TextManager();
$invoker->submit(new CutCommand("XSWEDFVC"));