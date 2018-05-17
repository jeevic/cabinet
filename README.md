Microsoft Cabinet file extraction wrapper.
=============================
Microsoft Cabinet file extraction wrapper.  Uses either cabextract or expand

INSTALLATION
------------

The recommended way to install cabarchive is through Composer:

     composer require jeevi/cabinet


REQUIREMENTS
------------

  - PHP 5.2.1 or above
  - expand.exe has been installed on windows
  - cabextract has been installed on Linux, and it's on /usr/bin dir


QUICK START
-----------

Microsoft Cabinet file extraction wrapper.  Uses either cabextract or expand, it's has this functions:

- list files, lists a Cabinet has files
- get files content , get a file  cotent in Cabint
- extract cab to assgin dir



       #list files
       $cabFiles = __DIR__. '/test.cab';
       try {
           $cab = new \Cab\CabArchive($cabFiles);
           $files = $cab->listFiles();
       } catch (\Cab\CabArchiveException $e) {
           echo $e->getMessage();
       }

       #get a file cotent
       try {
           $cab = new CabArchive($cabFiles);
           $fileconent= $cab->extract('360av_linux_server_baseline.ini');
        } catch (\Cab\CabArchiveException $e) {
             echo $e->getMessage();
       }
       #get multi files content it's ruturn array
       try {
           $cab = new CabArchive($cabFiles);
           $fileconent= $cab->extract('360av_linux_server_baseline.ini');
       } catch (\Cab\CabArchiveException $e) {
            echo $e->getMessage();
       }

       #extract to dir
        try {
             $dst = __DIR__ . '/tmp';
             $cab = new CabArchive($cabFiles);
             $cab->extract(null, $dst);
        } catch (\Cab\CabArchiveException $e) {
           echo $e->getMessage();
        }
