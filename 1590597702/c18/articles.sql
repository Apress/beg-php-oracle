CREATE SEQUENCE articles_seq
start with 1
increment by 1
nomaxvalue;

CREATE TABLE articles (
article_id NUMBER PRIMARY KEY,
title VARCHAR2(50) NOT NULL,
content VARCHAR2(8) NOT NULL
);