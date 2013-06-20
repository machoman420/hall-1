--------------------------------------------------------
--  File created - Wednesday-June-19-2013   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table ROOM
--------------------------------------------------------

  CREATE TABLE "ROOT"."ROOM" 
   (	"ID" NUMBER(4,0), 
	"RTYPE" VARCHAR2(20 BYTE), 
	"RBLOCK" VARCHAR2(8 BYTE), 
	"RFLOOR" NUMBER(1,0), 
	"MAX_STD" NUMBER(10,0), 
	"STDCOUNT" NUMBER(10,0), 
	"TABLECOUNT" NUMBER(2,0), 
	"LAMPCOUNT" NUMBER(2,0), 
	"BEDCOUNT" NUMBER(2,0), 
	"LOCKERCOUNT" NUMBER(2,0), 
	"CHAIRCOUNT" NUMBER
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table ADMIN_INFO
--------------------------------------------------------

  CREATE TABLE "ROOT"."ADMIN_INFO" 
   (	"ID" VARCHAR2(10 BYTE), 
	"NAME" VARCHAR2(100 BYTE), 
	"DESIGNATION" VARCHAR2(50 BYTE), 
	"AUTH_LEVEL" NUMBER(1,0), 
	"CONTACT_NO" VARCHAR2(15 BYTE), 
	"ADDRESS" VARCHAR2(200 BYTE), 
	"EMAIL" VARCHAR2(100 BYTE), 
	"IMAGE" VARCHAR2(200 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table MESS_INFO
--------------------------------------------------------

  CREATE TABLE "ROOT"."MESS_INFO" 
   (	"ID" VARCHAR2(10 BYTE), 
	"MESS_MONTH" NUMBER(5,0), 
	"CHARGE_AMOUNT" NUMBER(10,2), 
	"FINE_RATE" NUMBER(10,2), 
	"START_DATE" DATE, 
	"FINISH_DATE" DATE, 
	"DURATION" NUMBER(10,0), 
	"FINE_START_DATE" DATE, 
	"STATUS" NUMBER(3,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table PAYMENT_INFO
--------------------------------------------------------

  CREATE TABLE "ROOT"."PAYMENT_INFO" 
   (	"STD_ID" VARCHAR2(8 BYTE), 
	"MESS_ID" VARCHAR2(10 BYTE), 
	"PAYMENT_DATE" DATE, 
	"BANK_SCROLL" NUMBER(10,0), 
	"SERIAL" NUMBER(3,0), 
	"AMOUNT" NUMBER(5,2), 
	"FINE_DUE" NUMBER(5,2), 
	"NORMAL_DUE" NUMBER(5,2)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table ROOM_INSERT_LOG
--------------------------------------------------------

  CREATE TABLE "ROOT"."ROOM_INSERT_LOG" 
   (	"UNAME" VARCHAR2(50 BYTE), 
	"UPDATE_DATE" DATE, 
	"MAINLOG" VARCHAR2(700 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table ROOM_UPDATE_LOG
--------------------------------------------------------

  CREATE TABLE "ROOT"."ROOM_UPDATE_LOG" 
   (	"UNAME" VARCHAR2(50 BYTE), 
	"UPDATE_DATE" DATE, 
	"MAINLOG" VARCHAR2(700 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table STUDENT
--------------------------------------------------------

  CREATE TABLE "ROOT"."STUDENT" 
   (	"ID" VARCHAR2(8 BYTE), 
	"NAME" VARCHAR2(100 BYTE), 
	"SLEVEL" NUMBER(1,0), 
	"TERM" NUMBER(1,0), 
	"PERMANENT_ADDRESS" VARCHAR2(100 BYTE), 
	"CURRENT_ADDRESS" VARCHAR2(100 BYTE), 
	"CONTACT" VARCHAR2(20 BYTE), 
	"GURDIAN_CONTACT" VARCHAR2(20 BYTE), 
	"EMAIL" VARCHAR2(50 BYTE), 
	"ROOM" NUMBER(4,0), 
	"STYPE" VARCHAR2(20 BYTE), 
	"IMAGE" VARCHAR2(150 BYTE), 
	"CGPA" NUMBER, 
	"GRAD_DATE" DATE DEFAULT '01-Jan-1970', 
	"DEPT" VARCHAR2(10 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table STUDENT_INSERT_LOG
--------------------------------------------------------

  CREATE TABLE "ROOT"."STUDENT_INSERT_LOG" 
   (	"UNAME" VARCHAR2(50 BYTE), 
	"INSERT_DATE" DATE, 
	"MAINLOG" VARCHAR2(700 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table STUDENT_UPDATE_LOG
--------------------------------------------------------

  CREATE TABLE "ROOT"."STUDENT_UPDATE_LOG" 
   (	"UNAME" VARCHAR2(50 BYTE), 
	"UPDATE_DATE" DATE, 
	"MAINLOG" VARCHAR2(700 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table USERS
--------------------------------------------------------

  CREATE TABLE "ROOT"."USERS" 
   (	"UNAME" VARCHAR2(10 BYTE), 
	"PASSWORD" VARCHAR2(50 BYTE), 
	"UTYPE" NUMBER(1,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
REM INSERTING into ROOT.ROOM
SET DEFINE OFF;
Insert into ROOT.ROOM (ID,RTYPE,RBLOCK,RFLOOR,MAX_STD,STDCOUNT,TABLECOUNT,LAMPCOUNT,BEDCOUNT,LOCKERCOUNT,CHAIRCOUNT) values (108,'resident','north',1,4,2,4,4,4,4,4);
Insert into ROOT.ROOM (ID,RTYPE,RBLOCK,RFLOOR,MAX_STD,STDCOUNT,TABLECOUNT,LAMPCOUNT,BEDCOUNT,LOCKERCOUNT,CHAIRCOUNT) values (109,'resident','north',1,4,0,4,4,4,4,4);
Insert into ROOT.ROOM (ID,RTYPE,RBLOCK,RFLOOR,MAX_STD,STDCOUNT,TABLECOUNT,LAMPCOUNT,BEDCOUNT,LOCKERCOUNT,CHAIRCOUNT) values (110,'resident','north',1,4,0,4,4,4,4,4);
Insert into ROOT.ROOM (ID,RTYPE,RBLOCK,RFLOOR,MAX_STD,STDCOUNT,TABLECOUNT,LAMPCOUNT,BEDCOUNT,LOCKERCOUNT,CHAIRCOUNT) values (111,'resident','north',1,4,0,4,4,4,4,4);
Insert into ROOT.ROOM (ID,RTYPE,RBLOCK,RFLOOR,MAX_STD,STDCOUNT,TABLECOUNT,LAMPCOUNT,BEDCOUNT,LOCKERCOUNT,CHAIRCOUNT) values (101,'resident','south',0,10,1,4,4,4,4,4);
Insert into ROOT.ROOM (ID,RTYPE,RBLOCK,RFLOOR,MAX_STD,STDCOUNT,TABLECOUNT,LAMPCOUNT,BEDCOUNT,LOCKERCOUNT,CHAIRCOUNT) values (0,'resident','north',0,10000000,0,4,4,4,4,4);
Insert into ROOT.ROOM (ID,RTYPE,RBLOCK,RFLOOR,MAX_STD,STDCOUNT,TABLECOUNT,LAMPCOUNT,BEDCOUNT,LOCKERCOUNT,CHAIRCOUNT) values (1,'resident','north',0,10000000,6,4,4,4,4,4);
Insert into ROOT.ROOM (ID,RTYPE,RBLOCK,RFLOOR,MAX_STD,STDCOUNT,TABLECOUNT,LAMPCOUNT,BEDCOUNT,LOCKERCOUNT,CHAIRCOUNT) values (3004,'resident','north',3,4,1,4,4,4,4,4);
Insert into ROOT.ROOM (ID,RTYPE,RBLOCK,RFLOOR,MAX_STD,STDCOUNT,TABLECOUNT,LAMPCOUNT,BEDCOUNT,LOCKERCOUNT,CHAIRCOUNT) values (102,'resident','north',1,4,1,4,4,4,4,4);
Insert into ROOT.ROOM (ID,RTYPE,RBLOCK,RFLOOR,MAX_STD,STDCOUNT,TABLECOUNT,LAMPCOUNT,BEDCOUNT,LOCKERCOUNT,CHAIRCOUNT) values (103,'resident','north',1,4,0,4,4,4,4,4);
Insert into ROOT.ROOM (ID,RTYPE,RBLOCK,RFLOOR,MAX_STD,STDCOUNT,TABLECOUNT,LAMPCOUNT,BEDCOUNT,LOCKERCOUNT,CHAIRCOUNT) values (104,'resident','north',1,4,2,4,4,4,4,4);
Insert into ROOT.ROOM (ID,RTYPE,RBLOCK,RFLOOR,MAX_STD,STDCOUNT,TABLECOUNT,LAMPCOUNT,BEDCOUNT,LOCKERCOUNT,CHAIRCOUNT) values (105,'resident','north',1,4,1,4,4,4,4,4);
Insert into ROOT.ROOM (ID,RTYPE,RBLOCK,RFLOOR,MAX_STD,STDCOUNT,TABLECOUNT,LAMPCOUNT,BEDCOUNT,LOCKERCOUNT,CHAIRCOUNT) values (2001,'resident','north',2,4,0,4,4,4,4,4);
Insert into ROOT.ROOM (ID,RTYPE,RBLOCK,RFLOOR,MAX_STD,STDCOUNT,TABLECOUNT,LAMPCOUNT,BEDCOUNT,LOCKERCOUNT,CHAIRCOUNT) values (2002,'resident','north',2,4,0,4,4,4,4,4);
Insert into ROOT.ROOM (ID,RTYPE,RBLOCK,RFLOOR,MAX_STD,STDCOUNT,TABLECOUNT,LAMPCOUNT,BEDCOUNT,LOCKERCOUNT,CHAIRCOUNT) values (2003,'resident','north',2,4,0,4,4,4,4,4);
Insert into ROOT.ROOM (ID,RTYPE,RBLOCK,RFLOOR,MAX_STD,STDCOUNT,TABLECOUNT,LAMPCOUNT,BEDCOUNT,LOCKERCOUNT,CHAIRCOUNT) values (2004,'resident','north',2,4,0,4,4,4,4,4);
Insert into ROOT.ROOM (ID,RTYPE,RBLOCK,RFLOOR,MAX_STD,STDCOUNT,TABLECOUNT,LAMPCOUNT,BEDCOUNT,LOCKERCOUNT,CHAIRCOUNT) values (2005,'resident','north',2,4,0,4,4,4,4,4);
Insert into ROOT.ROOM (ID,RTYPE,RBLOCK,RFLOOR,MAX_STD,STDCOUNT,TABLECOUNT,LAMPCOUNT,BEDCOUNT,LOCKERCOUNT,CHAIRCOUNT) values (2006,'resident','north',2,4,0,4,4,4,4,4);
REM INSERTING into ROOT.ADMIN_INFO
SET DEFINE OFF;
Insert into ROOT.ADMIN_INFO (ID,NAME,DESIGNATION,AUTH_LEVEL,CONTACT_NO,ADDRESS,EMAIL,IMAGE) values ('saeed','saeed','Student',2,'012313124','SBH','muntakim.sadik@yahoo.com',null);
Insert into ROOT.ADMIN_INFO (ID,NAME,DESIGNATION,AUTH_LEVEL,CONTACT_NO,ADDRESS,EMAIL,IMAGE) values ('muntakim','md. muntakim sadik','Super Admin',3,'01723999661','Dr. M. A. Rashid Hall, BUET, DHAKA','muntakim.sadik@yahoo.com','/images/09050032.jpg');
Insert into ROOT.ADMIN_INFO (ID,NAME,DESIGNATION,AUTH_LEVEL,CONTACT_NO,ADDRESS,EMAIL,IMAGE) values ('Taksir','md. taksir hasan majumder','Student',3,'01674949192','shere bangla hall, buet','mythoss1092019@gmail.com','/images/23022012084111.jpg');
REM INSERTING into ROOT.MESS_INFO
SET DEFINE OFF;
Insert into ROOT.MESS_INFO (ID,MESS_MONTH,CHARGE_AMOUNT,FINE_RATE,START_DATE,FINISH_DATE,DURATION,FINE_START_DATE,STATUS) values ('13-064',4,1200,10,to_date('09-AUG-13','DD-MON-RR'),to_date('08-SEP-13','DD-MON-RR'),30,to_date('19-AUG-13','DD-MON-RR'),0);
Insert into ROOT.MESS_INFO (ID,MESS_MONTH,CHARGE_AMOUNT,FINE_RATE,START_DATE,FINISH_DATE,DURATION,FINE_START_DATE,STATUS) values ('13-063',3,1200,10,to_date('09-AUG-13','DD-MON-RR'),to_date('08-SEP-13','DD-MON-RR'),30,to_date('19-AUG-13','DD-MON-RR'),1);
Insert into ROOT.MESS_INFO (ID,MESS_MONTH,CHARGE_AMOUNT,FINE_RATE,START_DATE,FINISH_DATE,DURATION,FINE_START_DATE,STATUS) values ('13-061',1,1200,10,to_date('08-AUG-13','DD-MON-RR'),to_date('07-SEP-13','DD-MON-RR'),30,to_date('18-AUG-13','DD-MON-RR'),0);
REM INSERTING into ROOT.PAYMENT_INFO
SET DEFINE OFF;
REM INSERTING into ROOT.ROOM_INSERT_LOG
SET DEFINE OFF;
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 101 resident north 0 10 0 4 4 4 4');
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 108 resident north 1 4 0 4 4 4 4');
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 109 resident north 1 4 0 4 4 4 4');
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 110 resident north 1 4 0 4 4 4 4');
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 111 resident north 1 4 0 4 4 4 4');
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 112 resident north 1 4 0 4 4 4 4');
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 1 resident north 0 10000000 0 4 4 4 4');
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0 resident north 0 10000000 0 4 4 4 4');
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 3004 resident north 3 4 0 4 4 4 4');
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 102 resident north 1 4 0 4 4 4 4');
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 103 resident north 1 4 0 4 4 4 4');
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 104 resident north 1 4 0 4 4 4 4');
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 105 resident north 1 4 0 4 4 4 4');
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 2001 resident north 2 4 0 4 4 4 4');
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 2002 resident north 2 4 0 4 4 4 4');
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 2003 resident north 2 4 0 4 4 4 4');
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 2004 resident north 2 4 0 4 4 4 4');
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 2005 resident north 2 4 0 4 4 4 4');
Insert into ROOT.ROOM_INSERT_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 2006 resident north 2 4 0 4 4 4 4');
REM INSERTING into ROOT.ROOM_UPDATE_LOG
SET DEFINE OFF;
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 501to 501,residentto resident,northto north, 5to 5, 4to 4, 0to -1, 4to 4, 4to 4, 4to 4, 4to 4');
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0to 0,residentto resident,northto north, 0to 0, 10000000to 10000000, -1to -2, 4to 4, 4to 4, 4to 4, 4to 4');
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 1to 1,residentto resident,northto north, 0to 0, 10000000to 10000000, 1to 0, 4to 4, 4to 4, 4to 4, 4to 4');
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 204to 204,residentto resident,northto north, 0to 0, 4to 4, 1to 0, 2to 2, 4to 4, 4to 4, 4to 4');
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 101to 101,residentto resident,northto south, 0to 0, 10to 10, 0to 0, 4to 4, 4to 4, 4to 4, 4to 4');
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 101to 101,residentto resident,southto south, 0to 0, 10to 10, 0to 1, 4to 4, 4to 4, 4to 4, 4to 4');
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 1to 1,residentto resident,northto north, 0to 0, 10000000to 10000000, 0to 1, 4to 4, 4to 4, 4to 4, 4to 4');
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 1to 1,residentto resident,northto north, 0to 0, 10000000to 10000000, 1to 2, 4to 4, 4to 4, 4to 4, 4to 4');
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 104to 104,residentto resident,northto north, 1to 1, 4to 4, 0to 1, 4to 4, 4to 4, 4to 4, 4to 4');
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 104to 104,residentto resident,northto north, 1to 1, 4to 4, 1to 2, 4to 4, 4to 4, 4to 4, 4to 4');
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 1to 1,residentto resident,northto north, 0to 0, 10000000to 10000000, 2to 3, 4to 4, 4to 4, 4to 4, 4to 4');
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 1to 1,residentto resident,northto north, 0to 0, 10000000to 10000000, 3to 4, 4to 4, 4to 4, 4to 4, 4to 4');
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 3004to 3004,residentto resident,northto north, 3to 3, 4to 4, 0to 1, 4to 4, 4to 4, 4to 4, 4to 4');
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 102to 102,residentto resident,northto north, 1to 1, 4to 4, 0to 1, 4to 4, 4to 4, 4to 4, 4to 4');
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 105to 105,residentto resident,northto north, 1to 1, 4to 4, 0to 1, 4to 4, 4to 4, 4to 4, 4to 4');
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 108to 108,residentto resident,northto north, 1to 1, 4to 4, 0to 1, 4to 4, 4to 4, 4to 4, 4to 4');
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 108to 108,residentto resident,northto north, 1to 1, 4to 4, 1to 2, 4to 4, 4to 4, 4to 4, 4to 4');
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 1to 1,residentto resident,northto north, 0to 0, 10000000to 10000000, 4to 5, 4to 4, 4to 4, 4to 4, 4to 4');
Insert into ROOT.ROOM_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 1to 1,residentto resident,northto north, 0to 0, 10000000to 10000000, 5to 6, 4to 4, 4to 4, 4to 4, 4to 4');
REM INSERTING into ROOT.STUDENT
SET DEFINE OFF;
Insert into ROOT.STUDENT (ID,NAME,SLEVEL,TERM,PERMANENT_ADDRESS,CURRENT_ADDRESS,CONTACT,GURDIAN_CONTACT,EMAIL,ROOM,STYPE,IMAGE,CGPA,GRAD_DATE,DEPT) values ('0905001','md.tarikul islam',-1,-1,'none','none','01712345678','01712345678',null,0,'alumni','/images/notFound.png',4,to_date('21-JUN-13','DD-MON-RR'),'CSE');
Insert into ROOT.STUDENT (ID,NAME,SLEVEL,TERM,PERMANENT_ADDRESS,CURRENT_ADDRESS,CONTACT,GURDIAN_CONTACT,EMAIL,ROOM,STYPE,IMAGE,CGPA,GRAD_DATE,DEPT) values ('0905003','md. muntakim sadik',3,2,'none','none','-1','-1',null,101,'resident','/images/notFound.png',3.7,to_date('01-JAN-70','DD-MON-RR'),'CSE');
Insert into ROOT.STUDENT (ID,NAME,SLEVEL,TERM,PERMANENT_ADDRESS,CURRENT_ADDRESS,CONTACT,GURDIAN_CONTACT,EMAIL,ROOM,STYPE,IMAGE,CGPA,GRAD_DATE,DEPT) values ('0905004','md. muntakim hasan',3,1,'none','none','0','0',null,1,'resident','/images/notFound.png',0,to_date('01-JAN-70','DD-MON-RR'),'CSE');
Insert into ROOT.STUDENT (ID,NAME,SLEVEL,TERM,PERMANENT_ADDRESS,CURRENT_ADDRESS,CONTACT,GURDIAN_CONTACT,EMAIL,ROOM,STYPE,IMAGE,CGPA,GRAD_DATE,DEPT) values ('0905005','shovon',3,1,'none','none','-1','-1','none',0,'attached','/images/notFound.png',-1,to_date('01-JAN-70','DD-MON-RR'),'CSE');
Insert into ROOT.STUDENT (ID,NAME,SLEVEL,TERM,PERMANENT_ADDRESS,CURRENT_ADDRESS,CONTACT,GURDIAN_CONTACT,EMAIL,ROOM,STYPE,IMAGE,CGPA,GRAD_DATE,DEPT) values ('0905024','ashiqul mostafa',-1,-1,'none','none','-1','-1','none',0,'alumni','/images/notFound.png',-1,to_date('01-JAN-70','DD-MON-RR'),'CSE');
Insert into ROOT.STUDENT (ID,NAME,SLEVEL,TERM,PERMANENT_ADDRESS,CURRENT_ADDRESS,CONTACT,GURDIAN_CONTACT,EMAIL,ROOM,STYPE,IMAGE,CGPA,GRAD_DATE,DEPT) values ('0906112','rashed rijul',1,1,null,null,null,null,null,104,'resident','/images/notFound.png',3.8,to_date('01-JAN-70','DD-MON-RR'),'EEE');
Insert into ROOT.STUDENT (ID,NAME,SLEVEL,TERM,PERMANENT_ADDRESS,CURRENT_ADDRESS,CONTACT,GURDIAN_CONTACT,EMAIL,ROOM,STYPE,IMAGE,CGPA,GRAD_DATE,DEPT) values ('0910002','bijooy sarker',2,1,'none','none','-1','-1','none',108,'resident','/images/notFound.png',-1,to_date('01-JAN-70','DD-MON-RR'),'ME');
Insert into ROOT.STUDENT (ID,NAME,SLEVEL,TERM,PERMANENT_ADDRESS,CURRENT_ADDRESS,CONTACT,GURDIAN_CONTACT,EMAIL,ROOM,STYPE,IMAGE,CGPA,GRAD_DATE,DEPT) values ('0904123','mamun rashid',1,1,'none','none','-1','-1','none',108,'resident','/images/notFound.png',-1,to_date('01-JAN-70','DD-MON-RR'),'CE');
Insert into ROOT.STUDENT (ID,NAME,SLEVEL,TERM,PERMANENT_ADDRESS,CURRENT_ADDRESS,CONTACT,GURDIAN_CONTACT,EMAIL,ROOM,STYPE,IMAGE,CGPA,GRAD_DATE,DEPT) values ('0916001','sakib sauro',4,2,null,null,'0','0',null,102,'resident','/images/notFound.png',2,to_date('01-JAN-70','DD-MON-RR'),'WRE');
Insert into ROOT.STUDENT (ID,NAME,SLEVEL,TERM,PERMANENT_ADDRESS,CURRENT_ADDRESS,CONTACT,GURDIAN_CONTACT,EMAIL,ROOM,STYPE,IMAGE,CGPA,GRAD_DATE,DEPT) values ('0604007','golam rabbi',0,0,null,null,'09020304','09008045',null,0,'alumni','/images/notFound.png',4,to_date('03-JUN-13','DD-MON-RR'),'CE');
Insert into ROOT.STUDENT (ID,NAME,SLEVEL,TERM,PERMANENT_ADDRESS,CURRENT_ADDRESS,CONTACT,GURDIAN_CONTACT,EMAIL,ROOM,STYPE,IMAGE,CGPA,GRAD_DATE,DEPT) values ('0708001','arman sadik',4,1,null,null,'09020304','01717076907',null,3004,'resident','/images/notFound.png',4,to_date('01-JAN-70','DD-MON-RR'),'IPE');
Insert into ROOT.STUDENT (ID,NAME,SLEVEL,TERM,PERMANENT_ADDRESS,CURRENT_ADDRESS,CONTACT,GURDIAN_CONTACT,EMAIL,ROOM,STYPE,IMAGE,CGPA,GRAD_DATE,DEPT) values ('0905002','md. taksir hasan majumder',3,1,'Comilla','SBH','01674949192','01711278874','mythoss1092019@gmail.com',104,'resident','/images/Untitled-1.jpg',3.86,to_date('01-JAN-70','DD-MON-RR'),'CSE');
Insert into ROOT.STUDENT (ID,NAME,SLEVEL,TERM,PERMANENT_ADDRESS,CURRENT_ADDRESS,CONTACT,GURDIAN_CONTACT,EMAIL,ROOM,STYPE,IMAGE,CGPA,GRAD_DATE,DEPT) values ('0608002','nahian  sadik',4,1,null,null,null,null,null,105,'resident','/images/notFound.png',4,to_date('01-JAN-70','DD-MON-RR'),'IPE');
Insert into ROOT.STUDENT (ID,NAME,SLEVEL,TERM,PERMANENT_ADDRESS,CURRENT_ADDRESS,CONTACT,GURDIAN_CONTACT,EMAIL,ROOM,STYPE,IMAGE,CGPA,GRAD_DATE,DEPT) values ('0910001','md. ashiqul hasan',3,2,'none','none','-1','-1','none',1,'resident','/images/notFound.png',-1,to_date('01-JAN-70','DD-MON-RR'),'ME');
Insert into ROOT.STUDENT (ID,NAME,SLEVEL,TERM,PERMANENT_ADDRESS,CURRENT_ADDRESS,CONTACT,GURDIAN_CONTACT,EMAIL,ROOM,STYPE,IMAGE,CGPA,GRAD_DATE,DEPT) values ('0806100','rizvi',2,1,'none','none','-1','-1','none',1,'resident','/images/notFound.png',-1,to_date('01-JAN-70','DD-MON-RR'),'EEE');
REM INSERTING into ROOT.STUDENT_INSERT_LOG
SET DEFINE OFF;
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('18-JUN-13','DD-MON-RR'),'Insert Operation: 0005061 tanvir 0 0      0 alumni /images/notFound.png 3.63 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('18-JUN-13','DD-MON-RR'),'Insert Operation: 0905002 taksir 3 1 fgsdf sfdgsd 234234 42342 sfg@fdgs.gdf 0 attached /images/notFound.png 3.86 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('18-JUN-13','DD-MON-RR'),'Insert Operation: 0904001 nai 4 2 fsafsa fsadfsda 324234 234234 fs@dfs.safsd 204 resident /images/notFound.png 2.33 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('18-JUN-13','DD-MON-RR'),'Insert Operation: 0905003 muntakim 3 1 sdfsd fas 01723999661 1231 dsfg@gfds.rsd 301 resident /images/notFound.png 3.33 ');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('18-JUN-13','DD-MON-RR'),'Insert Operation: 0910001 nai 0 0 sdfsf sgsfd 234 534 sdf@fds.fs 0 alumni /images/notFound.png 2.34 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('18-JUN-13','DD-MON-RR'),'Insert Operation: 1010001 nai2 0 0 fdgsdfg gsdgsd 34324 4234234 edf@dfs.fsf 0 alumni /images/notFound.png 4 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('18-JUN-13','DD-MON-RR'),'Insert Operation: 0905005 nainai 0 0 fsdf sfd 01723999661 012321314 SFSD@SFS.FS 0 alumni /images/notFound.png 3.65 19-JUN-13');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('18-JUN-13','DD-MON-RR'),'Insert Operation: 0905005 nainai 0 0 fsd sfd 01723999661 012321314 SFSD@SFS.FS 0 alumni /images/notFound.png 3.65 19-JUN-13');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0905003 muntakim 3 1 sdfsd fas 01723999661 1231 dsfg@gfds.rsd 0 resident /images/notFound.png 3.33 ');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0905056 farhan -1 -1 none none -1 -1 none 301 alumni /images/notFound.png -1 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0905003 muntakim 3 1 sdfsd fas 01723999661 1231 dsfg@gfds.rsd 301 resident /images/notFound.png 3.33 ');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0905056 farhan -1 -1 none none -1 -1 none 0 alumni /images/notFound.png -1 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0905003 muntakim 3 1 sdfsd fas 01723999661 1231 dsfg@gfds.rsd 0 resident /images/notFound.png 3.33 ');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0905003 muntakim 3 1 sdfsd fas 01723999661 1231 dsfg@gfds.rsd 501 resident /images/notFound.png 3.33 ');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0905024 saeed 3 1 sdfsad fsdfasfd 324 423 sdf@fdas.ffds 0 resident /images/notFound.png 3 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0905024 saeed 3 1 sdfsad fsdfasfd 324 423 sdf@fdas.ffds 501 resident /images/notFound.png 3 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0905003 muntakim 3 1 sdfsd fas 01723999661 1231 dsfg@gfds.rsd 0 resident /images/notFound.png 3.33 ');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0905001 papon 3 1 none none 0987 0987 gh@hg.vo 0 attached /images/mac_os_x_lion_wallpaper_.jpg 4 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0905001 papon 3 1 none none 0987 0987 gh@hg.vo 0 attached /images/mac_os_x_lion_wallpaper_.jpg 3.95 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0905002 md. taksir hasan majumder 3 1 Comilla SBH 01674949192 01711278874 mythoss1092019@gmail.com 101 resident /images/Untitled-1.jpg 3.86 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0905001 md.tarikul islam 4 1 none none -1 -1 none 0 attached /images/notFound.png -1 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0905003 md. muntakim sadik 3 2 none none -1 -1 none 1 resident /images/notFound.png -1 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0905004 md. muntakim sadik 3 1 none none -1 -1 none 1 resident /images/notFound.png -1 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0905005 shovon 3 1 none none -1 -1 none 0 attached /images/notFound.png -1 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0905024 ashiqul mostafa -1 -1 none none -1 -1 none 0 alumni /images/notFound.png -1 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0906112 rashed rijul 1 1      104 resident /images/notFound.png 3.8 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0910002 bijooy sarker 2 1 none none -1 -1 none 1 resident /images/notFound.png -1 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0904123 mamun rashid 1 1 none none -1 -1 none 1 resident /images/notFound.png -1 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0916001 sakib sauro 4 2      0 attached /images/notFound.png 2 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0604007 golam rabbi 0 0   09020304 09008045  0 alumni /images/notFound.png 4 03-JUN-13');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0708001 arman sadik 4 1   09020304 01717076907  3004 resident /images/notFound.png 4 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0608002 nahian  sadik 4 1      105 resident /images/notFound.png 4 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0910001 md. ashiqul hasan 3 2 none none -1 -1 none 1 resident /images/notFound.png -1 01-JAN-70');
Insert into ROOT.STUDENT_INSERT_LOG (UNAME,INSERT_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Insert Operation: 0806100 rizvi 2 1 none none -1 -1 none 1 resident /images/notFound.png -1 01-JAN-70');
REM INSERTING into ROOT.STUDENT_UPDATE_LOG
SET DEFINE OFF;
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905003to 0905003, md. muntakim sadikto md. muntakim sadik, 3to 3, 2to 2, noneto none, noneto none, -1to -1, -1to -1, noneto none, 1to 108, residentto resident, /images/notFound.pngto /images/notFound.png, -1to -1, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905004to 0905004, md. muntakim sadikto md. muntakim sadik, 3to 3, 1to 1, noneto none, noneto none, -1to -1, -1to -1, noneto none, 1to 108, residentto resident, /images/notFound.pngto /images/notFound.png, -1to -1, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905001to 0905001, md.tarikul islamto md.tarikul islam, 4to 4, 1to 1, noneto none, noneto none, -1to 01712345678, -1to 01712345678, noneto , 0to 0, attachedto attached, /images/notFound.pngto /images/notFound.png, -1to 4, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905001to 0905001, md.tarikul islamto md.tarikul islam, 4to 0, 1to 0, noneto none, noneto none, 01712345678to 01712345678, 01712345678to 01712345678, to , 0to 0, attachedto alumni, /images/notFound.pngto /images/notFound.png, 4to 4, 01-JAN-70to 21-JUN-13');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905001to 0905001, md.tarikul islamto md.tarikul islam, 0to -1, 0to -1, noneto none, noneto none, 01712345678to 01712345678, 01712345678to 01712345678, to , 0to 0, alumnito alumni, /images/notFound.pngto /images/notFound.png, 4to 4, 21-JUN-13to 21-JUN-13');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905002to 0905002, md. taksir hasan majumderto md. taksir hasan majumder, 3to 3, 1to 1, Comillato Comilla, SBHto SBH, 01674949192to 01674949192, 01711278874to 01711278874, mythoss1092019@gmail.comto mythoss1092019@gmail.com, 101to 108, residentto resident, /images/Untitled-1.jpgto /images/Untitled-1.jpg, 3.86to 3.86, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905004to 0905004, md. muntakim sadikto md. muntakim sadik, 3to 3, 1to 1, noneto none, noneto none, -1to -1, -1to -1, noneto none, 108to 101, residentto resident, /images/notFound.pngto /images/notFound.png, -1to -1, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905003to 0905003, md. muntakim sadikto md. muntakim sadik, 3to 3, 2to 2, noneto none, noneto none, -1to -1, -1to -1, noneto none, 108to 1, residentto resident, /images/notFound.pngto /images/notFound.png, -1to -1, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905002to 0905002, md. taksir hasan majumderto md. taksir hasan majumder, 3to 3, 1to 1, Comillato Comilla, SBHto SBH, 01674949192to 01674949192, 01711278874to 01711278874, mythoss1092019@gmail.comto mythoss1092019@gmail.com, 108to 1, residentto resident, /images/Untitled-1.jpgto /images/Untitled-1.jpg, 3.86to 3.86, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905002to 0905002, md. taksir hasan majumderto md. taksir hasan majumder, 3to 3, 1to 1, Comillato Comilla, SBHto SBH, 01674949192to 01674949192, 01711278874to 01711278874, mythoss1092019@gmail.comto mythoss1092019@gmail.com, 1to 101, residentto resident, /images/Untitled-1.jpgto /images/Untitled-1.jpg, 3.86to 3.86, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905004to 0905004, md. muntakim sadikto md. muntakim sadik, 3to 3, 1to 1, noneto none, noneto none, -1to -1, -1to -1, noneto none, 101to 1, residentto resident, /images/notFound.pngto /images/notFound.png, -1to -1, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905003to 0905003, md. muntakim sadikto md. muntakim sadik, 3to 3, 2to 2, noneto none, noneto none, -1to -1, -1to -1, noneto , 1to 101, residentto resident, /images/notFound.pngto /images/notFound.png, -1to 3.7, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905003to 0905003, md. muntakim sadikto md. muntakim sadik, 3to 3, 2to 2, noneto none, noneto none, -1to -1, -1to -1, to , 101to 1, residentto resident, /images/notFound.pngto /images/notFound.png, 3.7to 3.7, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905003to 0905003, md. muntakim sadikto md. muntakim sadik, 3to 3, 2to 2, noneto none, noneto none, -1to -1, -1to -1, to , 1to 104, residentto resident, /images/notFound.pngto /images/notFound.png, 3.7to 3.7, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905002to 0905002, md. taksir hasan majumderto md. taksir hasan majumder, 3to 3, 1to 1, Comillato Comilla, SBHto SBH, 01674949192to 01674949192, 01711278874to 01711278874, mythoss1092019@gmail.comto mythoss1092019@gmail.com, 101to 104, residentto resident, /images/Untitled-1.jpgto /images/Untitled-1.jpg, 3.86to 3.86, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905003to 0905003, md. muntakim sadikto md. muntakim sadik, 3to 3, 2to 2, noneto none, noneto none, -1to -1, -1to -1, to , 104to 101, residentto resident, /images/notFound.pngto /images/notFound.png, 3.7to 3.7, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905004to 0905004, md. muntakim sadikto md. muntakim sadik, 3to 3, 1to 1, noneto none, noneto none, -1to 0, -1to 0, noneto , 1to 1, residentto resident, /images/notFound.pngto /images/notFound.png, -1to 0, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905004to 0905004, md. muntakim sadikto md. muntakim hasan, 3to 3, 1to 1, noneto none, noneto none, 0to 0, 0to 0, to , 1to 1, residentto resident, /images/notFound.pngto /images/notFound.png, 0to 0, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0905002to 0905002, md. taksir hasan majumderto md. taksir hasan majumder, 3to 3, 1to 1, Comillato Comilla, SBHto SBH, 01674949192to 01674949192, 01711278874to 01711278874, mythoss1092019@gmail.comto mythoss1092019@gmail.com, 104to 104, residentto resident, /images/Untitled-1.jpgto /images/Untitled-1.jpg, 3.86to 3.86, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0916001to 0916001, sakib sauroto sakib sauro, 4to 4, 2to 2, to , to , to 0, to 0, to , 0to 102, attachedto resident, /images/notFound.pngto /images/notFound.png, 2to 2, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0910002to 0910002, bijooy sarkerto bijooy sarker, 2to 2, 1to 1, noneto none, noneto none, -1to -1, -1to -1, noneto none, 1to 108, residentto resident, /images/notFound.pngto /images/notFound.png, -1to -1, 01-JAN-70to 01-JAN-70');
Insert into ROOT.STUDENT_UPDATE_LOG (UNAME,UPDATE_DATE,MAINLOG) values ('ROOT',to_date('19-JUN-13','DD-MON-RR'),'Update Operation: 0904123to 0904123, mamun rashidto mamun rashid, 1to 1, 1to 1, noneto none, noneto none, -1to -1, -1to -1, noneto none, 1to 108, residentto resident, /images/notFound.pngto /images/notFound.png, -1to -1, 01-JAN-70to 01-JAN-70');
REM INSERTING into ROOT.USERS
SET DEFINE OFF;
Insert into ROOT.USERS (UNAME,PASSWORD,UTYPE) values ('0905002','81dc9bdb52d04dc20036dbd8313ed055',0);
Insert into ROOT.USERS (UNAME,PASSWORD,UTYPE) values ('muntakim','827ccb0eea8a706c4c34a16891f84e7b',1);
Insert into ROOT.USERS (UNAME,PASSWORD,UTYPE) values ('Taksir','81dc9bdb52d04dc20036dbd8313ed055',1);
Insert into ROOT.USERS (UNAME,PASSWORD,UTYPE) values ('0905001','81dc9bdb52d04dc20036dbd8313ed055',0);
Insert into ROOT.USERS (UNAME,PASSWORD,UTYPE) values ('0905003','81dc9bdb52d04dc20036dbd8313ed055',0);
Insert into ROOT.USERS (UNAME,PASSWORD,UTYPE) values ('0905004','81dc9bdb52d04dc20036dbd8313ed055',0);
Insert into ROOT.USERS (UNAME,PASSWORD,UTYPE) values ('0905005','81dc9bdb52d04dc20036dbd8313ed055',0);
Insert into ROOT.USERS (UNAME,PASSWORD,UTYPE) values ('0905024','81dc9bdb52d04dc20036dbd8313ed055',0);
Insert into ROOT.USERS (UNAME,PASSWORD,UTYPE) values ('0906112','81dc9bdb52d04dc20036dbd8313ed055',0);
Insert into ROOT.USERS (UNAME,PASSWORD,UTYPE) values ('0910002','81dc9bdb52d04dc20036dbd8313ed055',0);
Insert into ROOT.USERS (UNAME,PASSWORD,UTYPE) values ('0904123','81dc9bdb52d04dc20036dbd8313ed055',0);
Insert into ROOT.USERS (UNAME,PASSWORD,UTYPE) values ('0916001','81dc9bdb52d04dc20036dbd8313ed055',0);
Insert into ROOT.USERS (UNAME,PASSWORD,UTYPE) values ('0604007','81dc9bdb52d04dc20036dbd8313ed055',0);
Insert into ROOT.USERS (UNAME,PASSWORD,UTYPE) values ('0708001','81dc9bdb52d04dc20036dbd8313ed055',0);
Insert into ROOT.USERS (UNAME,PASSWORD,UTYPE) values ('saeed','81dc9bdb52d04dc20036dbd8313ed055',1);
Insert into ROOT.USERS (UNAME,PASSWORD,UTYPE) values ('0608002','81dc9bdb52d04dc20036dbd8313ed055',0);
Insert into ROOT.USERS (UNAME,PASSWORD,UTYPE) values ('0910001','81dc9bdb52d04dc20036dbd8313ed055',0);
Insert into ROOT.USERS (UNAME,PASSWORD,UTYPE) values ('0806100','81dc9bdb52d04dc20036dbd8313ed055',0);
--------------------------------------------------------
--  DDL for Index SYS_C007062
--------------------------------------------------------

  CREATE UNIQUE INDEX "ROOT"."SYS_C007062" ON "ROOT"."ROOM" ("ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Index SYS_C007074
--------------------------------------------------------

  CREATE UNIQUE INDEX "ROOT"."SYS_C007074" ON "ROOT"."ADMIN_INFO" ("ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Index SYS_C007083
--------------------------------------------------------

  CREATE UNIQUE INDEX "ROOT"."SYS_C007083" ON "ROOT"."MESS_INFO" ("ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Index SYS_C007068
--------------------------------------------------------

  CREATE UNIQUE INDEX "ROOT"."SYS_C007068" ON "ROOT"."STUDENT" ("ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Index SYS_C007058
--------------------------------------------------------

  CREATE UNIQUE INDEX "ROOT"."SYS_C007058" ON "ROOT"."USERS" ("UNAME") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  Constraints for Table ROOM
--------------------------------------------------------

  ALTER TABLE "ROOT"."ROOM" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "ROOT"."ROOM" MODIFY ("MAX_STD" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."ROOM" MODIFY ("RFLOOR" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."ROOM" MODIFY ("RBLOCK" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table ADMIN_INFO
--------------------------------------------------------

  ALTER TABLE "ROOT"."ADMIN_INFO" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "ROOT"."ADMIN_INFO" MODIFY ("DESIGNATION" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."ADMIN_INFO" MODIFY ("NAME" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."ADMIN_INFO" MODIFY ("ID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table MESS_INFO
--------------------------------------------------------

  ALTER TABLE "ROOT"."MESS_INFO" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "ROOT"."MESS_INFO" MODIFY ("FINE_START_DATE" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."MESS_INFO" MODIFY ("DURATION" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."MESS_INFO" MODIFY ("FINISH_DATE" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."MESS_INFO" MODIFY ("START_DATE" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."MESS_INFO" MODIFY ("FINE_RATE" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."MESS_INFO" MODIFY ("CHARGE_AMOUNT" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."MESS_INFO" MODIFY ("MESS_MONTH" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table PAYMENT_INFO
--------------------------------------------------------

  ALTER TABLE "ROOT"."PAYMENT_INFO" MODIFY ("NORMAL_DUE" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."PAYMENT_INFO" MODIFY ("FINE_DUE" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."PAYMENT_INFO" MODIFY ("AMOUNT" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."PAYMENT_INFO" MODIFY ("SERIAL" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."PAYMENT_INFO" MODIFY ("BANK_SCROLL" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."PAYMENT_INFO" MODIFY ("PAYMENT_DATE" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table STUDENT
--------------------------------------------------------

  ALTER TABLE "ROOT"."STUDENT" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "ROOT"."STUDENT" MODIFY ("STYPE" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."STUDENT" MODIFY ("TERM" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."STUDENT" MODIFY ("SLEVEL" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."STUDENT" MODIFY ("NAME" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."STUDENT" MODIFY ("ID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table USERS
--------------------------------------------------------

  ALTER TABLE "ROOT"."USERS" ADD PRIMARY KEY ("UNAME")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "ROOT"."USERS" MODIFY ("UTYPE" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."USERS" MODIFY ("PASSWORD" NOT NULL ENABLE);
  ALTER TABLE "ROOT"."USERS" MODIFY ("UNAME" NOT NULL ENABLE);
--------------------------------------------------------
--  Ref Constraints for Table ADMIN_INFO
--------------------------------------------------------

  ALTER TABLE "ROOT"."ADMIN_INFO" ADD FOREIGN KEY ("ID")
	  REFERENCES "ROOT"."USERS" ("UNAME") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table PAYMENT_INFO
--------------------------------------------------------

  ALTER TABLE "ROOT"."PAYMENT_INFO" ADD FOREIGN KEY ("STD_ID")
	  REFERENCES "ROOT"."STUDENT" ("ID") ENABLE;
  ALTER TABLE "ROOT"."PAYMENT_INFO" ADD FOREIGN KEY ("MESS_ID")
	  REFERENCES "ROOT"."MESS_INFO" ("ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table STUDENT
--------------------------------------------------------

  ALTER TABLE "ROOT"."STUDENT" ADD FOREIGN KEY ("ID")
	  REFERENCES "ROOT"."USERS" ("UNAME") ENABLE;
  ALTER TABLE "ROOT"."STUDENT" ADD FOREIGN KEY ("ROOM")
	  REFERENCES "ROOT"."ROOM" ("ID") ENABLE;
--------------------------------------------------------
--  DDL for Trigger ROOMINSERTLOG
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "ROOT"."ROOMINSERTLOG" 
  AFTER INSERT ON room
  FOR EACH ROW
DECLARE
	v_changeType varchar(20);
	v_mainlog varchar2(200);
BEGIN
     v_changeType := 'Insert Operation';
     v_mainlog := v_changeType||': '||:new.id||' '||:new.rtype||' '||:new.rblock||' '||:new.rfloor||' '||:new.max_std||' '||:new.stdcount||' '||:new.tablecount||' '||:new.lampcount||' '||:new.bedcount||' '||:new.lockercount;
INSERT INTO room_insert_log
   VALUES (USER,SYSDATE,v_mainlog);
END ROOMINSERTLOG;
/
ALTER TRIGGER "ROOT"."ROOMINSERTLOG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger ROOMUPDATELOG
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "ROOT"."ROOMUPDATELOG" 
  AFTER UPDATE ON ROOM
  FOR EACH ROW
DECLARE
	v_changeType varchar(20);
	v_mainlog varchar2(300);
BEGIN
     v_changeType := 'Update Operation';
     v_mainlog := v_changeType||': '||:old.id||'to '||:new.id||','||:old.rtype||'to '||:new.rtype||','||:old.rblock||'to '||:new.rblock||', '||:old.rfloor||'to '||:new.rfloor||', '||:old.max_std||'to '||:new.max_std||', '||:old.stdcount||'to '||:new.stdcount||', '||:old.tablecount||'to '||:new.tablecount||', '||:old.lampcount||'to '||:new.lampcount||', '||:old.bedcount||'to '||:new.bedcount||', '||:old.lockercount||'to '||:new.lockercount ;
INSERT INTO room_update_log
   VALUES (USER,SYSDATE,v_mainlog);
END ROOMUPDATELOG;
/
ALTER TRIGGER "ROOT"."ROOMUPDATELOG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger CREATE_ADMIN
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "ROOT"."CREATE_ADMIN" 
before insert on admin_info
for each row
declare
stdno users.uname%type;
tmp number;
begin
  stdno := :new.id;
  select count(*) into tmp from users where uname=stdno;
  if tmp>=1 then
    raise_application_error('-20101','Admin already exists');
  end if;
  insert into users values(stdno,'81dc9bdb52d04dc20036dbd8313ed055',1); --- 0 is the student type
  :new.name := lower(:new.name);
end aut_inc;
/
ALTER TRIGGER "ROOT"."CREATE_ADMIN" ENABLE;
--------------------------------------------------------
--  DDL for Trigger MESS_STATUS
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "ROOT"."MESS_STATUS" 
before insert on mess_info
for each row
declare 
  cursor cur is
    select id from mess_info where status=1;
  curval cur%rowtype;
  val mess_info.id%type;
begin
  open cur;
  fetch cur into curval;
  while cur%found loop
    val := curval.id;
    update mess_info set status=0 where id = val;
    fetch cur into curval;
  end loop;
  close cur;
end;
/
ALTER TRIGGER "ROOT"."MESS_STATUS" ENABLE;
--------------------------------------------------------
--  DDL for Trigger CREATE_USER
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "ROOT"."CREATE_USER" 
before insert on student
for each row
declare
stdno users.uname%type;
tmp number;
begin
  stdno := :new.id;
  select count(*) into tmp from users where uname=stdno;
  if tmp>=1 then
    raise_application_error('-20101','Student already exists');
  end if;
  insert into users values(stdno,'81dc9bdb52d04dc20036dbd8313ed055',0); --- 0 is the student type
  :new.name := lower(:new.name);
end aut_inc;
/
ALTER TRIGGER "ROOT"."CREATE_USER" ENABLE;
--------------------------------------------------------
--  DDL for Trigger STD_REMOVE
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "ROOT"."STD_REMOVE" 
after delete on student
for each row
declare
stdno users.uname%type;
sroom student.room%type;
curcount room.stdcount%type;
begin
  stdno := :old.id;
  delete from users where uname=stdno;
  if :old.stype = 'resident' then
    sroom := :old.room;
    select stdcount into curcount from room where id=sroom;
    curcount := curcount-1;
    update room set stdcount=curcount where id=sroom;
  end if;
end std_remove;
/
ALTER TRIGGER "ROOT"."STD_REMOVE" ENABLE;
--------------------------------------------------------
--  DDL for Trigger STUDENTINSERTLOG
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "ROOT"."STUDENTINSERTLOG" 
  AFTER INSERT ON STUDENT
  FOR EACH ROW
DECLARE
	v_changeType varchar(20);
	v_mainlog varchar2(700);
BEGIN
     v_changeType := 'Insert Operation';
     v_mainlog := v_changeType||': '||:new.id||' '||:new.name||' '||:new.slevel||' '||:new.term||' '||:new.permanent_address||' '||:new.current_address||' '||:new.contact||' '||:new.gurdian_contact||' '||:new.email||' '||:new.room||' '||:new.stype||' '||:new.image||' '||:new.cgpa||' '||:new.grad_date;
INSERT INTO student_insert_log
   VALUES (USER,SYSDATE,v_mainlog);
END STUDENTINSERTLOG;
/
ALTER TRIGGER "ROOT"."STUDENTINSERTLOG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger STUDENTUPDATELOG
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "ROOT"."STUDENTUPDATELOG" 
  AFTER UPDATE ON STUDENT
  FOR EACH ROW
DECLARE
	v_changeType varchar(20);
	v_mainlog varchar2(1500);
BEGIN
     v_changeType := 'Update Operation';
     v_mainlog := v_changeType||': '||:old.id||'to '||:new.id||', '||:old.name||'to '||:new.name||', '||:old.slevel||'to '||:new.slevel||', '||:old.term||'to '||:new.term||', '||:old.permanent_address||'to '||:new.permanent_address||', '||:old.current_address||'to '||:new.current_address||', '||:old.contact||'to '||:new.contact||', '||:old.gurdian_contact||'to '||:new.gurdian_contact||', '||:old.email||'to '||:new.email||', '||:old.room||'to '||:new.room||', '||:old.stype||'to '||:new.stype||', '||:old.image||'to '||:new.image||', '||:old.cgpa||'to '||:new.cgpa||', '||:old.grad_date||'to '||:new.grad_date;
INSERT INTO student_update_log
   VALUES (USER,SYSDATE,v_mainlog);
END STUDENTUPDATELOG;
/
ALTER TRIGGER "ROOT"."STUDENTUPDATELOG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger AUTO_INC
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "ROOT"."AUTO_INC" 
after insert or update on student
for each row
declare
roomno room.id%type;
stdno student.id%type;
curcount room.stdcount%type;
begin
  roomno := :new.room;
  stdno := :new.id;
  if inserting and :new.stype='resident' then
    select stdcount into curcount from room where id=roomno;
    curcount := curcount+1;
    update room set stdcount=curcount where id =roomno;
  end if;
  if updating and :new.stype='resident' and :old.stype<>'resident' then
    select stdcount into curcount from room where id=roomno;
    curcount := curcount+1;
    update room set stdcount=curcount where id =roomno;
  end if;
  if updating and :old.room=1 and :new.room>1 then
  	select stdcount into curcount from room where id=roomno;
    curcount := curcount+1;
    update room set stdcount=curcount where id =roomno;
  end if;
  if updating and :old.stype='resident' and :new.stype<>'resident' then
    select stdcount into curcount from room where id=roomno;
    curcount := curcount-1;
    update room set stdcount=curcount where id =roomno;
  end if;
end aut_inc;
/
ALTER TRIGGER "ROOT"."AUTO_INC" ENABLE;
