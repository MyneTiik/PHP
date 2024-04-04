BEGIN TRANSACTION;

DROP TABLE IF EXISTS maillot_dom;

CREATE TABLE maillot_dom
  (idequipe    INTEGER    PRIMARY KEY,
   idmaillotdom    INTEGER    NOT NULL,
   nomequipe    TEXT    NOT NULL,
   marque    TEXT    NOT NULL
   );

INSERT INTO maillot_dom VALUES(1,1,'Liverpool','Nike');
INSERT INTO maillot_dom VALUES(2,2,'Manchester City','Puma');
INSERT INTO maillot_dom VALUES(3,3,'Arsenal','Adidas');
INSERT INTO maillot_dom VALUES(4,4,'Manchester United','Adidas');
INSERT INTO maillot_dom VALUES(5,5,'Lutton','Umbro');


DROP TABLE IF EXISTS maillot_exte;

CREATE TABLE maillot_exte
  (idequipe    INTEGER    PRIMARY KEY,
   idmaillotexte    INTEGER    NOT NULL,
   nomequipe    TEXT    NOT NULL,
   marque    TEXT    NOT NULL
   );

INSERT INTO maillot_exte VALUES(1,11,'Liverpool','Nike');
INSERT INTO maillot_exte VALUES(2,21,'Manchester City','Puma');
INSERT INTO maillot_exte VALUES(3,31,'Arsenal','Adidas');
INSERT INTO maillot_exte VALUES(4,41,'Manchester United','Adidas');
INSERT INTO maillot_exte VALUES(5,51,'Lutton','Umbro');



COMMIT;
