<?php
/**
 * Data Access Object Pattern or DAO pattern is used to separate low level data accessing API or operations from high level business services.
 * Following are the participants in Data Access Object Pattern.
 * Data Access Object Interface - This interface defines the standard operations to be performed on a model object(s).
 * Data Access Object concrete class - This class implements above interface. This class is responsible to get data from a data source which can be database / xml or any other storage mechanism.
 * Model Object or Value Object - This object is simple POJO containing get/set methods to store data retrieved using DAO class.
 */

namespace Dp\dataAccessObject;

class StudentModel
{
    public $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * StudentModel constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

}

interface StudentInterface
{
    function getStudent();

    function updateStudent($key, $name);

    function deleteStudent();
}

class StudentAccess implements StudentInterface
{

    public $students = array();

    public function __construct()
    {
        array_push($this->students, new StudentModel("biz"));
        array_push($this->students, new StudentModel("acf"));
    }

    function getStudent()
    {
        return $this->students;
    }

    function updateStudent($key, $name)
    {
        $this->students[$key]->setName($name);
    }

    function deleteStudent()
    {
    }
}

$s = new StudentAccess();
$s->updateStudent(0, "def");
var_dump($s->getStudent());




















