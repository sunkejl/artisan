DROP TABLE articles;
CREATE TABLE IF NOT EXISTS articles (
    id           INTEGER NOT NULL AUTO_INCREMENT,
    title        VARCHAR(250),
    tagline      VARCHAR(250),
    abstract     TEXT,
    content      TEXT,
    author       VARCHAR(250),
    authoremail  VARCHAR(250),
    articledate  DATETIME,
    imageurl     VARCHAR(250),
    imagecaption TEXT,
    PRIMARY KEY(id)
);

REPLACE INTO articles VALUES(1,
'Bush wants Cold Fusion by 2020',
'Promises university research funding and thousands of new high-tech jobs',
'This is an example abstract.
This is an example abstract.
This is an example abstract.
This is an example abstract.
This is an example abstract.', 'This is an example article body.
This is an example article body.
This is an example article body.
This is an example article body.
This is an example article body.
This is an example article body.
This is an example article body.<br><br>
This is an example article body.
This is an example article body.
This is an example article body.
This is an example article body.
This is an example article body.
This is an example article body.
This is an example article body.<br><br>
This is an example article body.
This is an example article body.
This is an example article body.
This is an example article body.
This is an example article body.
This is an example article body.
This is an example article body.<br><br>
This is an example article body.
This is an example article body.
This is an example article body.
This is an example article body.
This is an example article body.
This is an example article body.
This is an example article body.<br><br>
', 'Stig Bakken', 'stig@php.net', '2004-02-15 23:54:00', 'bob.jpg', 'The Sub-Genius');
