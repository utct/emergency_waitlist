# Hospital Triage Application

- Portfolio: https://github.com/utct/portfolio
- A2: https://github.com/ChadaBendriss/yatzy
- A3: https://github.com/ChadaBendriss/yatzy/tree/a3

## How to run locally
1. Clone this repository.
2. Create a new DB on pgAdmin
3. Create the table: 
    
    `CREATE TABLE patients (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    code CHAR(3) NOT NULL,
    severity INT NOT NULL,
    queue_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(50) DEFAULT 'waiting'
    );`

4. Navigate to project directory on command prompt and run php -S localhost:8000


## Usage
1. Open index.html and enter patient information
2. The application will assign a random severity and display the estimated wait time
3. Open admin.html to see or treat the patients 

## Screenshots

## Entering patient information with a 3 letter code
![Screenshot 1](docs/newpatient.png)



## Admin checking on patients
![Screenshot 2](docs/admin.png)



## Admin treating one of the patients
![Screenshot 3](docs/admintreating.png)



## The payload of the request
![Screenshot 4](docs/adminpayload.png)



## Patient is seen as "treated" in the DB
![Screenshot 5](docs/database.png)
