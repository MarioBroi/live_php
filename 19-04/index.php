<?php

class User
{
    public $name;
    public $lastname;
    private $age;
    protected $discount;

    public function __construct($name,  $lastname)
    {
        $this->name = $name;
        $this->lastname = $lastname;
    }

    public function getFullName()
    {
        return $this->name . ' ' . $this->lastname;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setDiscount()
    {
        if ($this->age >= 55) {
            $this->discount = 30;
        } else {
            $this->discount = 0;
        }
    }

    public function getDiscount()
    {
        return $this->discount . '%';
    }
}

$user = new User('Mario', 'Broi');

$user->setAge(28);

var_dump($user->getAge());

$user->setDiscount();

var_dump($user);

var_dump($user->getDiscount());

class Membership
{
    public $name;
    public $date;
    public $price;

    public function __construct($name, $date, $price)
    {
        $this->name = $name;
        $this->date = $date;
        $this->price = $price;
    }
}

class PremiumUser extends User
{
    public $membership;

    public function __construct($name,  $lastname, Membership $membership)
    {
        parent::__construct($name, $lastname);
        $this->membership = $membership;
    }

    public function setDiscount()
    {
        if ($this->getAge() <= 30) {
            $this->discount = 20;
        } else {
            $this->discount = 10;
        }
    }
}

$premiumUser = new PremiumUser('Ignazio', 'Marcia', new Membership("Adolfo's", '19/04/2024', 89));
$premiumUser->setAge(53);
$premiumUser->setDiscount();
var_dump($premiumUser);
