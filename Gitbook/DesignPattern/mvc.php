<?php

/**
 * MVC Pattern stands for Model-View-Controller Pattern.
 * This pattern is used to separate application's concerns(关注).
 * Model - Model represents an object or data. It can also have logic to update controller if its data changes.代表对象和数据
 * View - View represents the visualization of the data that model contains.数据的展示
 * Controller - Controller acts on both model and view. It controls the data flow into model object and updates the view whenever data changes. It keeps view and model separate.
 * 同时操作model和view
 */
class StudentModel
{
    private $name;

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
}

class StudentController
{
    private $model;
    private $view;

    /**
     * StudentController constructor.
     * @param $model
     * @param $view
     */
    public function __construct(StudentModel $model, StudentView $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function setStudentName($name)
    {
        $this->model->setName($name);
    }

    public function getStudentName()
    {
        return $this->model->getName();
    }

    function updateView()
    {
        $this->view->printView($this->model->getName());
    }
}

class StudentView
{
    function printView($name)
    {
        echo $name;
    }
}

$student = new StudentController(new StudentModel(), new StudentView());
$student->setStudentName("bar");
$student->updateView();
