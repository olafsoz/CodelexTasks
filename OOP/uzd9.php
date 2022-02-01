<?php
class BankAccount
{
    public function getUserDetails($name, $balance): string {
        if($balance < 0) {
            return "$name -$" . number_format(abs($balance), 2);
        }
        return "$name, $". number_format($balance, 2);
    }

}
$x = new BankAccount();

echo $x->getUserDetails("Ben", "-17.2");