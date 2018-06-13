DROP DATABASE IF EXISTS `bilderdb`;
CREATE DATABASE IF NOT EXISTS `bilderdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_german2_ci;

--benutzer
CREATE TABLE benutzer(uid int PRIMARY KEY AUTO_INCREMENT,
                        email varchar(50),
                        firstname varchar(30),
                        lastname varchar(30),
                        passwort char(60),
                        role int(4)
                        );

--Gallerie
CREATE TABLE gallerie(gid int PRIMARY KEY AUTO_INCREMENT,
                        uid int,
                        name varchar(30),
                        beschreibung varchar(100),
                         FOREIGN KEY (uid) REFERENCES benutzer(uid) on delete cascade
                        );

--Picture
 CREATE TABLE picture(pid int PRIMARY KEY AUTO_INCREMENT,
                    
                     gid int,
                     picture varchar(70),
                     title varchar(50),
                     beschreibung varchar(200),
                     FOREIGN KEY (uid) REFERENCES benutzer(uid) on delete cascade,
                     FOREIGN KEY (gid) REFERENCES gallerie(gid) on delete cascade
                     );
--tag
CREATE TABLE tags(tid int PRIMARY KEY AUTO_INCREMENT,
                 pid int,
                 tag varchar(20),
                  FOREIGN KEY (pid) REFERENCES picture(pid) on delete cascade
                 );

--role
CREATE TABLE role(rid int PRIMARY KEY AUTO_INCREMENT,
                    role varchar(50),
                    beschreibung varchar(200)
                );

--userPicture
CREATE TABLE userPicture(upid int PRIMARY KEY AUTO_INCREMENT,
                         uid int,
                         pid int,
                         tid int,
                         FOREIGN KEY (uid) REFERENCES benutzer(uid) on delete cascade,
                         FOREIGN KEY (pid) REFERENCES picture(pid) on delete cascade,
                         FOREIGN KEY (tid) REFERENCES tags(tid) on delete cascade
                         );


