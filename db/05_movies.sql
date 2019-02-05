DROP TABLE IF EXISTS actor, movie, movie_actor CASCADE;

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

INSERT INTO actor (name) VALUES (
    'Jackie Chan'
), (
    'Chris Rock'
), (
    'Judy Garland'
);

CREATE TABLE movie_actor (
    id SERIAL PRIMARY KEY,
    actor_id INT NOT NULL REFERENCES actor(id),
    movie_id INT NOT NULL REFERENCES movie(id)
);

INSERT INTO movie_actor (movie_id, actor_id) VALUES (
    1,
    1
), (
    1,
    2
), (
    1,
    3
), (
    2,
    3
), (
    3,
    1
);

SELECT * FROM movie m
    JOIN movie_actor ma ON m.id = ma.movie_id
    JOIN actor a ON ma.actor_id = a.id
    WHERE m.title = 'Rush Hour';