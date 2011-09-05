<?php
require_once '../lib/BowlingGame.php';

class BowlingGameTest extends PHPUnit_Framework_TestCase
{
    protected $_game;

    public function setUp()
    {
        $this->_game = new BowlingGame;
    }

    protected function playGame(array $scores) {
        $scores = array_pad($scores, 0, 20);
        
        foreach ($scores as $score) {
            $this->_game->roll($score);
        }
    }

    public function testZeroForGutterGame()
    {
        $this->playGame(array(0));
        $this->assertSame(0, $this->_game->score());
    }

    public function testSumRollsWithNoStrikesOrSpares()
    {
        $scores = array();
        $scores = array_pad($scores, 1, 20);
        $this->playGame($scores);

        $this->assertSame(20, $this->_game->score());
    }

    public function testOneBonusRollForSpare()
    {
        $this->playGame(array(8, 2, 3, 3, 5, 5, 5, 3));
        $this->assertSame(42, $this->_game->score());
    }

    public function testTwoBonusRollsForSpare()
    {
        $this->playGame(array(10, 4, 4));
        $this->assertSame(26, $this->_game->score());
    }

}
