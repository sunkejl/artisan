<?php

class IndentExample
{
    static $tmpfiles = array();

    function sampleMethod($dbh, $id)
    {
        $results = $dbh->getAll('SELECT * FROM bar WHERE id = ?',
                                array($id));
        if (PEAR::isError($results)) {
            return $results;
        }
        foreach ($results as $row) {
        switch ($row[0]) {
            case 'foo':
                print "A foo-style row<br />\n";
                break;
            case 'bar':
                print "A bar-style row<br />\n";
                break;
            default:
                print "Something else...<br />\n";
                break;
            }
        }
    }
}

function clean_up()
{
    foreach (IndentExample::$tmpfiles as $tmpfile) {
        if (file_exists($tmpfile)) {
            unlink($tmpfile);
        }
    }
    IndentExample::$tmpfiles = array();
}

?>
