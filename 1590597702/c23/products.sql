CREATE SEQUENCE product_seq
start with 1
increment by 1
nomaxvalue;
CREATE TABLE products (
product_id NUMBER PRIMARY KEY,
sku CHAR(8) NOT NULL,
title VARCHAR2(35) NOT NULL
);