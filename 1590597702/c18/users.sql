CREATE SEQUENCE users_seq
start with 1
increment by 1
nomaxvalue;
CREATE TABLE users (
user_id NUMBER PRIMARY KEY,
commonname VARCHAR2(35) NOT NULL,
username VARCHAR2(8) NOT NULL,
pswd CHAR(32) NOT NULL
);