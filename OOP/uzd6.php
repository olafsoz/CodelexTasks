<?php

class EnergyDrinks
{
    private int $surveyed;
    private float $purchased_energy_drinks;
    private float $prefer_citrus_drinks;

    public function __construct($surveyed = 12467, $purchased_energy_drinks = 0.14, $prefer_citrus_drinks = 0.64) {
        $this->surveyed = $surveyed;
        $this->purchased_energy_drinks = $purchased_energy_drinks;
        $this->prefer_citrus_drinks = $prefer_citrus_drinks;
    }

    public function calculate_energy_drinkers(): int
    {
        if ($this->surveyed < 0 || $this->purchased_energy_drinks < 0 || $this->purchased_energy_drinks > 1) {
            throw new LogicException(";(");
        } else {
            return round($this->surveyed * $this->purchased_energy_drinks);
        }

    }

    public function calculate_prefer_citrus(): int
    {
        if ($this->surveyed < 0 || $this->prefer_citrus_drinks < 0 || $this->prefer_citrus_drinks > 1) {
            throw new LogicException(";(");
        } else {
            return round($this->calculate_energy_drinkers() * $this->prefer_citrus_drinks);
        }
    }

    public function getSurveyed() {
        return $this->surveyed;
    }
}

$redBull = new EnergyDrinks();
echo "Total number of people surveyed : " . $redBull->getSurveyed() . PHP_EOL;
echo "Approximately " . $redBull->calculate_energy_drinkers() . " bought at least one energy drink" . PHP_EOL;
echo $redBull->calculate_prefer_citrus() .  " of those " . "prefer citrus flavored energy drinks." . PHP_EOL;