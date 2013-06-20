drop table payment_info;
drop table mess_info;
drop table student;
drop table admin_info;
drop table room;
drop table user;

create table users(
	uname varchar2(10) primary key not null,
	password varchar2(50) not null,
	utype number(1) not null
);


create table room(
	id number(4) primary key,
	rtype varchar2(20),
	rblock varchar2(8) not null,
	rfloor number(1) not null,
	max_std number(2) not null,
	stdcount number(2),
	tablecount number(2),
	lampcount number(2),
	bedcount number(2),
	lockercount number(2)
);


create table student(
	id varchar2(8) not null references users(uname),
	name varchar2(100) not null,
	slevel number(1) not null,
	term number(1) not null,
	permanent_address varchar2(100),
	current_address varchar2(100),
	contact  varchar2(15),
	gurdian_contact varchar2(15),
	email varchar2(50),
	room number(4) references room(id),
	stype number(1) not null,
	image varchar2(150),
	cgpa number(1,2),
	grad_date date,
  primary key (id)
);

create table admin_info(
	id varchar2(10) not null references users(uname),
	name varchar2(100) not null,
	designation varchar2(50) not null,
	auth_level number(1),
	contact_no varchar2(15),
	address varchar2(200),
	email varchar2(100),
	primary key(id)
);



create table mess_info(
	id varchar2(10) primary key,
	mess_month number(2) not null,
	charge_amount number(5,2) not null,
	fine_rate number(3,2) not null,
	start_date date not null,
	finish_date date not null,
	duration number(2) not null,
	fine_start_date date not null,
	status number(1)
);


create table payment_info(
	std_id varchar2(8) references student(id),
	mess_id varchar2(10) references mess_info(id),
	payment_date date  not null,
	bank_scroll number(10) not null,
	serial number(3) not null,
	amount number(5,2) not null,
	fine_due number(5,2) not null,
	normal_due number(5,2) not null
);





create or replace 
trigger auto_inc
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





create or replace 
trigger create_user
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



create or replace 
trigger create_admin
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





create or replace trigger std_remove
after delete on student
for each row
declare
stdno users.uname%type;
sroom student.room%type;
curcount room.stdcount%type;
begin
  stdno := :new.id;
  delete from users where uname=stdno;
  if :new.stype = 'resident' then
    sroom := :new.room;
    select stdcount into curcount from room where id=sroom;
    curcount := curcount-1;
    update room set stdcount=curcount where id=sroom;
  end if;
end std_remove;
/



create or replace trigger mess_status
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







create table student_insert_log(
    uname varchar2(50),
    insert_date date,
    mainlog varchar2(700)
);


CREATE OR REPLACE TRIGGER STUDENTINSERTLOG
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



create table student_update_log(
    uname varchar2(50),
    update_date date,
    mainlog varchar2(700)
);

CREATE OR REPLACE TRIGGER STUDENTUPDATELOG
  AFTER UPDATE ON STUDENT
  FOR EACH ROW
DECLARE
	v_changeType varchar(20);
	v_mainlog varchar2(1500);
BEGIN
     v_changeType := 'Update Operation';
     v_mainlog := v_changeType||': '||:old.id||' to '||:new.id||', '||:old.name||' to '||:new.name||', '||:old.slevel||' to '||:new.slevel||', '||:old.term||' to '||:new.term||', '||:old.permanent_address||' to '||:new.permanent_address||', '||:old.current_address||' to '||:new.current_address||', '||:old.contact||' to '||:new.contact||', '||:old.gurdian_contact||' to '||:new.gurdian_contact||', '||:old.email||' to '||:new.email||', '||:old.room||' to '||:new.room||', '||:old.stype||' to '||:new.stype||', '||:old.image||' to '||:new.image||', '||:old.cgpa||' to '||:new.cgpa||', '||:old.grad_date||' to '||:new.grad_date;
INSERT INTO student_update_log
   VALUES (USER,SYSDATE,v_mainlog);
END STUDENTUPDATELOG;
/




create table room_update_log(
    uname varchar2(50),
    update_date date,
    mainlog varchar2(700)
);


CREATE OR REPLACE TRIGGER ROOMUPDATELOG
  AFTER UPDATE ON ROOM
  FOR EACH ROW
DECLARE
	v_changeType varchar(20);
	v_mainlog varchar2(300);
BEGIN
     v_changeType := 'Update Operation';
     v_mainlog := v_changeType||': '||:old.id||' to '||:new.id||','||:old.rtype||' to '||:new.rtype||','||:old.rblock||' to '||:new.rblock||', '||:old.rfloor||' to '||:new.rfloor||', '||:old.max_std||' to '||:new.max_std||', '||:old.stdcount||' to '||:new.stdcount||', '||:old.tablecount||' to '||:new.tablecount||', '||:old.lampcount||' to '||:new.lampcount||', '||:old.bedcount||' to '||:new.bedcount||', '||:old.lockercount||' to '||:new.lockercount ;
INSERT INTO room_update_log
   VALUES (USER,SYSDATE,v_mainlog);
END ROOMUPDATELOG;



create table room_insert_log(
    uname varchar2(50),
    update_date date,
    mainlog varchar2(700)
);



CREATE OR REPLACE TRIGGER ROOMINSERTLOG
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
