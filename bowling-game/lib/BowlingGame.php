<?php

class BowlingGame {

    protected $_scores;

    public function roll($strikedPins)
    {
        $this->_scores[] = $strikedPins;
    }
    
    public function score()
    {
        $totalScore = 0;

        foreach ($this->_scores as $key => $score) {

            if ($this->_isEndOfFrame($key)) {
                if ($this->_isSpare($key)) {
                    $totalScore += $this->_addSpareBonus($key);
                }
            } else {
                if ($score == 10) {
                    $totalScore += $this->_addStrikeBonus($key);
                }
            }

            $totalScore += $score;
        }

        return $totalScore;
    }

    protected function _isEndOfFrame($key)
    {
        return ($key % 2) == 1;
    }

    protected function _addStrikeBonus($key)
    {
        return ($this->_scores[$key + 1] + $this->_scores[$key + 2]);
    }

    protected function _addSpareBonus($key)
    {
        return $this->_scores[$key + 1];
    }

    protected function _isSpare($key)
    {
        return ($this->_scores[$key] + $this->_scores[$key-1]) == 10;
    }
}