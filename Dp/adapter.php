<?php

interface AdvancedMediaPlayer
{
    function play();
}

class Mp3Player implements AdvancedMediaPlayer
{
    function play()
    {
        return __CLASS__;
    }
}

class Mp4Player implements AdvancedMediaPlayer
{
    function play()
    {
        return __CLASS__;
    }
}

class MediaAdapter
{
    private $advancedMusicPlayer;

    public function __construct($audioType)
    {
        switch ($audioType) {
            case "mp3":
                $this->advancedMusicPlayer = new Mp3Player();
                break;
            case "mp4":
                $this->advancedMusicPlayer = new Mp4Player();
                break;
        }
    }

    public function play()
    {
        return $this->advancedMusicPlayer->play();
    }

}

class AudioPlayer
{
    function play($audioType)
    {
        $mediaAdapter = new MediaAdapter($audioType);
        return $mediaAdapter->play();
    }
}

$mp3 = (new AudioPlayer())->play("mp3");
var_dump($mp3);
$mp4 = (new AudioPlayer())->play("mp4");
var_dump($mp4);
