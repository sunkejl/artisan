<?php

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/5
     * Time: 13:49
     */
    require "vendor/autoload.php";
    use Acme\Book;
    use Acme\BookInterface;

    class Person
    {
        //适配器模式 避免修改这部分代码
        public function read(BookInterface $book)
        {
            $book->open();
            $book->turnPage();
        }
    }
    //kindle只适配kindle
    (new Person())->read(new \Acme\KindleAdapter(new \Acme\Kindle()));
    //适配所有电子书
    (new Person())->read(new \Acme\eReaderAdapter(new \Acme\Note()));

    //An adapter is one of the easier design patterns to learn. The reason why is because you use them in the real world all the time!
