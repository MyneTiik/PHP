#DROP TABLE maillot_dom;

CREATE TABLE maillot_dom
  (idequipe    VARCHAR(15)    NOT NULL,
   idmaillotdom    VARCHAR(15)    NOT NULL,
   nomequipe    VARCHAR(15)    NOT NULL,
   marque    VARCHAR(15)    NULL,
   CONSTRAINT cle_comp PRIMARY KEY (refcomp)
  );

INSERT INTO maillots VALUES('1','1','Liverpool','Nike');
INSERT INTO maillots VALUES('2','2','Manchester City','Puma');
INSERT INTO maillots VALUES('3','3','Arsenal','Adidas');



#DROP TABLE maillot_exte;

CREATE TABLE maillot_exte
  (idequipe    VARCHAR(15)    NOT NULL,
   idmaillotexte    VARCHAR(15)    NOT NULL,
   nomequipe    VARCHAR(15)    NOT NULL,
   marque    VARCHAR(15)    NULL,
   CONSTRAINT cle_comp PRIMARY KEY (idequipe)
  );

INSERT INTO maillots VALUES('1','1','Liverpool','Nike');
INSERT INTO maillots VALUES('2','2','Manchester City','Puma');
INSERT INTO maillots VALUES('3','3','Arsenal','Adidas');
