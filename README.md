# Bus Pass Simplified Using Aadhaar API #

We made a web app during this [Contest](https://www.hackerearth.com/sprints/aadhaar-application-hackathon/),
basically this app will integrate with database of universities in its own state to that of transport department. 


**Problem Description**:-


```
#!php

*When we go to avail any student bus pass to travel from our home to college daily.
Usual process is issue a bonafied from your respective university that
 you are student of that university and resident of particular city.
Then go to bus station with your bonafied then there they will check your bonafied
,check you distance(In haryana then issue bus pass only when distance<60) and
 then they give you challan for payment and then process start.
This process take usually a week to complete. 

Solution:-We can make this process short by using a common database for both transport 
and education department.Whenever a student enroll in any school/university
 we would take his adhhar number along with address,
verify it using aadhar authentication api if successful add more details about student
 as how many of year of course student is enrolled in and
 after that add it to database. Then we go to local bus station office and 
give our addhar number along with college name their they can verify if 
its in database and currently a student of college. 
and can calculate distance between my city and college using any api 
and then issue challan.*


```

 This drastically reduces our time span for verifying things.


```
#!javascript

Technology Stack:- PHP,Javascript,jquery,google map,Aadhaar API
```
