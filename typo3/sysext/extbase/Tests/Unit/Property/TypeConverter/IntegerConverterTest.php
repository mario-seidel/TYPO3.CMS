<?php
namespace TYPO3\CMS\Extbase\Tests\Unit\Property\TypeConverter;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class IntegerConverterTest extends UnitTestCase
{
    /**
     * @var \TYPO3\CMS\Extbase\Property\TypeConverterInterface
     */
    protected $converter;

    protected function setUp()
    {
        $this->converter = new \TYPO3\CMS\Extbase\Property\TypeConverter\IntegerConverter();
    }

    /**
     * @test
     */
    public function checkMetadata()
    {
        $this->assertEquals(['integer', 'string'], $this->converter->getSupportedSourceTypes(), 'Source types do not match');
        $this->assertEquals('integer', $this->converter->getSupportedTargetType(), 'Target type does not match');
        $this->assertEquals(10, $this->converter->getPriority(), 'Priority does not match');
    }

    /**
     * @test
     */
    public function convertFromShouldCastTheStringToInteger()
    {
        $this->assertSame(15, $this->converter->convertFrom('15', 'integer'));
    }

    /**
     * @test
     */
    public function convertFromDoesNotModifyIntegers()
    {
        $source = 123;
        $this->assertSame($source, $this->converter->convertFrom($source, 'integer'));
    }

    /**
     * @test
     */
    public function convertFromReturnsNullIfEmptyStringSpecified()
    {
        $this->assertNull($this->converter->convertFrom('', 'integer'));
    }

    /**
     * @test
     */
    public function convertFromReturnsAnErrorIfSpecifiedStringIsNotNumeric()
    {
        $this->assertInstanceOf(\TYPO3\CMS\Extbase\Error\Error::class, $this->converter->convertFrom('not numeric', 'integer'));
    }

    /**
     * @test
     */
    public function canConvertFromShouldReturnTrueForANumericStringSource()
    {
        $this->assertTrue($this->converter->canConvertFrom('15', 'integer'));
    }

    /**
     * @test
     */
    public function canConvertFromShouldReturnTrueForAnIntegerSource()
    {
        $this->assertTrue($this->converter->canConvertFrom(123, 'integer'));
    }

    /**
     * @test
     */
    public function canConvertFromShouldReturnTrueForAnEmptyValue()
    {
        $this->assertTrue($this->converter->canConvertFrom('', 'integer'));
    }

    /**
     * @test
     */
    public function canConvertFromShouldReturnTrueForANullValue()
    {
        $this->assertTrue($this->converter->canConvertFrom(null, 'integer'));
    }

    /**
     * @test
     */
    public function getSourceChildPropertiesToBeConvertedShouldReturnEmptyArray()
    {
        $this->assertEquals([], $this->converter->getSourceChildPropertiesToBeConverted('myString'));
    }
}
