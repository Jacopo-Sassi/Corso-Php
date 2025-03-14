-- Crea il database
CREATE DATABASE IF NOT EXISTS libreria;
USE libreria;

-- Crea la tabella libri
CREATE TABLE IF NOT EXISTS libri (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titolo VARCHAR(255) NOT NULL,
    autore VARCHAR(255) NOT NULL,
    genere VARCHAR(100),
    anno_pubblicazione INT,
    prezzo DECIMAL(10, 2),
    isbn VARCHAR(20) UNIQUE
);

-- Inserisci alcuni dati di esempio nella tabella libri
INSERT INTO libri (titolo, autore, genere, anno_pubblicazione, prezzo, isbn) VALUES
('Il codice da Vinci', 'Dan Brown', 'Thriller', 2003, 19.99, '9780307474278'),
('La solitudine dei numeri primi', 'Paolo Giordano', 'Romanzo', 2008, 12.50, '9788806212634'),
('Harry Potter e la pietra filosofale', 'J.K. Rowling', 'Fantasy', 1997, 9.99, '9780747532743'),
('1984', 'George Orwell', 'Distopia', 1949, 14.99, '9780451524935'),
('Il grande Gatsby', 'F. Scott Fitzgerald', 'Classico', 1925, 13.00, '9780743273565'),
('Cecità', 'José Saramago', 'Romanzo', 1995, 10.00, '9780156012195'),
('Il giovane Holden', 'J.D. Salinger', 'Romanzo', 1951, 15.99, '9780316769488'),
('Le città invisibili', 'Italo Calvino', 'Fantascienza', 1972, 18.50, '9788806166005');