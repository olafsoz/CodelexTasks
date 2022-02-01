<?php

class SavingsAccount {
    private int $balance;
    private float $interestRate;
    private int $monthsOpen;

    public function __construct($balance, $interestRate, $monthsOpen) {
        $this->balance = $balance;
        $this->interestRate = $interestRate;
        $this->monthsOpen = $monthsOpen;
    }

    public function withdraw($money) {
        $this->balance -= $money;
    }

    public function deposit($money) {
        $this->balance += $money;
    }

    public function getBalance(): float {
        return $this->balance;
    }

    public function MonthlyInterest() {
        $this->balance += $this->balance * $this->interestRate;
    }

}
$accountMoney = readline("How much money is in the account? ");
$annualInterest = readline("Enter the annual interest: ");
$accOpen = readline("How many months has this account been open? ");
$person1 = new SavingsAccount($accountMoney, $annualInterest / 12, $accOpen);
$deposit = 0;
$withdrawn = 0;
for ($i = 1; $i < $accOpen + 1; $i++) {
    $deposit += readline("Enter amount deposited in month $i : ");
    $withdrawn += readline("Enter amount withdrawn in month $i : ");
    $person1->deposit($deposit);
    $person1->withdraw($withdrawn);
    $person1->MonthlyInterest();
}
echo "Total deposited $" . number_format($deposit, 2) . PHP_EOL;
echo "Total withdrawn $" . number_format($withdrawn, 2) . PHP_EOL;
echo "Interest earned $" . number_format(($person1->getBalance() - ($accountMoney + $deposit - $withdrawn)), 2) . PHP_EOL;
echo "Ending balance : $" . number_format($person1->getBalance(), 2);