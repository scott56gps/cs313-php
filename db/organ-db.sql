CREATE TABLE teacher(
    teacher_id SERIAL PRIMARY KEY,
    teacher_first_name VARCHAR (50) NOT NULL,
    teacher_last_name VARCHAR (50) NOT NULL,
    teacher_email VARCHAR (50) UNIQUE NOT NULL
);

CREATE TABLE student(
    student_id SERIAL PRIMARY KEY,
    student_first_name VARCHAR (50) NOT NULL,
    student_last_name VARCHAR (50) NOT NULL,
    teacher_id INTEGER REFERENCES teacher(teacher_id) ON DELETE RESTRICT,
    username VARCHAR (20) UNIQUE NOT NULL,
    password VARCHAR (20) NOT NULL
);

CREATE TABLE piece(
    piece_id SERIAL PRIMARY KEY,
    piece_name VARCHAR (50) NOT NULL
);

CREATE TABLE practice_event(
    practice_event_id SERIAL,
    piece_id INTEGER REFERENCES piece(piece_id),
    practice_duration INTERVAL,
    practice_date DATE,
    CONSTRAINT practice_event_pk PRIMARY KEY (practice_event_id, piece_id)
);