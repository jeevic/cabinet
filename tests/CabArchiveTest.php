<?php
/**
 * Created by PhpStorm.
 * User: jeevi
 * Date: 2018/5/16
 * Time: 16:18
 */

require_once  __dir__."/../vendor/autoload.php";

use Cab\CabArchive;
use Cab\CabArchiveException;

final class CabArchiveTest extends PHPUnit_Framework_TestCase
{


    /**
     * 列出文件
     */
    public function testListFiles()
    {
        $cabFiles = __DIR__. '/test.cab';
        $needFiles = [
            '360av_linux_server_baseline.ini'
        ];
        try {
            $cab = new CabArchive($cabFiles);
            $files = $cab->listFiles();
            $files = array_column($files, 'filename');
            foreach($files as $file){
                $this->assertContains($file, $needFiles);
            }
        } catch (CabArchiveException $e) {
            $this->assertInstanceOf('\Cab\CabArchiveException', $e);
        }
    }


    /**
     * 获取文件内容
     */
    public function testExtract()
    {
        $cabFiles = __DIR__. '/test.cab';
        $dst = __DIR__ . '/tmp';
        try {
            $cab = new CabArchive($cabFiles);
            $fileconent= $cab->extract(['360av_linux_server_baseline.ini']);
            $this->assertCount(1, $fileconent);
        }catch (CabArchiveException $e) {
            $this->assertInstanceOf('\Cab\CabArchiveException', $e);
        }

    }

    /**
     * 解压出文件
     */
    public function testExtractDir()
    {
        $cabFiles = __DIR__. '/test.cab';
        $dst = __DIR__ . '/tmp';
        try {
            $cab = new CabArchive($cabFiles);
            $cab->extract(null, $dst);
            $file = $dst . '/360av_linux_server_baseline.ini';
            $this->assertFileExists($file);
        }catch (CabArchiveException $e) {
            $this->assertInstanceOf('\Cab\CabArchiveException', $e);
        }

    }
}