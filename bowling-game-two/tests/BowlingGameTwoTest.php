<?php
/**
 * 
 * @author Ed van Beinum <edwin@sessiondigital.com>
 * @version $Id$
 * @copyright Ibuildings 12/09/2011
 * @package BowlingGameTest 
 */

include '../BowlingGameTwo.php';
 
 /**
 * 
 * @package BowlingGameTest
 * @author Ed van Beinum <edwin@sessiondigital.com>
 */
class BowlingGameTwoTest  extends PHPUnit_Framework_TestCase {

    protected $_bowlingGame;

    public function setUp()
    {
        $this->_bowlingGame = new BowlingGameTwo();
    }

    protected function _playGame(array $scores = array())
    {
        $scores = array_pad($scores, 20, 0);
        foreach ($scores as $score) {
            $this->_bowlingGame->roll($score);
        }
    }
    public function testZeroScoreForGutterGame()
    {
        $this->_playGame(array(0));
        $this->assertSame(0, $this->_bowlingGame->score());
    }

    public function testSumsOfRollsWithNoStrikesOrSpares()
    {
        $this->_playGame(array(7, 8, 2, 4));
        $this->assertSame(21, $this->_bowlingGame->score());
    }

    public function testOneBonusRollForASpare()
    {
        $this->_playGame(array(5, 5, 2, 1, 8, 2, 6, 0));
        $this->assertSame(37, $this->_bowlingGame->score());
    }

    public function testTwoBonusRollsForAStrike()
    {
        $this->_playGame(array(3, 3, 10, 3));
        $this->assertSame(25, $this->_bowlingGame->score());
    }

    public function testTwoBonusRollsForAStrikeEvenIfTheyAreStrikes()
    {
        $this->_playGame(array(3, 3, 10, 10, 5, 0));
        $this->assertSame(61, $this->_bowlingGame->score());
    }

    public function test300ScoreIfPerfectGame()
    {
        $this->_playGame(array_pad(array(), 12, 10));
        $this->assertSame(300, $this->_bowlingGame->score());
    }


}
