# My First CRUD

### Step 1: MySQL Instantiation
First, you're going to need to create a database in MySQL. Once you do that, you'll have to create a table in the database with the following code; 

```mySQL

CREATE TABLE IF NOT EXISTS user_CRUD (
  user_id int(11) NOT NULL AUTO_INCREMENT,
  first_name varchar(25) NOT NULL,
  last_name varchar(25) NOT NULL,
  user_city varchar(50) NOT NULL,
  PRIMARY KEY (user_id)
);
```

### Step 2: MySQL Initialization
Once your table is created, you'll want to populate it with some basic entires. Use the following code to enter some interesting characters into your database table:

```mySQL

INSERT INTO user_CRUD (user_id, first_name, 

last_name, user_city) VALUES
(1, 'Walter', 'White', 'Albuquerque'),
(2, 'Jesse', 'Pinkman', 'Albuquerque'),
(3, 'Gus', 'Fring', 'Albuquerque'),
(4, 'Hank', 'Schrader', 'Albuquerque');
```


### Original Code Taken From

http://www.codingcage.com/2014/12/simple-php-crud-operations-with-mysql.html
