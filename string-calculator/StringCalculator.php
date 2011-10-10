<?php
/**
 * 
 * @author Ed van Beinum <edwin@sessiondigital.com>
 * @version $Id$
 * @copyright Ibuildings 10/10/2011
 * @package StringCalculator 
 */

class MultipleNegativeNumberException extends Exception {}

 
 /**
 * 
 * @package StringCalculator
 * @author Ed van Beinum <edwin@sessiondigital.com>
 */
class StringCalculator {
    
    public function add($arg = 0, $separator = 's')
    {
        $separator = '/\\' . $separator . '/';

        $args = preg_split($separator, $arg);

        $negativeNumbers = array();
        foreach ($args as $a) {
            if ((int)$a < 0) {
                $negativeNumbers[] = $a;
            }
        }

        if (count($negativeNumbers) == 1) {
            throw new Exception('Negative numbers not allowed: ' . $negativeNumbers);
        } elseif (count($negativeNumbers) > 1) {
            throw new MultipleNegativeNumberException('Negative numbers not allowed: ' . $negativeNumbers);
        }
        return array_sum($args);
    }
}
