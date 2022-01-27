# __Here i am doing some CRUD operations__

###### app/api/addUser.php
###### app/api/deleteUser.php
###### app/api/getAllUsers.php
###### app/api/getUser.php
###### app/api/updateUser.php


**Conditions checked**

_Id,phone must be number_ <br />
_Name must contain only letters_ <br /> 
_username can be like this eg(helo123)_ <br />
_passwards are hashed using $salt (**data-base.php**)_ <br />
_mail id must be in correct format_
_any illegal characters are not alllowed_ <br />

1.Before checking the code give your server details in **app/_backend/config.php** file. <br />
2.Create the database, name **esakkiraja_test**. <br />
3.Import **Users.sql** into database. <br />
4.Now, you can create,delete,update,edit using APIs. <br />
