DROP TABLE IF EXISTS actor, movie CASCADE;

CREATE TABLE actor (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- CREATE TABLE genre (
--     id SERIAL PRIMARY KEY,
--     name VARCHAR(50) NOT NULL
-- );

CREATE TABLE movie (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    year SMALLINT
);

INSERT INTO movie (name, year) VALUES (
    'The Wizard of Oz',
    1939
), (
    'Operation Condor',
    1993
), (
    'Rush Hour',
    2001
);

CREATE TABLE movie_actor (
    id SERIAL PRIMARY KEY,
    actor_id INT NOT NULL REFERENCES actor(id),
    movie_id INT NOT NULL REFERENCES movie(id)
);