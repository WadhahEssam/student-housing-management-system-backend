# student-housing-management-system-backend
API for Student Housing Management System created for SWE444 class
This API was created using Laravl & Laravel-JWT



# API 
Here are all the API functions with their inputs and outputs and what they exaclty do

## Authentication 

#### /api/createStudentAccount
- Creates a student account  
- **input**: name, email, password, password_confirmaion

#### /api/login
- Returns the access token for student
- **input**: email, password
- **output**: token

#### /api/me
- Returns information about the student   
- **input**: token  
- **output**: id, name, emaill, created_at  

#### /api/refresh
- Creates a new token for the current student, **IMPORTANT** : last token won't be valid any more ( WONT BE USED IN THIS PROJECT )   
- **input**: token  
- **output**: token

#### /api/logout
- Invalidates the current token for the student   
- **input**: token  
- **output**: message
