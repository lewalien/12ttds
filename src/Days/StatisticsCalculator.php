<?php

namespace Days;

/**
 * Class StatisticsCalculator
 * @package Days
 */
class StatisticsCalculator
{
    /**
     * @var array
     */
    private $numbers;

    /**
     * @param array $numbers
     */
    public function __construct(array $numbers)
    {
        $this->numbers = $numbers;

        $this->validateValues();
        \sort($this->numbers, \SORT_NUMERIC);
    }

    /**
     * @return int
     */
    public function getMinimiumValue()
    {
        return $this->numbers[0];
    }

    /**
     * @return int
     */
    public function getMaximiumValue()
    {
        return \end($this->numbers);
    }

    /**
     * @return int
     */
    public function getNumberOfValues()
    {
        return \count($this->numbers);
    }

    /**
     * @return float
     */
    public function getAverage()
    {
        return \array_sum($this->numbers) / $this->getNumberOfValues();
    }

    /**
     * Validates the values to ensure we only have numeric values and array is not empty
     */
    private function validateValues()
    {
        if ($this->getNumberOfValues() === 0) {
            throw new \Exception("Please supply a range of numbers");
        }

        \array_walk($this->numbers, function($value){

            if (!\is_numeric($value)) {
                throw new \Exception("All values need to be a number");
            }

        });
    }
}