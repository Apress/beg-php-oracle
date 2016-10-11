CREATE SEQUENCE subscribers_seq
start with 1
increment by 1
nomaxvalue;

CREATE TABLE subscribers (
subscriber_ID NUMBER PRIMARY KEY,
email VARCHAR2(55) NOT NULL,
uniqueid VARCHAR2(32) NOT NULL,
read_newsletter CHAR(1) DEFAULT 'N' CHECK (read_newsletter IN ('Y', 'N'))
);