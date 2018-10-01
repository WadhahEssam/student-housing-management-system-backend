# student-housing-management-system-backend
API for Student Housing Management System created for SWE444 class
This API was created using Laravl & Laravel-JWT



# API 
Here are all the API functions with their inputs and outputs and what they exaclty do

## Authentication 

#### /api/createStudentAccount
- Creates a student account  
- **input**: name, email, password, password_confirmaion
- **output**: [user data]

#### /api/login
- Returns the access token for student
- **input**: email, password
- **output**: token

#### /api/getInfo
- Returns information about the student   
- **input**: token  
- **output**: id, name, emaill, created_at  

#### /api/refresh
- Creates a new token for the current student, **IMPORTANT** : last token won't be valid any more 
- **input**: token  
- **output**: token

#### /api/logout
- Invalidates the current token for the student   
- **input**: token  
- **output**: message

## Rooms 

#### /api/getAllRooms
- Returns all the rooms in the dorm
- **input**: [nothing]     
- **output**: [list of the rooms]

#### /api/getStudentRoom
- Returns the current from for the logged in student
- **input**: token     
- **output**: id, room_number, building, wing, floor, student_id

#### /api/setStudentRoom
- Assigns a student to available room ( room must not be assigned to anther student + student should have no room )
- **input**: token, room_id     
- **output**: id, room_number, building, wing, floor, student_id

#### /api/changeStudentRoom
- Assigns a student to a new room ( student should have a room, and the room must be empty )
- **input**: token, room_id     
- **output**: id, room_number, building, wing, floor, student_id ( of the new room ) 

#### /api/clearStudentRoom
- Removes a student from a room ( student should have a room ) 
- **input**: token,      
- **output**: id, room_number, building, wing, floor, student_id ( of the cleared room ) 


