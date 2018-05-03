DROP DATABASE IF EXISTS `bilderdb`;
CREATE DATABASE IF NOT EXISTS `bilderdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_german2_ci;


-- Picture
CREATE TABLE picture(pid int PRIMARY KEY AUTO_INCREMENT,
                     picture Blob,
                     title varchar(50),
                     beschreibung varchar(200));

--role

CREATE TABLE role(rid int PRIMARY KEY AUTO_INCREMENT,
                  role varchar(50),
                  beschreibung varchar(200)
);

--tag

CREATE TABLE tags(tid int PRIMARY KEY AUTO_INCREMENT,
                 tag varchar(20));

--userPicture

CREATE TABLE userPicture(upid int PRIMARY KEY AUTO_INCREMENT,
                         uid int,
                         pid int,
                         tid int );