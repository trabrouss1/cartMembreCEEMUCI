CREATE TABLE demande(
    id UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    lieu_naissance VARCHAR(255) NOT NULL,
    date_naissaine VARCHAR(255) NOT NULL,
    poste VARCHAR(255) NOT NULL,
    contact VARCHAR(255) NOT NULL,
    niveau_etude VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
);