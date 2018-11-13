use mysql;
drop database IF EXISTS dbMagazines;
create database dbMagazines;
use dbMagazines;


create table tbLogins (
LoginID varchar (20) NOT NULL,
UserPassword varchar (20) NOT NULL,
Access varchar(1) NOT NULL,
PRIMARY KEY (LoginID)
);
go

create table tbInvalidLogins(
InvID int not null AUTO_INCREMENT,
InvDate date,
InvLoginID varchar (20),
InvPassword varchar (20),
PRIMARY KEY(InvID)
);
go

create table tbMagazines (
MagID int not null AUTO_INCREMENT,
MagName varchar (20) not null,
MagDescription varchar (350) not null,
MagPrice decimal(10,2),
MagPicture varchar (50) not null,
PRIMARY KEY (MagID)
);
go

create table tbCart (
CartID int not null AUTO_INCREMENT,
LoginID varchar (20) not null,
MagID int not null,
PRIMARY KEY (CartID),
FOREIGN KEY (LoginID) REFERENCES tbLogins(LoginID),
FOREIGN KEY (MagID) REFERENCES tbMagazines(MagID)
);
go

create table tbSubscriptions (
SubID int not null AUTO_INCREMENT,
SubDate date not null,
SubPrice decimal(10,2) not null,
LoginID varchar (20) not null,
MagID int not null,
PRIMARY KEY(SubID),
FOREIGN KEY (LoginID) REFERENCES tbLogins(LoginID),
FOREIGN KEY (MagID) REFERENCES tbMagazines(MagID)
);
go

DELIMITER //
CREATE PROCEDURE spCreateLogin (
IN login_ID varchar(20),
IN user_Password varchar (20),
IN access varchar(1)
)
BEGIN
if exists (select * from tbLogins where 
LoginID = login_ID and UserPassword = user_Password) then
select 'Exists' as LoginExists;
else
insert into tbLogins (LoginID,UserPassword,Access) values (login_ID,user_Password,'u');
select 'User created' as LoginExists;
end if;
end//
DELIMITER ;
go

DELIMITER //
CREATE PROCEDURE spLogin(
IN login_ID varchar(20),
IN user_Password varchar (20)
)
BEGIN
if exists (select * from tbLogins where 
LoginID = login_ID and UserPassword = user_Password) then
select 'Login OK' as LoginStatus;
else
select 'Invalid login' as LoginStatus;
insert into tbInvalidLogins (InvLoginID, InvPassword, InvDate) values
(login_ID, user_Password, CURDATE());
end if;
end//
DELIMITER ;
go

DELIMITER //
CREATE PROCEDURE spReadLogin(
IN login_ID varchar(20)
)
BEGIN
select LoginID from tbLogins where LoginID = login_ID;
end//
DELIMITER ;
go

DELIMITER //
CREATE PROCEDURE spUpdatePassword(
IN user_Password varchar (20),
IN login_ID varchar(20)
)
BEGIN
update tbLogins set UserPassword = user_Password where LoginID = login_ID;
end//
DELIMITER ;
go

DELIMITER //
CREATE PROCEDURE spMagRead ()
BEGIN
SELECT * FROM tbMagazines;
END //
DELIMITER ;
go

DELIMITER //
CREATE PROCEDURE spMagAdd (
    in mag_name varchar (50),
    in mag_description varchar (250),
    in mag_price decimal(10,2),
    in path varchar (25)
)
BEGIN
insert into tbMagazines (MagName, MagDescription, MagPrice, MagPicture) values
(mag_name, mag_description, mag_price, path);
END//
DELIMITER ;
go

DELIMITER //
CREATE PROCEDURE spMagDelete (
    in mag_id int
)
BEGIN
DELETE FROM tbMagazines 
WHERE MagID = mag_id;
END//
DELIMITER ;
go

DELIMITER //
CREATE PROCEDURE spMagUpdate (
    in mag_name varchar (50),
    in mag_description varchar (250),
    in mag_price decimal(10,2),
    in path varchar (25),
    in mag_id int
)
BEGIN
update tbMagazines Set MagName=mag_name, MagDescription=mag_description, MagPrice=mag_price, MagPicture=path
WHERE MagID=mag_id;
END//
DELIMITER ;

call spCreateLogin('Joan', '111', 'u');
call spCreateLogin('Austin', '222', 'u');
call spCreateLogin('Anakin', '333', 'u');
call spCreateLogin('Darth', '444', 'a');


call spMagAdd('Forbes','Personal finance magazine','59.96','./Pictures/forbes.jpg');
call spMagAdd('Entrepreneur','Business and finance magazine','21.97','./Pictures/entrepr.jpg');
call spMagAdd('Inc','Magazine for the most-innovative companies','12.00','./Pictures/inc.jpg');
call spMagAdd('Time','Weekly news magazine','60','./Pictures/time.jpg');
call spMagAdd('Vogue','Ultimate womens fashion magazine','19.99','./Pictures/vogue.jpg');

