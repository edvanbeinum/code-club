<?php
/**
 *
 * @author Ed van Beinum <edwin@sessiondigital.com>
 * @version $Id$
 * @copyright Ibuildings 12/09/2011
 * @package BowlingGameTwo
 */


/**
 *
 * @package BowlingGameTwo
 * @author Ed van Beinum <edwin@sessiondigital.com>
 */
class BowlingGameTwo
{

    protected $_scores = array();

    protected $_frameNum = 1;

    public function roll($pins)
    {
        $this->_scores[] = $pins;
    }

    public function score()
    {
        foreach ($this->_scores as $rollNum => $score) {
            if ($rollNum % 2 != 0) {
                if ($score + $this->_scores[$rollNum - 1] == 10) {
                    $this->_addSpareBonus($rollNum);
                }
                $this->_frameNum++;
            }
            elseif ($score == 10) {
                $this->_addStrikeBonus($rollNum);
                $this->_frameNum++;
            }


        }
        return array_sum($this->_scores);
    }

    protected function _addSpareBonus($rollNum)
    {
        $this->_scores[$rollNum] += $this->_scores[$rollNum + 1];
    }

    protected function _addStrikeBonus($rollNum)
    {
        if ($this->_frameNum <= 9) {
            $this->_scores[$rollNum] += ($this->_scores[$rollNum + 1] * 2);
        }
    }


}
