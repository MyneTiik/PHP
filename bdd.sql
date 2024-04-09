BEGIN TRANSACTION;

DROP TABLE IF EXISTS maillot_dom;

CREATE TABLE maillot_dom
  (idequipe    INTEGER    PRIMARY KEY,
   idmaillotdom    INTEGER    NOT NULL,
   nomequipe    TEXT    NOT NULL,
   marque    TEXT    NOT NULL,
   prix    INTEGER    NOT NULL
   );

INSERT INTO maillot_dom VALUES(1,1,'Liverpool','Nike',9999);
INSERT INTO maillot_dom VALUES(2,2,'Manchester City','Puma',90);
INSERT INTO maillot_dom VALUES(3,3,'Arsenal','Adidas',85);
INSERT INTO maillot_dom VALUES(4,4,'Manchester United','Adidas',75);
INSERT INTO maillot_dom VALUES(5,5,'Lutton','Umbro',90);


DROP TABLE IF EXISTS maillot_exte;

CREATE TABLE maillot_exte
  (idequipe    INTEGER    PRIMARY KEY,
   idmaillotexte    INTEGER    NOT NULL,
   nomequipe    TEXT    NOT NULL,
   marque    TEXT    NOT NULL,
   prix    INTEGER    NOT NULL
   );

INSERT INTO maillot_exte VALUES(1,1,'Liverpool','Nike',9999);
INSERT INTO maillot_exte VALUES(2,2,'Manchester City','Puma',90);
INSERT INTO maillot_exte VALUES(3,3,'Arsenal','Adidas',85);
INSERT INTO maillot_exte VALUES(4,4,'Manchester United','Adidas',75);
INSERT INTO maillot_exte VALUES(5,5,'Lutton','Umbro',90);



COMMIT;
