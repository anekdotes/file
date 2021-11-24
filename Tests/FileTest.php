<?php

namespace Tests;

use Anekdotes\File\File;
use PHPUnit\Framework\TestCase;

final class FileTest extends TestCase
{
    public function testCheckIfCanOpenFile()
    {
        $file = File::get(__DIR__.'/dummy/dummy.jpg');

        $this->assertNotEmpty($file, "Couldn't open file");
    }

    public function testCheckIfCantOpenFile()
    {
        $file = File::get(__DIR__.'/dummy/doesntexist.jpg');

        $this->assertEmpty($file, 'Could open file');
    }

    public function testCheckIfFileExist()
    {
        $file = File::exists(__DIR__.'/dummy/dummy.jpg');

        $this->assertTrue($file, "File doesn't exist");
    }

    public function testCheckIfFileDoesntExist()
    {
        $file = File::exists(__DIR__.'/dummy/doesntexist.jpg');

        $this->assertFalse($file, 'File exist');
    }

    public function testCheckIfFilePutWorks()
    {
        $path = __DIR__.'/dummy/foo';

        File::put($path, 'bar');

        $this->assertTrue(File::exists($path), "Couldn't write files");
    }

    public function testCheckIfFileRenameWorks()
    {
        $this->assertTrue(File::move(__DIR__.'/dummy/foo', __DIR__.'/dummy/foo2'), "Couldn't move file");
    }

    public function testCheckIfFileCopyWorks()
    {
        $this->assertTrue(File::copy(__DIR__.'/dummy/foo2', __DIR__.'/dummy/foo.txt'), "Couldn't copy file");
    }

    public function testCheckIfFileDeleteWorks()
    {
        $this->assertTrue(File::delete(__DIR__.'/dummy/foo2'), "Couldn't delete file");
    }

    public function testCheckIfFileExtensionWorksOnExisting()
    {
        $this->assertNotEmpty(File::extension(__DIR__.'/dummy/foo.txt'), "Couldn't check file extension");
    }

    public function testCheckIfFileDeleteWorksTwo()
    {
        $this->assertTrue(File::delete(__DIR__.'/dummy/foo.txt'), "Couldn't delete file");
    }

    public function testCheckIfFileExtensionWorksOnNonExisting()
    {
        $this->assertEmpty(File::extension(__DIR__.'/dummy/foobar'), "Couldn't check file extension");
    }

    public function testCheckIfFileIsDirectoryWorksOnFolder()
    {
        $path = __DIR__.'/dummy';

        $this->assertTrue(File::isDirectory($path), "{$path} is not a folder");
    }

    public function testCheckIfFileIsDirectoryWorksOnFile()
    {
        $path = __DIR__.'/dummy/dummy.jpg';

        $this->assertFalse(File::isDirectory($path), "{$path} is a folder");
    }

    public function testCheckIfFileDirectoriesEmptyWorks()
    {
        $path = __DIR__.'/dummy/';

        $this->assertEmpty(File::directories($path), "{$path} has sub directories}");
    }

    public function testCheckIfFileDirectoriesNotEmptyWorks()
    {
        $path = __DIR__.'/';

        $this->assertNotEmpty(File::directories($path), "{$path} has no sub directories}");
    }

    public function testCheckIfFileCreateDirectoryWorks()
    {
        $path = __DIR__.'/dummy/tmp/';

        $this->assertNotEmpty(File::makeDirectory($path), "{$path} cannot be created}");
    }

    public function testFiles1()
    {
        $path = __DIR__.'/dummy/';

        $this->assertNotEmpty(File::files($path), "{$path} has no files}");
    }

    public function testFiles2()
    {
        $path = __DIR__.'/dummy/tmp/';

        $this->assertEmpty(File::files($path), "{$path} has files}");
    }

    public function testCheckIfFileIsFileWorksOnFolder()
    {
        $path = __DIR__.'/dummy';

        $this->assertFalse(File::isFile($path), "{$path} is a file");
    }

    public function testCheckIfFileIsFileWorksOnFile()
    {
        $path = __DIR__.'/dummy/dummy.jpg';

        $this->assertTrue(File::isFile($path), "{$path} is not a file");
    }

    public function testDeleteDirectory1()
    {
        $path = __DIR__.'/dummy/tmp';

        $this->assertTrue(File::deleteDirectory($path), "{$path} couldn't not be deleted");
    }

    public function testDeleteDirectory2()
    {
        $path = __DIR__.'/dummy/dummy.jpg';

        $this->assertFalse(File::deleteDirectory($path));
    }

    public function testDeleteDirectory3()
    {
        File::makeDirectory(__DIR__.'/dummy/tmp2');
        File::copy(__DIR__.'/dummy/dummy.jpg', __DIR__.'/dummy/tmp2/dummy.jpg');
        File::makeDirectory(__DIR__.'/dummy/tmp2/test');
        File::copy(__DIR__.'/dummy/dummy.jpg', __DIR__.'/dummy/tmp2/test/dummy.jpg');

        $path = __DIR__.'/dummy/tmp2/';
        
        $this->assertTrue(File::deleteDirectory($path));
    }

    public function testCheckIfFileSizeWorksOnFile()
    {
        $this->assertGreaterThan(0, File::size(__DIR__.'/dummy/dummy.jpg'));
    }

    public function testCheckGlob()
    {
        $this->assertEquals(count(File::glob(__DIR__.'/dummy/*')), 1);
    }
}
