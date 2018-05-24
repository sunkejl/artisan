<?php
/**
 * Filter pattern or Criteria pattern is a design pattern that enables developers to filter a set of objects using different criteria(标准)
 * and chaining them in a decoupled way through logical operations.
 * 用不同的标准进行过滤
 * Criteria(标准)
 * 采用解耦的方式进行验证
 * this pattern combines multiple criteria to obtain single criteria.
 */
const MALE = "male";
const FEMALE = "female";
const SINGLE = "single";
const NOT_SINGLE = "notSingle";
class PersonInfo
{
    public $name;
    public $gender;
    public $singleStatus;

    public function __construct($name, $gender, $singleStatus)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->singleStatus = $singleStatus;
    }

}

interface Criteria
{
    public function meetCriteria($personInfoArray);
}

class CriteriaMale implements Criteria
{
    public function meetCriteria($personInfoArray)
    {
        foreach ($personInfoArray as $personInfo) {
            if ($personInfo->gender == MALE) {
                $storage = Storage::getInstance();
                array_push($storage->male, $personInfo->name);
            }
        }
    }
}

class CriteriaFemale implements Criteria
{
    public function meetCriteria($personInfoArray)
    {
        foreach ($personInfoArray as $personInfo) {
            if ($personInfo->gender == FEMALE) {
                $storage = Storage::getInstance();
                array_push($storage->female, $personInfo->name);
            }
        }
    }
}

class CriteriaSingle implements Criteria
{
    public function meetCriteria($personInfoArray)
    {
        foreach ($personInfoArray as $personInfo) {
            if ($personInfo->singleStatus == SINGLE) {
                $storage = Storage::getInstance();
                array_push($storage->single, $personInfo->name);
            }
        }
    }
}

class CriteriaNotSingle implements Criteria
{
    public function meetCriteria($personInfoArray)
    {
        foreach ($personInfoArray as $personInfo) {
            if ($personInfo->singleStatus == NOT_SINGLE) {
                $storage = Storage::getInstance();
                array_push($storage->notSingle, $personInfo->name);
            }
        }
    }
}

$storage = Storage::getInstance();
array_push($storage->person, new PersonInfo("a", MALE, SINGLE));
array_push($storage->person, new PersonInfo("b", MALE, SINGLE));
array_push($storage->person, new PersonInfo("c", FEMALE, SINGLE));
array_push($storage->person, new PersonInfo("d", FEMALE, NOT_SINGLE));
(new CriteriaMale())->meetCriteria($storage->person);
(new CriteriaFemale())->meetCriteria($storage->person);
(new CriteriaSingle())->meetCriteria($storage->person);
(new CriteriaNotSingle())->meetCriteria($storage->person);
var_dump($storage->male);
var_dump($storage->female);
var_dump($storage->single);
var_dump($storage->notSingle);


class Storage
{
    private static $instance;
    public $male = array();
    public $female = array();
    public $single = array();
    public $notSingle = array();
    public $person = array();

    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct()
    {
    }
}

