DROP TABLE IF EXISTS scripture_topic CASCADE;
DROP TABLE IF EXISTS topic CASCADE;
DROP TABLE IF EXISTS scripture CASCADE;
DROP TABLE IF EXISTS book CASCADE;

CREATE TABLE book (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

INSERT INTO book (name) VALUES ('John'),
('Doctrine and Covenants'),
('Mosiah');

CREATE TABLE scripture (
    id SERIAL PRIMARY KEY,
    book_id INTEGER REFERENCES book(id) NOT NULL,
    chapter VARCHAR(3) NOT NULL,
    verse VARCHAR(3) NOT NULL,
    content VARCHAR(1000) NOT NULL
);

INSERT INTO scripture
(book_id, chapter, verse, content) VALUES (1, 1, 5,
    'And the light shineth in darkness; and the darkness comprehended it not.'
), (2, '88', '49',
    'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'
), (2, '93', '28',
    'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.'
), (3, '16', '9',
    'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.'
);

CREATE TABLE topic (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE scripture_topic (
    id SERIAL PRIMARY KEY,
    topic_id INTEGER REFERENCES topic(id) NOT NULL,
    scripture_id INTEGER REFERENCES scripture(id) NOT NULL
);

INSERT INTO topic (name) VALUES
    ('Faith'),
    ('Hope'),
    ('Charity');
