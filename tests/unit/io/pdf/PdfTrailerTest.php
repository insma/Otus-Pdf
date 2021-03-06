<?php
namespace trogon\otuspdf\test\unit\io\pdf;

use PHPUnit\Framework\TestCase;

use trogon\otuspdf\io\pdf\PdfTrailer;
use trogon\otuspdf\base\InvalidOperationException;

/**
 * @covers \trogon\otuspdf\io\pdf\PdfTrailer
 */
final class PdfTrailerTest extends TestCase
{
    private $pdfDictionaryClass = 'trogon\otuspdf\io\pdf\PdfDictionary';
    private $pdfTrailerClass = 'trogon\otuspdf\io\pdf\PdfTrailer';
    private $invalidOperationExceptionClass = 'trogon\otuspdf\base\InvalidOperationException';

    public function testCanBeCreatedFromEmptyConfig()
    {
        $this->assertInstanceOf(
            $this->pdfTrailerClass,
            new PdfTrailer()
        );
    }

    public function testContentInitializedAsDictionary()
    {
        $pdfTrailer = new PdfTrailer();
    
        $this->assertInstanceOf(
            $this->pdfDictionaryClass,
            $pdfTrailer->content
        );
    }

    public function testGetXrefOffsetInitializedAsZero()
    {
        $pdfTrailer = new PdfTrailer();
    
        $this->assertEquals(
            0,
            $pdfTrailer->xrefOffset
        );
    }

    public function testSetXrefOffsetStoresPositiveInteger()
    {
        $pdfTrailer = new PdfTrailer();
        $expectedXrefOffset = 278311;
        $pdfTrailer->xrefOffset = $expectedXrefOffset;
    
        $this->assertEquals(
            $expectedXrefOffset,
            $pdfTrailer->xrefOffset
        );
    }

    public function testToStringIsValidWhenEmpty()
    {   $pdfTrailer = new PdfTrailer();
        $contentString = $pdfTrailer->content->toString();
        $expectedTrailer = "trailer\n{$contentString}\nstartxref\n0";
    
        $this->assertEquals(
            $expectedTrailer,
            $pdfTrailer->toString()
        );
    }

    public function testToStringIsValidWhenXrefOffsetDefined()
    {   $pdfTrailer = new PdfTrailer();
        $contentString = $pdfTrailer->content->toString();
        $expectedXrefOffset = 278311;
        $expectedTrailer = "trailer\n{$contentString}\nstartxref\n{$expectedXrefOffset}";
        $pdfTrailer->xrefOffset = $expectedXrefOffset;
    
        $this->assertEquals(
            $expectedTrailer,
            $pdfTrailer->toString()
        );
    }
}
