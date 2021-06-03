Project created for Web Programming Course, 4 semester VU MIF
# Requirement Groups for web site creation:
# General
1. Website contents are displayed in one language (Lithuanian / English).
2. All web pages must follow the same visual design pattern (or Guest/User module and 
Admin module might have different designs)
3. You are able to make changes in program code during project defence and explain it
4. Website is created using web framework (not CMS!!!)
# Configuration & Framework Features
1. Use framework possibilities (Configuration, routing, database creation, database 
seeding, seeds for password generation, …)
# HTML, templates
1. HTML structure must be valid
2. HTML code should be logically divided and implemented in different 
“views/templates” (as header, content, footer, etc.)
# Design, CSS
1. Website must use some Responsive CSS framework (you are allowed to use CSS 
framework theme)
2. Website should look at least minimally in order (imagine that you will have to show 
your solution to other IT students in other university).
# Object Management
1. Website functionality for managing the objects. Each object has to have standard 
management CRUD functions (add, view, edit, delete, view list)
2. At least 4 objects (entities) must be created
3. At least 10 properties/fields must exist per all objects (entities)
4. Notice: One of objects can be user object (entity)
# Validator
1. All input fields in all pages has server side validators
2. Server side validator checks if input value satisfies conditions (before writing it to 
database)
3. Each error message is displayed in such way that it is clear which property has an error
4. Validator messages must be the same language as website language.
# User Management
1. User login functionality is implemented
2. At least 2 user types with different rights are implemented (for example: admin and 
ordinary user)
3. Both user types can login in to the website
4. The rights of the user types must differ
5. Logged in user must be able to complete 2 functions, inaccessible to not logged 
in users
6. Admin must have 2 functions, inaccessible to logged and not logged in users
7. The password must be encrypted in the database;
# Database and MVC Model
1. Use database to store data
2. Create model in framework for each object. Each model must have functions for object 
data retrieval and manipulation (select, insert, update, delete functionality)
3. The primary key must be defined in each table
4. At least on relationships must be one-to-many or many-to-many
5. At least one table must have at least 100 records. Make a program code to fill the table 
with different value records (Example: Laravel has “seed” and fake data generation 
possibilities).
6. Create programme code to create database tables (If framework has no “migration” 
possibility – create code with SQL CREATE sentences)© Vilnius University, Linas Būtėnas 4
# API service
1. Implement functionality that uses some existing API service to get data. The API call 
function must be able to call the service with at least 5 different values of at least one 
parameter; The returned data must be visualised in website or stored in database;
o Or you can implement your own API service to answer incoming requests and send 
some data as a response. The API must be able to process at least one parameter and 
give different response for different request parameter values;
# File upload
1. Create at least one object (entity), that has file storing property (file upload possibility 
in the system)
2. Create CRUD functionality for this property
3. Create limitation for file size (for example: 2 MB)
