CREATE TABLE users (
    username   VARCHAR(20) NOT NULL,
    password   VARCHAR(32),
    is_admin   BOOL,
    UNIQUE INDEX(username)
);
