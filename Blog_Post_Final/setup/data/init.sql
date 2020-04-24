USE CMS;

CREATE TABLE authors (
    email VARCHAR(128) NOT NULL PRIMARY KEY,
    pass_hash varchar(255) NOT NULL, 
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
    biography TEXT NOT NULL,
	created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO authors (email, pass_hash, firstname, lastname, biography) VALUES ("brent.ritchie@cambriancollege.ca", "$2y$10$16fzggCkbCGXLyOXhshyfOI8i85ty.lpUthYMLB9K.enNpKlEox1.", "Brent", "Ritchie", "Professor at Cambrian College.");
