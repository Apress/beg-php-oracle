CREATE TABLE userauth (
userauth_id NUMBER PRIMARY KEY,
common_name VARCHAR2(35) NOT NULL,
username VARCHAR2(8) NOT NULL,
pswd CHAR(32) NOT NULL,
ipaddress VARCHAR2(15) NOT NULL
);