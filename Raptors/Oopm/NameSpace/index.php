<?php
    use Acme\Person;
    use Acme\Staff;
    use Acme\Business;
    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/11
     * Time: 16:05
     */
require 'vendor/autoload.php';
    $jack = new Person("jack");
    $staff = new Staff([$jack]);
    $chh = new Business($staff);
    $chh->hire(new Person("rose"));
    var_dump($chh->getStaffMembers());