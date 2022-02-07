<?php

class Account
{
    private string $name;
    private int $balance;

    public function __construct($name, $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function withdrawal(int $amount): void
    {
        $this->balance -= $amount;
    }

    public function deposit(int $amount): void
    {
        $this->balance += $amount;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function __toString(): string
    {
        return $this->name . " | " . $this->balance;
    }

    public static function transfer(Account $from, Account $to, int $howMuch)
    {
        $from->balance -= $howMuch;
        $to->balance += $howMuch;
    }
}

//$myAcc = new Account("My account", 100.00);
//$mattsAcc = new Account("Matt's account in Switzerland", 1000000.00);
//
//echo "Initial state : \n";
//echo $myAcc . PHP_EOL;
//echo $mattsAcc . PHP_EOL;
//
//$myAcc->withdrawal(20);
//echo "My account balance is now: " . $myAcc->getBalance() . PHP_EOL;
//$mattsAcc->deposit(200);
//echo "Matt's Swiss account balance is now: ".$mattsAcc->getBalance() . PHP_EOL;
//
//echo "Final state : \n";
//echo $myAcc . PHP_EOL;
//echo $mattsAcc . PHP_EOL;

$accA = new Account("A : ", 100);
$accB = new Account("B : ", 0);
$accC = new Account("C : ", 0);
Account::transfer($accA, $accB, 50);
Account::transfer($accB, $accC, 25);
echo $accA->getBalance() . PHP_EOL;
echo $accB->getBalance() . PHP_EOL;
echo $accC->getBalance() . PHP_EOL;
