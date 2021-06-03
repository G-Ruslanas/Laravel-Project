Project created for Web Programming Course, 4 semester VU MIF
Requirement Groups for web site creation:
 General
o Website contents are displayed in one language (Lithuanian / English)
o All web pages must follow the same visual design pattern (or Guest/User module and 
Admin module might have different designs)
o You are able to make changes in program code during project defence and explain it
o Website is created using web framework (not CMS!!!)
 Configuration & Framework Features
o Use framework possibilities (Configuration, routing, database creation, database 
seeding, seeds for password generation, …)
 HTML, templates
o HTML structure must be valid
o HTML code should be logically divided and implemented in different 
“views/templates” (as header, content, footer, etc.)
 Design, CSS
o Website must use some Responsive CSS framework (you are allowed to use CSS 
framework theme)
o Website should look at least minimally in order (imagine that you will have to show 
your solution to other IT students in other university).
 Object Management
o Website functionality for managing the objects. Each object has to have standard 
management CRUD functions (add, view, edit, delete, view list)
o At least 4 objects (entities) must be created
o At least 10 properties/fields must exist per all objects (entities)
o Notice: One of objects can be user object (entity)
 Validator
o All input fields in all pages has server side validators
o Server side validator checks if input value satisfies conditions (before writing it to 
database)
o Each error message is displayed in such way that it is clear which property has an error
o Validator messages must be the same language as website language.
 User Management
o User login functionality is implemented
o At least 2 user types with different rights are implemented (for example: admin and 
ordinary user)
 Both user types can login in to the website
 The rights of the user types must differ
 Logged in user must be able to complete 2 functions, inaccessible to not logged 
in users
 Admin must have 2 functions, inaccessible to logged and not logged in users
 The password must be encrypted in the database;
 Database and MVC Model
o Use database to store data
o Create model in framework for each object. Each model must have functions for object 
data retrieval and manipulation (select, insert, update, delete functionality)
o The primary key must be defined in each table
o At least on relationships must be one-to-many or many-to-many
o At least one table must have at least 100 records. Make a program code to fill the table 
with different value records (Example: Laravel has “seed” and fake data generation 
possibilities).
o Create programme code to create database tables (If framework has no “migration” 
possibility – create code with SQL CREATE sentences)© Vilnius University, Linas Būtėnas 4
 API service
o Implement functionality that uses some existing API service to get data. The API call 
function must be able to call the service with at least 5 different values of at least one 
parameter; The returned data must be visualised in website or stored in database;
o Or you can implement your own API service to answer incoming requests and send 
some data as a response. The API must be able to process at least one parameter and 
give different response for different request parameter values;
o Hint: you can use API services made for testing like:
 https://jsonplaceholder.typicode.com/
 http://myjson.com/api
 or other 
 File upload
o Create at least one object (entity), that has file storing property (file upload possibility 
in the system)
o Create CRUD functionality for this property
o Create limitation for file size (for example: 2 MB)
