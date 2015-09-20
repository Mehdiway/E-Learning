DROP TABLE IF EXISTS
    `Apprenant_Question_Choix`,
    `Apprenant_Formation`,
    `Apprenant_Etape`,
    `Ressources_Etape`,
    `Reussite`,
    `Choix`,
    `Question`,
    `Ressources`,
    `Etape`,
    `Formation`,
    `Administrateur`,
    `Formatteur`,
    `Apprenant`;

CREATE TABLE Administrateur (
    id int AUTO_INCREMENT PRIMARY KEY,
    nom varchar(30),
    prenom varchar(30),
    tel varchar(15),
    email varchar(30),
    password varchar(30)
);

CREATE TABLE Formatteur (
    id int AUTO_INCREMENT PRIMARY KEY,
    nom varchar(30),
    prenom varchar(30),
    tel varchar(30),
    adresse varchar(200),
    specialite varchar(100),
    date_naissance date,
    bio varchar(200),
    email varchar(30),
    password varchar(30)
);

CREATE TABLE Apprenant (
    id int AUTO_INCREMENT PRIMARY KEY,
    nom varchar(30),
    prenom varchar(30),
    tel varchar(15),
    adresse varchar(30),
    date_naissance date,
    date_inscription datetime,
    credit float(30,2),
    inscription_valide tinyint(1),
    email varchar(30),
    password varchar(30)
);

CREATE TABLE Formation (
    id int AUTO_INCREMENT PRIMARY KEY,
    titre varchar(30),
    description varchar(200),
    competences_requises varchar(100),

    id_administrateur int,
    id_formatteur int,
    FOREIGN KEY (id_administrateur) REFERENCES Administrateur(id) ON DELETE CASCADE,
    FOREIGN KEY (id_formatteur) REFERENCES Formatteur(id) ON DELETE CASCADE
);

CREATE TABLE Etape (
    id int AUTO_INCREMENT PRIMARY KEY,
    titre varchar(30),
    description varchar(200),
    contenu text,
    finale tinyint(1),

    id_formation int,
    FOREIGN KEY (id_formation) REFERENCES Formation(id) ON DELETE CASCADE
);

CREATE TABLE Ressources (
    id int AUTO_INCREMENT PRIMARY KEY,
    titre varchar(30),
    type varchar(30),
    chemin varchar(200),
    taille int
);

CREATE TABLE Question (
    id int AUTO_INCREMENT PRIMARY KEY,
    intitule varchar(100),

    id_etape int,
    FOREIGN KEY (id_etape) REFERENCES Etape(id) ON DELETE CASCADE
);

CREATE TABLE Choix (
    id int AUTO_INCREMENT PRIMARY KEY,
    intitule varchar(100),
    correct int(1),

    id_question int,
    FOREIGN KEY (id_question) REFERENCES Question(id) ON DELETE CASCADE
);

CREATE TABLE Reussite (
    id int AUTO_INCREMENT PRIMARY KEY,
    id_apprenant int,
    id_formation int,
    id_formatteur int,
    moyenne float,
    valide tinyint(1),

    FOREIGN KEY (id_apprenant) REFERENCES Apprenant(id) ON DELETE CASCADE,
    FOREIGN KEY (id_formation) REFERENCES Formation(id) ON DELETE CASCADE,
    FOREIGN KEY (id_formatteur) REFERENCES Formatteur(id) ON DELETE CASCADE
);

# Tables d'association

CREATE TABLE Apprenant_Formation (
    id_apprenant int,
    id_formation int,
    FOREIGN KEY (id_apprenant) REFERENCES Apprenant(id) ON DELETE CASCADE,
    FOREIGN KEY (id_formation) REFERENCES Formation(id) ON DELETE CASCADE
);

CREATE TABLE Apprenant_Etape (
    id_apprenant int,
    id_etape int,
    FOREIGN KEY (id_apprenant) REFERENCES Apprenant(id) ON DELETE CASCADE,
    FOREIGN KEY (id_etape) REFERENCES Etape(id) ON DELETE CASCADE
);

CREATE TABLE Apprenant_Question_Choix (
    id_apprenant int,
    id_question int,
    id_choix int,

    FOREIGN KEY (id_apprenant) REFERENCES Apprenant(id) ON DELETE CASCADE,
    FOREIGN KEY (id_question) REFERENCES Question(id) ON DELETE CASCADE,
    FOREIGN KEY (id_choix) REFERENCES Choix(id) ON DELETE CASCADE
);

CREATE TABLE Ressources_Etape (
    id_ressource int,
    id_etape int,
    FOREIGN KEY (id_ressource) REFERENCES Ressources(id) ON DELETE CASCADE,
    FOREIGN KEY (id_etape) REFERENCES Etape(id) ON DELETE CASCADE
);