<?php
/*
 * This file is part of the Money package.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * phpunit --bootstrap vendor/autoload.php tests/MoneyTest.php.php
*/

use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    /**
     * @covers \SebastianBergmann\Money\Money::negate
     * @covers \SebastianBergmann\Money\Money::newMoney
     * @uses   \SebastianBergmann\Money\Money::__construct
     * @uses   \SebastianBergmann\Money\Money::handleCurrencyArgument
     * @uses   \SebastianBergmann\Money\Money::getAmount
     * @uses   \SebastianBergmann\Money\Currency
     */
    public function testCanBeNegated()
    {
        // Arrange
        $a = new \Simplex\Money(1);

        // Act
        $b = $a->negate();

        // Assert
        $this->assertEquals(-1, $b->getAmount());
    }

}