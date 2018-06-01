<?php

require_once 'DB.php';
require_once 'Cache/DB.php';

abstract class QueryStrategy
{
    protected $cache;
    abstract function query($query, $params);
}

class Cache1HourQueryStrategy extends QueryStrategy
{
    function __construct($dsn, $cache_options) {
        $this->cache = new Cache_DB('file', $cache_options, 3600);
        $this->cache->setConnection($dsn);
    }

    function query($query, $params = array()) {
        $hitmiss = $this->cache->isCached(md5($query), 'db_cache') ? " HIT" : "MISS";
        print "Cache 1h $hitmiss: $query\n";
        return $this->cache->query($query, $params);
    }
}

class Cache5MinQueryStrategy extends QueryStrategy
{
    function __construct($dsn, $cache_options) {
        $this->cache = new Cache_DB('file', $cache_options, 300);
        $this->cache->setConnection($dsn);
    }

    function query($query, $params = array()) {
        $hitmiss = $this->cache->isCached(md5($query), 'db_cache') ? " HIT" : "MISS";
        print "Cache 5m $hitmiss: $query\n";
        return $this->cache->query($query, $params);
    }
}

class UncachedQueryStrategy extends QueryStrategy
{
    function __construct($dsn) {
        $this->cache = DB::connect($dsn);
    }

    function query($query, $params = array()) {
        print "Uncached:      $query\n";
        return $this->cache->query($query, $params);
    }
}

class QueryCacheStrategyWrapper
{
    private $cache_1h = null;
    private $cache_5m = null;
    private $direct = null;

    function __construct($dsn) {
        $opts = array(
            'cache_dir' => '/tmp',
            'filename_prefix' => 'query');
        $this->cache_1h = new Cache1HourQueryStrategy($dsn, $opts);
        $this->cache_5m = new Cache5MinQueryStrategy($dsn, $opts);
        $this->direct = new UncachedQueryStrategy($dsn);
    }

    function query($query, $params = array()) {
        $obj = $this->cache_5m;
        $re = '/\s+FROM\s+(\S+)\s*((AS\s+)?([A-Z0-9_]+))?(,*)/i';
        if (preg_match($re, $query, $m)) {
            if ($m[1] == 'bids') {
                $obj = $this->direct;
            } elseif ($m[5] == ',') { // a join
                $obj = $this->cache_1h;
            }
        }
        return $obj->query($query, $params);
    }

    function __call($method, $args) {
        return call_user_func_array(array($this->dbh, $method), $args);
    }
}

$dbh = new QueryCacheStrategyWrapper(getenv("DSN"));

test_query($dbh, "SELECT * FROM vendors");
test_query($dbh, "SELECT v.name, p.name FROM vendors v, products p".
           " WHERE p.vendor = v.id");
test_query($dbh, "SELECT * FROM bids");

function test_query($dbh, $query) {
    $u1 = utime();
    $r = $dbh->query($query);
    $u2 = utime();
    printf("elapsed: %.04fs\n\n", $u2 - $u1);
}

function utime() {
    list($usec, $sec) = explode(" ", microtime());
    return $sec + (double)$usec;
}
