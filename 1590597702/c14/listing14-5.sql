CREATE SEQUENCE userauth_seq
start with 1
increment by 1
nomaxvalue;
CREATE TABLE userauth (
userauth_id NUMBER PRIMARY KEY,
common_name VARCHAR2(35) NOT NULL,
username VARCHAR2(8) NOT NULL,
pswd VARCHAR2(32) NOT NULL
);