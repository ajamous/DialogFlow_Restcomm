#### Installation
* clone this project:

    ``git clone https://github.com/ajamous/DialogFlow_Restcomm.git``

* then install dependencies:

    ``cd DialogFlow_Restcomm/``
    
    ``composer install``
#### DialogFlow and Google setup:
* visit dialogflow.com and login to your account
* from the left menu, click on "prebuild Agents" and import the "Coffee Shop" agent.
* it will ask you to create a Google project or use an existing one.
* after importing, click on the gear next to the agent name on the left menu.
* click on the service account link, to visit Google console.
* click on the same service account again inside Google console.
* click on Edit, then **Create Key**, choose **JSON** and put the downloaded file in the **root** of this project.

#### Complete installation
* copy the .env file `cp .env.example .env` and open for edit
* set **database** parameters.
* set the `GOOGLE_APPLICATION_CREDENTIALS` parameter to be the name of the downloaded JSON file.
* set the `PROJECT_ID parameter` to the created project ID.
* then run `php artisan migrate` to create the database tables.
* and finally create a user with a simple token to call the API using
`php artisan generate:token`

 #### Testing Setup
 to test the API, use any REST client to make a POST request to the end point 
 `/sms`
 with the headers:
 
 `authorization: Bearer YOUR_GENERATED_TOKEN_HERE`
 
 `content-type: application/json`
 
 and  the body
 
 {"sms":"Hello"}
 
if everything is setup correctly you should get a response like this one


``{
  "response": "Good day! I have a lot coffee and snacks. What can I get you to drink?"
  }``
