<?php
namespace trogon\otuspdf\test\unit\meta;

use PHPUnit\Framework\TestCase;

use trogon\otuspdf\meta\PaddingInfo;
use trogon\otuspdf\base\InvalidOperationException;

/**
 * @covers \trogon\otuspdf\meta\PaddingInfo
 */
final class PaddingInfoTest extends TestCase
{
    private $paddingInfoClass = 'trogon\otuspdf\meta\PaddingInfo';
    private $invalidOperationExceptionClass = 'trogon\otuspdf\base\InvalidOperationException';

    public function testCreateArgsOrder()
    {
        $paddingInfo = PaddingInfo::create(1.78, 2.79, 3.87, 4.89);
        $this->assertEquals(
            1.78,
            $paddingInfo->left
        );
        $this->assertEquals(
            2.79,
            $paddingInfo->top
        );
        $this->assertEquals(
            3.87,
            $paddingInfo->right
        );
        $this->assertEquals(
            4.89,
            $paddingInfo->bottom
        );
    }

    public function testCreateByCssArgsOrder()
    {
        $paddingInfo = PaddingInfo::createByCss(1.78, 2.79, 3.87, 4.89);
        $this->assertEquals(
            1.78,
            $paddingInfo->top
        );
        $this->assertEquals(
            2.79,
            $paddingInfo->right
        );
        $this->assertEquals(
            3.87,
            $paddingInfo->bottom
        );
        $this->assertEquals(
            4.89,
            $paddingInfo->left
        );
    }
}
