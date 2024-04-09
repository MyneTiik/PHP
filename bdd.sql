BEGIN TRANSACTION;

DROP TABLE IF EXISTS maillot_dom;

CREATE TABLE maillot_dom
  (idequipe    INTEGER    PRIMARY KEY,
   idmaillotdom    INTEGER    NOT NULL,
   nomequipe    TEXT    NOT NULL,
   marque    TEXT    NOT NULL,
   prix    INTEGER    NOT NULL,
   im_avant    TEXT    NOT NULL,
   im_dos    TEXT    NOT NULL 
  );

INSERT INTO maillot_dom VALUES(1,1,'Liverpool','Nike',9999,'ressource_image/liverpool_dom_avant.jpeg','ressource_image/liverpool_dom_avant.jpeg');
INSERT INTO maillot_dom VALUES(2,2,'Manchester City','Puma',90,'ressource_image/mancity_dom_avant.jpeg','ressource_image/mancity_dom_avant.jpeg');
INSERT INTO maillot_dom VALUES(3,3,'Arsenal','Adidas',85,'ressource_image/arsenal_dom_avant.jpeg','ressource_image/arsenal_dom_avant.jpeg');
INSERT INTO maillot_dom VALUES(4,4,'Manchester United','Adidas',75,'ressource_image/manunited_dom_avant.jpeg','ressource_image/manunited_dom_avant.jpeg');
INSERT INTO maillot_dom VALUES(5,5,'Luton','Umbro',90,'ressource_image/luton_dom_avant.jpeg','ressource_image/luton_dom_avant.jpeg');


DROP TABLE IF EXISTS maillot_exte;

CREATE TABLE maillot_exte
  (idequipe    INTEGER    PRIMARY KEY,
   idmaillotexte    INTEGER    NOT NULL,
   nomequipe    TEXT    NOT NULL,
   marque    TEXT    NOT NULL,
   prix    INTEGER    NOT NULL,
   im_avant    TEXT    NOT NULL,
   im_dos    TEXT    NOT NULL 
   );

INSERT INTO maillot_exte VALUES(1,1,'Liverpool','Nike',9999,'ressource_image/liverpool_exte_avant.jpeg','ressource_image/liverpool_exte_avant.jpeg');
INSERT INTO maillot_exte VALUES(2,2,'Manchester City','Puma',90,'ressource_image/mancity_exte_avant.jpeg','ressource_image/mancity_exte_avant.jpeg');
INSERT INTO maillot_exte VALUES(3,3,'Arsenal','Adidas',85,'ressource_image/arsenal_exte_avant.jpeg','ressource_image/arsenal_exte_avant.jpeg');
INSERT INTO maillot_exte VALUES(4,4,'Manchester United','Adidas',75,'ressource_image/manunited_exte_avant.jpeg','ressource_image/manunited_exte_avant.jpeg');
INSERT INTO maillot_exte VALUES(5,5,'Luton','Umbro',90,'ressource_image/luton_exte_avant.jpeg','ressource_image/luton_exte_avant.jpeg');



COMMIT;
