# 2017 Skills Canada National Competition
Created by Kyle Hennig.

## Web Design and Development
This project was created during the Skills Canada competition hosted in Winnipeg on June 1-2, 2017. I was tasked with redesigning the 15-year-old website of the Winnipeg Railway Museum. I built the entire website in 12 hours with no Internet connection, competing against the top candidates from each of Canada's provinces and territories. My competitors and I were judged by a panel of industry professionals following two days of hard work on our websites and getting to know one another.
<br><br>
This project thoroughly tested my memory of different programming languages and my ability to quickly write code that met all the specified requirements.
<br><br>
My website placed second overall. I was awarded the silver medallion by Skills Canada.

## Getting Started
Install XAMPP, available at https://www.apachefriends.org/index.html. Open the XAMPP control panel, then start the Apache and MySQL modules.

Clone this repository using git to your htdocs folder (ie. `C:\xampp\htdocs`).


An SQL database named "museum" should be created in order to achieve full functionality. Running the SQL commands in `museum.sql` should be enough to populate the database with stock data (you can import this file using http://localhost/phpmyadmin/).

Open http://localhost/ in your web browser of choice to view the website in action.

## Built With
XAMPP v7.1.2<br>
PHP v7.1.2<br>
MariaDB v10.1.21<br>
jQuery v3.2.0<br>

## Competition Requirements
Our websites were submitted in 3 modules. The following are the requirements I had to meet for each module to achieve the highest score possible:

### Module A: Web Design
| Requirement | Point value |
| ----------- | ----------- |
| Files have been submitted in the correct format – PSD, ID, XCF, or SVG for source files, and PNG or JPG for the resulting graphical files | 1 |
| Home page contains options to purchase tickets and make a donation | 1 |
| Promoted events on the home page include all required information, i.e. image, event name, very short description, and the date and time | 1 |
| Home page includes all menu items from old site | 1 |
| All pages include a search | 1 |
| Payment page includes at least one heading and subheading within content area | 1 |
| Payment page includes the event name, short description, and date and time | 1 |
| Payment page includes all required inputs | 1 |
| Events page includes buttons for grid view and for list view | 1 |
| Grid view events page shows the current month in a heading | 1 |
| Grid view events page shows days in a boxed layout, with the days clearly labeled | 1 |
| List view events page shows the current month in a heading | 1 |
| List view events page shows the days in a stacked, vertical layout, with the days clearly labeled | 1 |
| Design shows a good balance of images and text | 1 |
| Whitespace has been used to improve the clarity of the design | 1 |
| Page designs are appealing to the defined target audience | 1 |

### Module B: Website Implementation
| Requirement | Point value |
| ----------- | ----------- |
| A boxed home page design is presented, similar to the provided screenshots | 1 |
| The layout is made using Bootstrap | 2 |
| The navigation menu appears similar to the provided screenshots | 2 |
| A search area appears, containing a textbox and search button | 2 |
| Bottom of home page contains buttons to purchase tickets and make a donation, as well as a box to plan the user's visit to the museum | 2 |
| Design is responsive to computer screens | 1 |
| Design is responsive to tablet screens | 1 |
| Design is responsive to smartphone screens | 1 |
| Payment page contains a web form with all required input fields | 2 |
| User is instructed to correct all invalid form input | 1 |
| Form validation is completed using jQuery | 1 |
| Website name appears over top of the menu, centered on the page | 2 |
| Website name increases in size when user hovers mouse over top | 2 |
| Simulated window pops up when user clicks on particular event in the grid view of the calendar page | 2 |
|Event details collapse down when user clicks on particular event in the list view of the calendar page | 2 |

### Module C: Web Development
| Requirement | Point value |
| ----------- | ----------- |
| Administrative log in area contains a web form allowing employee to input username and password | 2 |
| Employee username and password is stored in the database and is checked to gain access to administrative area | 2 |
| Employee password is encrypted in database | 2 |
| Administrative area is accessible when admin is logged in | 2 |
| Session is created when admin logs in | 2 |
| Web form is validated for username and password | 2 |
| The events and the tickets pages are clearly shown as menu items in the administrative area | 2 |
| Employee (when logged in) has access to an event web form | 2 |
| Employee is able to create an event using a web form in administrative area | 2 |
| Event data is stored in the database | 2 |
| Event data is sanitized before the information is stored in the database | 2 |
| Employee is able to view all created events via an HTML table | 2 |
| Employee is able to update an existing event | 2 |
| Pagination is used in the events listing page, such that five events appear on each page | 2 |
| Employee is able to view all purchased tickets via an accessible HTML table | 2 |
| Employee is able to sort tickets in ascending order by clicking on any one of the table columns | 2 |
| Search field is created | 2 |
| The administrator is able to search for events by typing the event name into a textbox | 2 |
| The administrator is able to search for tickets by typing the ticket owner's name into a textbox | 2 |
| User database table contains required fields | 2 |
| Event database table contains required fields | 2 |
| Ticket database table contains required fields | 2 |
| Database is normalized and contains proper primary and foreign keys | 2 |
| SQL injection is preventable | 2 |
| Ticket prices are calculated with subtotal, tax and total | 2 |
| User clicks on a particular event, they are then sent to the payment page | 2 |
