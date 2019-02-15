DROP TABLE IF EXISTS practice_event CASCADE;
DROP TABLE IF EXISTS piece CASCADE;
DROP TABLE IF EXISTS student CASCADE;
DROP TABLE IF EXISTS teacher CASCADE;
DROP TABLE IF EXISTS student_piece CASCADE;

CREATE TABLE teacher (
    id SERIAL PRIMARY KEY,
    first_name VARCHAR (50) NOT NULL,
    last_name VARCHAR (50) NOT NULL,
    email VARCHAR (50) NOT NULL
);

CREATE TABLE student (
    id SERIAL PRIMARY KEY,
    first_name VARCHAR (50) NOT NULL,
    last_name VARCHAR (50) NOT NULL,
    email VARCHAR (50) NOT NULL,
    teacher_id INTEGER REFERENCES teacher(id) ON DELETE RESTRICT,
    username VARCHAR (20) UNIQUE NOT NULL,
    password VARCHAR (20) NOT NULL
);

CREATE TABLE piece (
    id SERIAL PRIMARY KEY,
    name VARCHAR (50) NOT NULL
);

CREATE TABLE student_piece (
    id SERIAL PRIMARY KEY,
    student_id INTEGER REFERENCES student(id) NOT NULL,
    piece_id INTEGER REFERENCES piece(id) NOT NULL
);

CREATE TABLE practice_event (
    id SERIAL,
    piece_id INTEGER REFERENCES piece(id),
    duration INTERVAL,
    practice_date DATE,
    CONSTRAINT practice_event_pk PRIMARY KEY (id, piece_id)
);

INSERT INTO teacher (first_name, last_name, email) VALUES (
    'Daniel',
    'Kerr',
    'dkerr@byui.edu'
);

INSERT INTO student (first_name, last_name, email, teacher_id, username, password) VALUES (
    'Scott',
    'Nicholes',
    'nic15007@byui.edu',
    1,
    'scottie',
    'organist'
);

INSERT INTO piece (name) VALUES (
    'Mit Freuden Zart'
), (
    'For The Bread Which Thou Hast Broken'
);

INSERT INTO student_piece (student_id, piece_id) VALUES (
    1,
    1
), (
    1,
    2
);

INSERT INTO practice_event (piece_id, duration, practice_date) VALUES (
    1,
    '5 Hours',
    '2019-01-28'
), (
    2,
    '3 Hours 4 Minutes',
    '2019-01-15'
);