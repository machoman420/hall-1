--------------------------------------------------------
--  File created - Wednesday-June-19-2013   
--------------------------------------------------------
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
