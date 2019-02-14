CREATE TABLE course (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    course_code VARCHAR(10) NOT NULL
);

CREATE TABLE note (
    id SERIAL PRIMARY KEY,
    date DATE NOT NULL,
    content TEXT NOT NULL,
    course_id INT NOT NULL REFERENCES course(id)
);