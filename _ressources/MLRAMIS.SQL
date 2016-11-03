DROP DATABASE IF EXISTS PPEAMIS;

CREATE DATABASE IF NOT EXISTS PPEAMIS;
USE PPEAMIS;
# -----------------------------------------------------------------------------
#       TABLE : FONCTION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FONCTION
 (
   NUM_FONCTION SMALLINT(1) NOT NULL  ,
   NUM_AMIS SMALLINT(1) NOT NULL  ,
   NOM_FONCTION CHAR(32) NULL  
   , PRIMARY KEY (NUM_FONCTION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE FONCTION
# -----------------------------------------------------------------------------


CREATE UNIQUE INDEX I_FK_FONCTION_AMIS
     ON FONCTION (NUM_AMIS ASC);

# -----------------------------------------------------------------------------
#       TABLE : ACTION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ACTION
 (
   NUM_ACTION SMALLINT(1) NOT NULL  ,
   NUM_AMIS SMALLINT(1) NOT NULL  ,
   NUM_COMMISSION SMALLINT(1) NULL  ,
   NOM_ACTION CHAR(32) NULL  ,
   DUREE_ACTION SMALLINT(1) NULL  ,
   DATEDEBUT_ACTION DATE NULL  ,
   FONDSCOLLECTES_ACTION INTEGER(2) NULL  
   , PRIMARY KEY (NUM_ACTION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ACTION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ACTION_AMIS
     ON ACTION (NUM_AMIS ASC);

CREATE  INDEX I_FK_ACTION_COMMISSION
     ON ACTION (NUM_COMMISSION ASC);

# -----------------------------------------------------------------------------
#       TABLE : DINER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DINER
 (
   NUM_DINER SMALLINT(1) NOT NULL  ,
   LIEU_DINER CHAR(32) NULL  ,
   DATE_DINER DATE NULL  ,
   PRIXDINER_DINER REAL(5,2) NULL  
   , PRIMARY KEY (NUM_DINER) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : COMMISSION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMMISSION
 (
   NUM_COMMISSION SMALLINT(1) NOT NULL  ,
   NOM_COMMISSION CHAR(32) NULL  
   , PRIMARY KEY (NUM_COMMISSION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : AMIS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS AMIS
 (
   NUM_AMIS SMALLINT(1) NOT NULL  ,
   NOM_AMIS CHAR(32) NULL  ,
   PRENOM_AMIS CHAR(20) NULL  ,
   TELEPHONEFIXE_AMIS CHAR(10) NULL  ,
   TELEPHONEPORTABLE_AMIS CHAR(10) NULL  ,
   EMAIL_AMIS CHAR(50) NULL  ,
   NUMADRESSE_AMIS SMALLINT(1) NULL  ,
   ADRESSERUE_AMIS CHAR(50) NULL  ,
   ADRESSEVILLE_AMIS CHAR(50) NULL  ,
   DATEENTREE_AMIS DATE NULL  ,
   NUM_AMIS_1 SMALLINT(1) NOT NULL  ,
   NUM_AMIS_2 SMALLINT(1) NOT NULL  ,
   NUM_COMMISSION SMALLINT(1) NOT NULL  ,
   NUM_COMMISSION_1 SMALLINT(1) NOT NULL  
   , PRIMARY KEY (NUM_AMIS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE AMIS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_AMIS_AMIS
     ON AMIS (NUM_AMIS_1 ASC);

CREATE  INDEX I_FK_AMIS_AMIS1
     ON AMIS (NUM_AMIS_2 ASC);

CREATE  INDEX I_FK_AMIS_COMMISSION
     ON AMIS (NUM_COMMISSION ASC);

CREATE  INDEX I_FK_AMIS_COMMISSION1
     ON AMIS (NUM_COMMISSION_1 ASC);

# -----------------------------------------------------------------------------
#       TABLE : PARAMETRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARAMETRE
 (
   MONTANT_COTISATION SMALLINT(1) NOT NULL  
   , PRIMARY KEY (MONTANT_COTISATION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PARTICIPER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARTICIPER
 (
   NUM_AMIS SMALLINT(1) NOT NULL  ,
   NUM_ACTION SMALLINT(1) NOT NULL  
   , PRIMARY KEY (NUM_AMIS,NUM_ACTION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PARTICIPER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PARTICIPER_AMIS
     ON PARTICIPER (NUM_AMIS ASC);

CREATE  INDEX I_FK_PARTICIPER_ACTION
     ON PARTICIPER (NUM_ACTION ASC);

# -----------------------------------------------------------------------------
#       TABLE : DIRIGER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DIRIGER
 (
   NUM_FONCTION SMALLINT(1) NOT NULL  ,
   NUM_COMMISSION SMALLINT(1) NOT NULL  ,
   NUM_AMIS SMALLINT(1) NOT NULL  
   , PRIMARY KEY (NUM_FONCTION,NUM_COMMISSION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE DIRIGER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_DIRIGER_FONCTION
     ON DIRIGER (NUM_FONCTION ASC);

CREATE  INDEX I_FK_DIRIGER_COMMISSION
     ON DIRIGER (NUM_COMMISSION ASC);

CREATE  INDEX I_FK_DIRIGER_AMIS
     ON DIRIGER (NUM_AMIS ASC);

# -----------------------------------------------------------------------------
#       TABLE : MANGER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MANGER
 (
   NUM_AMIS SMALLINT(1) NOT NULL  ,
   NUM_DINER SMALLINT(1) NOT NULL  ,
   NOMBRE_DE_PERSONNES SMALLINT(1) NULL  
   , PRIMARY KEY (NUM_AMIS,NUM_DINER) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE MANGER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_MANGER_AMIS
     ON MANGER (NUM_AMIS ASC);

CREATE  INDEX I_FK_MANGER_DINER
     ON MANGER (NUM_DINER ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE FONCTION 
  ADD FOREIGN KEY FK_FONCTION_AMIS (NUM_AMIS)
      REFERENCES AMIS (NUM_AMIS) ;


ALTER TABLE ACTION 
  ADD FOREIGN KEY FK_ACTION_AMIS (NUM_AMIS)
      REFERENCES AMIS (NUM_AMIS) ;


ALTER TABLE ACTION 
  ADD FOREIGN KEY FK_ACTION_COMMISSION (NUM_COMMISSION)
      REFERENCES COMMISSION (NUM_COMMISSION) ;


ALTER TABLE AMIS 
  ADD FOREIGN KEY FK_AMIS_AMIS (NUM_AMIS_1)
      REFERENCES AMIS (NUM_AMIS) ;


ALTER TABLE AMIS 
  ADD FOREIGN KEY FK_AMIS_AMIS1 (NUM_AMIS_2)
      REFERENCES AMIS (NUM_AMIS) ;


ALTER TABLE AMIS 
  ADD FOREIGN KEY FK_AMIS_COMMISSION (NUM_COMMISSION)
      REFERENCES COMMISSION (NUM_COMMISSION) ;


ALTER TABLE AMIS 
  ADD FOREIGN KEY FK_AMIS_COMMISSION1 (NUM_COMMISSION_1)
      REFERENCES COMMISSION (NUM_COMMISSION) ;


ALTER TABLE PARTICIPER 
  ADD FOREIGN KEY FK_PARTICIPER_AMIS (NUM_AMIS)
      REFERENCES AMIS (NUM_AMIS) ;


ALTER TABLE PARTICIPER 
  ADD FOREIGN KEY FK_PARTICIPER_ACTION (NUM_ACTION)
      REFERENCES ACTION (NUM_ACTION) ;


ALTER TABLE DIRIGER 
  ADD FOREIGN KEY FK_DIRIGER_FONCTION (NUM_FONCTION)
      REFERENCES FONCTION (NUM_FONCTION) ;


ALTER TABLE DIRIGER 
  ADD FOREIGN KEY FK_DIRIGER_COMMISSION (NUM_COMMISSION)
      REFERENCES COMMISSION (NUM_COMMISSION) ;


ALTER TABLE DIRIGER 
  ADD FOREIGN KEY FK_DIRIGER_AMIS (NUM_AMIS)
      REFERENCES AMIS (NUM_AMIS) ;


ALTER TABLE MANGER 
  ADD FOREIGN KEY FK_MANGER_AMIS (NUM_AMIS)
      REFERENCES AMIS (NUM_AMIS) ;


ALTER TABLE MANGER 
  ADD FOREIGN KEY FK_MANGER_DINER (NUM_DINER)
      REFERENCES DINER (NUM_DINER) ;

