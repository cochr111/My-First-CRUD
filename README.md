# My First CRUD

### Initialization
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


### Original Code Taken From

http://www.codingcage.com/2014/12/simple-php-crud-operations-with-mysql.html
