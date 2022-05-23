# Project management app

This application is designed for teachers, to manage projects, that they and their students are working on.
Teacher is able to create a project with desired amount of groups and student per group. Application is 
also able to delete or add students to the project.

Contents
========
 * [Task](#task)
 * [How to run](#how-to-run)
 * [Usage](#usage)

## Task

We need an application for a teacher to assign students to groups for a project. Please read the
requirements below and implement a solution that meets them.

##### Technical requirements:
1. Include a README file that contains a short description of your solution and technical
decisions.
2. Project must be stored in a publicly accessible git repository in GitHub or BitBucket.
3. All data should be stored in MySQL database. You must provide a script to create an
initial schema for the database.
4. Task must be implemented as a web application using OOP principles with PHP for the
backend. JavaScript and CSS can be used for front-end.
5. The task must be done with the Symfony or Laravel PHP framework.

##### Functional requirements:
1. On first visit a teacher should create a new project by providing a title of the project and
a number of groups that will participate in the project and a maximum number of
students per group. Groups should be automatically initialized when a project is created.
2. If the project exists, a teacher can add students using the “Add new student” button.
Each student must have a unique full name.
3. All students are visible on a list.
4. Teacher can delete a student. In such a case, the student should be removed from the
group and project.
5. Teacher can assign a student to any of the groups. Any student can only be assigned to
a single group. In case the group is full, information text should be visible to a teacher.
6. The page is operational and publicly accessible.

##### Bonus requirements:
1. Make information on the status page to automatically update every 10 seconds.
2. Implement functional requirement #2 using RESTful API.
3. Add automated test for functional requirement #4.

## How to run
1. Clone this repository to your local drive. Detailed instructions on how to clone repository - [GitHub - clone repository](https://docs.github.com/en/repositories/creating-and-managing-repositories/cloning-a-repository)
2. Open application with your favorite IDE, that has inbuilt terminal.
3. Rename `env.example` file to `.env`. Inside this file, copy database name to clipboard.
4. Run database application of your choice and create database with name of: `project_management_app`.
5. Open terminal in your IDE, run `composer install` command. Make sure you are in root of application  directory
6. Run `php artisan migrate:fresh` command, tables in database will be created.
7. Run `php artisan key:generate` 
8. Run `php artisan serve` command to start local php server. Navigate to `http://127.0.0.1:8000` in your browser.

## Usage

Start the local php server using earlier instructions and open the application in your browser. 

```
First, in homepage you can create a project to manage. Input project name, number of groups
you want created and maximum number of students per group. Application will do simple validation
checks, so user should not be able to enter incorrect data into group count and size inputs.
After successful creation of the projet, groups will be initialized automatically, depending
on what was input in 'Group size' and 'Maximum students in group' fields. Now you may assign
students to groups, add new students, assign them to group upon creation. If you press back,
you will be returned to homepage. From here you can click to get back into project or create a
new one. Upon creation of new project, old one will be removed from the database along with
students and groups. Students are created with laravel in-built factory, so they will always
be generated randomly.
```

