<?php
    use Illuminate\Database\Capsule\Manager as Database;

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/7
     * Time: 10:45
     */
    class CustomersRepositoryTest extends PHPUnit_Framework_TestCase
    {

        protected $customers;

        public function setUp()
        {
            $database = new Database;
            $database->addConnection([
                'driver'    => 'mysql',
                'host'      => '127.0.0.1',
                'database'  => 'minisite_lshc',
                'username'  => 'root',
                'password'  => '',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ]);
            $database->bootEloquent();

            $this->customers = new CustomerRepository();
        }


        /** @test * */
        function fetches_all_b()
        {
            $results = $this->customers->all();
            $this->assertCount(2, $results);
        }


        /** @test * */
        function fetches_all()
        {
            $result = $this->customers->bySpecification(new CustomerIsGold);
            $this->assertCount(1, $result);
        }
    }