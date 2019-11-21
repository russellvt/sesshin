<?php
namespace Sesshin\Tests\EntropyGenerator;

use Sesshin\EntropyGenerator\File;

class FileTest extends \PHPUnit\Framework\TestCase
{
    public function testReads512BytesFromFileByDefault()
    {
        $urandomGenerator = new File(__DIR__.'/files/urandom.txt');
        $entropy = $urandomGenerator->generate();

        $this->assertEquals(strlen($entropy), 512);
    }

    public function testBytesReadFromFileCanBeSpecified()
    {
        $urandomGenerator = new File(__DIR__.'/files/urandom.txt', 64);
        $entropy = $urandomGenerator->generate();

        $this->assertEquals(strlen($entropy), 64);
    }

    public function testThrowsExceptionOnEmptyFile()
    {
        $this->expectException(\Sesshin\Exception::class);
        $fileGenerator = new File(__DIR__.'/files/empty.txt');
        $fileGenerator->generate();
    }
}
