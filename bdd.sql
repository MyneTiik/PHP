BEGIN TRANSACTION;

DROP TABLE IF EXISTS maillot_dom;

CREATE TABLE maillot_dom
  (idequipe    INTEGER    PRIMARY KEY,
   nomequipe    TEXT    NOT NULL,
   marque    TEXT    NOT NULL,
   prix    INTEGER    NOT NULL,
   im_avant    TEXT    NOT NULL,
   im_dos    TEXT    NOT NULL 
  );

INSERT INTO maillot_dom VALUES(1,'Liverpool','Nike',9999,'liverpool_dom_avant.jpeg','liverpool_dom_dos.jpeg');
INSERT INTO maillot_dom VALUES(2,'Manchester City','Puma',90,'mancity_dom_avant.jpeg','mancity_dom_dos.jpeg');
INSERT INTO maillot_dom VALUES(3,'Arsenal','Adidas',85,'arsenal_dom_avant.jpeg','arsenal_dom_dos.jpeg');
INSERT INTO maillot_dom VALUES(4,'Manchester United','Adidas',75,'manunited_dom_avant.jpeg','manunited_dom_dos.jpeg');
INSERT INTO maillot_dom VALUES(5,'Luton','Umbro',90,'luton_dom_avant.jpeg','luton_dom_dos.jpeg');


DROP TABLE IF EXISTS maillot_exte;

CREATE TABLE maillot_exte
  (idequipe    INTEGER    PRIMARY KEY,
   nomequipe    TEXT    NOT NULL,
   marque    TEXT    NOT NULL,
   prix    INTEGER    NOT NULL,
   im_avant    TEXT    NOT NULL,
   im_dos    TEXT    NOT NULL 
   );

INSERT INTO maillot_exte VALUES(1,'Liverpool','Nike',9999,'liverpool_exte_avant.jpeg','liverpool_exte_dos.jpeg');
INSERT INTO maillot_exte VALUES(2,'Manchester City','Puma',90,'mancity_exte_avant.jpeg','mancity_exte_dos.jpeg');
INSERT INTO maillot_exte VALUES(3,'Arsenal','Adidas',85,'arsenal_exte_avant.jpeg','arsenal_exte_dos.jpeg');
INSERT INTO maillot_exte VALUES(4,'Manchester United','Adidas',75,'manunited_exte_avant.jpeg','manunited_exte_dos.jpeg');
INSERT INTO maillot_exte VALUES(5,'Luton','Umbro',90,'luton_exte_avant.jpeg','luton_exte_dos.jpeg');

DROP TABLE IF EXISTS membres;

CREATE TABLE membres
  (id    INTEGER  PRIMARY KEY,
   pseudo    TEXT    NOT NULL,
   mdp    TEXT    NOT NULL,
   );

INSERT INTO membres VALUES(0,admin,admin);

COMMIT;
