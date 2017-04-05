<?php
namespace weather;

/**
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/8/14
 * Time: 14:32
 */
interface Subject
{
    public function registerObserver(Observer $observer);

    public function removeObserver(Observer $observer);

    public function notifyObservers();
}

interface Observer
{
    public function update();
}

interface DisplayElement
{
    public function display();
}

class WeatherData implements Subject
{
    public $observers = [];
    static public $instance = null;

    static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new WeatherData();
        }

        return self::$instance;
    }

    public function notifyObservers()
    {
        foreach ($this->observers as $obj) {
            $obj->notify($this);
        }
    }

    public function registerObserver(Observer $observer)
    {
        array_push($this->observers,$observer);
    }

    public function removeObserver(Observer $observer)
    {

    }


}

class Display implements Observer, DisplayElement
{
    /**
     * @var
     */
    private $name;

    public function __construct($name)
    {
        WeatherData::getInstance()->registerObserver($this);
        $this->name = $name;
    }
    public function notify($obj){
        if($obj instanceof WeatherData){
            echo "notify".$this->name;
        }
    }

    public function display()
    {
        // TODO: Implement display() method.
    }

    public function update()
    {
        $this->display();
        // TODO: Implement update() method.
    }

}

new Display("a");
new Display("b");
WeatherData::getInstance()->notifyObservers();