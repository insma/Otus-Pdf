<?php
namespace trogon\otuspdf\test\unit;

use PHPUnit\Framework\TestCase;

use trogon\otuspdf\Document;
use trogon\otuspdf\base\InvalidOperationException;

/**
 * @covers \trogon\otuspdf\Document
 */
final class DocumentTest extends TestCase
{
    private $documentClass = 'trogon\otuspdf\Document';
    private $documentInfoClass = 'trogon\otuspdf\meta\DocumentInfo';
    private $pageCollectionClass = 'trogon\otuspdf\PageCollection';
    private $invalidOperationExceptionClass = 'trogon\otuspdf\base\InvalidOperationException';

    public function testCanBeCreatedFromEmptyConfig()
    {
        $this->assertInstanceOf(
            $this->documentClass,
            new Document()
        );
    }

    public function testCanBeCreatedFromAllConfig()
    {
        $this->assertInstanceOf(
            $this->documentClass,
            new Document([
                'title' => 'Test title',
                'author' => 'Test author',
                'subject' => 'Test subject',
                'keywords' => 'Test, test keyword'
            ])
        );
    }

    /**
     * @expectedException trogon\otuspdf\base\ArgumentException
     */
    public function testCannotBeCreatedFromCreationDate()
    {
        new Document(['creationDate' => '2018-02-01']);
    }

    /**
     * @expectedException trogon\otuspdf\base\ArgumentException
     */
    public function testCannotBeCreatedFromModificationDate()
    {
        new Document(['modificationDate' => '2018-02-01']);
    }

    public function testReturnsInfoWhenNotConfigured()
    {
        $this->assertInstanceOf(
            $this->documentInfoClass,
            (new Document())->info
        );
    }

    public function testReturnsInfoWhenConfigured()
    {
        $this->assertInstanceOf(
            $this->documentInfoClass,
            (new Document([
                'title' => 'Test title',
                'author' => 'Test author',
                'subject' => 'Test subject',
                'keywords' => 'Test, test keyword'
            ]))->info
        );
    }

    public function testReturnPageCollection()
    {
        $this->assertInstanceOf(
            $this->pageCollectionClass,
            (new Document())->pages
        );
    }
}
