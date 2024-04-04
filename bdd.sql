#DROP TABLE maillotsdom;

CREATE TABLE maillots
  (idmaillot    VARCHAR(15)    NOT NULL,
   marque    VARCHAR(15)    NULL,
   type   	 VARCHAR(5)    NULL,
   CONSTRAINT cle_comp PRIMARY KEY (refcomp)
  );

INSERT INTO maillots VALUES('MS6260S','Matsonic MS6260','Matsonic','CM');
INSERT INTO maillots VALUES('P5A','Asus P5A ATX','Asus','CM');
INSERT INTO maillots VALUES('BH6','Abit BH6 ATX','Abit','CM');
