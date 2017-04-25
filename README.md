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

### Step 3: Ensure The File Structure Is In Place

You'll want to make sure the files are in the right folders and in the right place. Here's a diagram to help keep things clear.

.
├── ...                         # Root (Whatever you'd like the name to be!)
+--assets                    
|   +-- css
            ├──bootstrap.css
            ├──bootstrap.css.map 
            ├──bootstrap.min  
            ├──bootstrap.min.css.map  
            ├──bootstrap-theme.css
            ├──bootstrap-theme.css.map
            ├──bootstrap-theme.min.css
            ├──bootstrap-theme.min.css
        ├── fonts
            ├──glyphicons-halflings-regular.eot
            ├──glyphicons-halflings-regular.svt
            ├──glyphicons-halflings-regular.ttf
            ├──glyphicons-halflings-regular.woff
            ├──glyphicons-halflings-regular.woff2
        ├── js  
            ├──bootstrap.js
            ├──bootstrap.min.js
            ├──npm.js
        ├── jquery-1.11.3-jquery.min 
        
    ├── add_data.php
├── add_data.php    
├── b_drop.png
├── b_edit.png
├── dbconfig.php
├── edit_data.php
├── index.php
├── style.css

### Original Code Taken From

http://www.codingcage.com/2014/12/simple-php-crud-operations-with-mysql.html
