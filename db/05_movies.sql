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