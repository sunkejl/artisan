<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/2
 * Time: 15:53
 */
include "vendor/autoload.php";

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\LockHandler;

$fs = new Filesystem();

try {
    $fs->mkdir('/tmp/random/dir/' . mt_rand());
} catch (IOExceptionInterface $e) {
    echo "An error occurred while creating your directory at " . $e->getPath();
}

$fs->mkdir('/tmp/photos1', 0722);
$exist = $fs->exists('/tmp/photos1');

$fs->copy('/tmp/photos1/a.md', '/tmp/photos1/b.md', true);

$fs->touch('/tmp/photos1/file.txt', time(), time() - 10);

// set the owner of the lolcat video to www-data
$fs->chown('lolcat.mp4', 'www-data');
// change the owner of the video directory recursively
$fs->chown('/video', 'www-data', true);

// set the group of the lolcat video to nginx
$fs->chgrp('lolcat.mp4', 'nginx');
// change the group of the video directory recursively
$fs->chgrp('/video', 'nginx', true);

// set the mode of the video to 0600
$fs->chmod('video.ogg', 0600);
// change the mod of the src directory recursively
$fs->chmod('src', 0700, 0000, true);


$fs->remove(array('symlink', '/path/to/directory', 'activity.log'));

// rename a file
$fs->rename('/tmp/processed_video.ogg', '/path/to/store/video_647.ogg');
// rename a directory
$fs->rename('/tmp/files', '/path/to/store/files');

// create a symbolic link
$fs->symlink('/path/to/source', '/path/to/destination');
// duplicate the source directory if the filesystem
// does not support symbolic links
$fs->symlink('/path/to/source', '/path/to/destination', true);


$fs->dumpFile('file.txt', 'Hello World');


$lockHandler = new LockHandler('hello.lock');
if (!$lockHandler->lock()) {
    // the resource "hello" is already locked by another process

    return 0;
}

