#DROP TABLE maillot_dom;

CREATE TABLE maillot_dom
  (idequipe    VARCHAR(3)    NOT NULL,
   idmaillotdom    VARCHAR(3)    NOT NULL,
   nomequipe    VARCHAR(20)    NOT NULL,
   marque    VARCHAR(15)    NULL,
   CONSTRAINT cle_comp PRIMARY KEY (refcomp)
  );

INSERT INTO maillots VALUES('1','1','Liverpool','Nike');
INSERT INTO maillots VALUES('2','2','Manchester City','Puma');
INSERT INTO maillots VALUES('3','3','Arsenal','Adidas');
INSERT INTO maillots VALUES('4','4','Manchester United','Adidas');
INSERT INTO maillots VALUES('5','5','Lutton','Umbro');


#DROP TABLE maillot_exte;

CREATE TABLE maillot_exte
  (idequipe    VARCHAR(3)    NOT NULL,
   idmaillotexte    VARCHAR(3)    NOT NULL,
   nomequipe    VARCHAR(20)    NOT NULL,
   marque    VARCHAR(15)    NULL,
   CONSTRAINT cle_comp PRIMARY KEY (idequipe)
  );

INSERT INTO maillots VALUES('1','1','Liverpool','Nike');
INSERT INTO maillots VALUES('2','2','Manchester City','Puma');
INSERT INTO maillots VALUES('3','3','Arsenal','Adidas');
INSERT INTO maillots VALUES('4','4','Manchester United','Adidas');
INSERT INTO maillots VALUES('5','5','Lutton','Umbro');
