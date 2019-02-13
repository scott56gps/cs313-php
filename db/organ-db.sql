DROP TABLE IF EXISTS practice_event CASCADE;
DROP TABLE IF EXISTS piece CASCADE;
DROP TABLE IF EXISTS student CASCADE;
DROP TABLE IF EXISTS teacher CASCADE;
DROP TABLE IF EXISTS student_piece CASCADE;

CREATE TABLE teacher(
    id SERIAL PRIMARY KEY,
    first_name VARCHAR (50) NOT NULL,
    last_name VARCHAR (50) NOT NULL,
    email VARCHAR (50) UNIQUE NOT NULL
);

CREATE TABLE student(
    id SERIAL PRIMARY KEY,
    first_name VARCHAR (50) NOT NULL,
    last_name VARCHAR (50) NOT NULL,
    teacher_id INTEGER REFERENCES teacher(id) ON DELETE RESTRICT,
    username VARCHAR (20) UNIQUE NOT NULL,
    password VARCHAR (20) NOT NULL
);

CREATE TABLE piece(
    id SERIAL PRIMARY KEY,
    name VARCHAR (50) NOT NULL
);

CREATE TABLE student_piece (
    id SERIAL PRIMARY KEY,
    student_id INTEGER REFERENCES student(id) NOT NULL,
    piece_id INTEGER REFERENCES piece(id) NOT NULL
);

CREATE TABLE practice_event(
    id SERIAL,
    piece_id INTEGER REFERENCES piece(id),
    duration INTERVAL,
    date DATE,
    CONSTRAINT practice_event_pk PRIMARY KEY (id, piece_id)
);