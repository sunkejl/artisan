<?php
    use Illuminate\Database\Eloquent\Model as Eloquent;

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/6
     * Time: 15:43
     */
    class Customer extends Eloquent
    {

        //  protected  $fillable=['type','name']; #白名单
        protected $guarded = ['id']; #黑名单  用来阻止批量赋值

        public function type()
        {
            return $this->type;
        }
    }