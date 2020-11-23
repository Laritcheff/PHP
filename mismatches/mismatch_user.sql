База данных mismatch

CREATE TABLE mismatch_user (
  user_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  join_date timestamp,
  first_name varchar(32),
  last_name varchar(32),
  gender varchar(1),
  birthdate date,
  city varchar(32),
  picture varchar(32)
);

INSERT INTO mismatch_user VALUES (1, '2016-06-03 14:51:46', 'Sidney', 'Kelsow', 'F', '1984-07-19', 'Tempe', 'sidneypic.jpg');
INSERT INTO mismatch_user VALUES (2, '2016-06-03 14:52:09', 'Nevil', 'Johansson', 'M', '1973-05-13', 'Reno', 'nevilpic.jpg');
INSERT INTO mismatch_user VALUES (3, '2016-06-03 14:53:05', 'Alex', 'Cooper', 'M', '1974-09-13', 'Boise', 'alexpic.jpg');
INSERT INTO mismatch_user VALUES (4, '2016-06-03 14:58:40', 'Susannah', 'Daniels', 'F', '1977-02-23', 'Pasadena', 'susannahpic.jpg');
INSERT INTO mismatch_user VALUES (5, '2016-06-03 15:00:37', 'Ethel', 'Heckel', 'F', '1943-03-27', 'Wichita', 'ethelpic.jpg');
INSERT INTO mismatch_user VALUES (6, '2016-06-03 15:00:48', 'Oscar', 'Klugman', 'M', '1968-06-04', 'Providence', 'oscarpic.jpg');
INSERT INTO mismatch_user VALUES (7, '2016-06-03 15:01:08', 'Belita', 'Chevy', 'F', '1975-07-08', 'El Paso', 'belitapic.jpg');
INSERT INTO mismatch_user VALUES (8, '2016-06-03 15:01:19', 'Jason', 'Filmington', 'M', '1969-09-24', 'Hollywood', 'jasonpic.jpg');
INSERT INTO mismatch_user VALUES (9, '2016-06-03 15:01:51', 'Dierdre', 'Pennington', 'F', '1970-04-26', 'Cambridge', 'dierdrepic.jpg');
INSERT INTO mismatch_user VALUES (10, '2016-06-03 15:02:02', 'Paul', 'Hillsman', 'M', '1964-12-18', 'Charleston', 'paulpic.jpg');
INSERT INTO mismatch_user VALUES (11, '2016-06-03 15:02:13', 'Johan', 'Nettles', 'M', '1981-11-03', 'Athens', 'johanpic.jpg');

------------------------
Для проверки новых колонок

INSERT INTO mismatch_user (username, password) VALUES ('Джим', '1e3a8686e735ddce8191eb1dd0b4adc8');


