SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS test;

CREATE DATABASE test;

USE test;

CREATE TABLE users (
    userId INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    fullName VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    companyName VARCHAR(255),
    contactNumber VARCHAR(15),
    password VARCHAR(255) NOT NULL,
    avatar VARCHAR(255)
) AUTO_INCREMENT = 1;

CREATE TABLE notices (
    noticeId INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    description TEXT
) AUTO_INCREMENT = 1;

CREATE TABLE faqs (
    faqId INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL,
    answer TEXT NOT NULL
) AUTO_INCREMENT = 1;

CREATE TABLE projects (
    projectId INT AUTO_INCREMENT PRIMARY KEY,
    projectName VARCHAR(255) NOT NULL,
    `key` VARCHAR(50) UNIQUE NOT NULL,
    url VARCHAR(255),
    projectType VARCHAR(100),
    description TEXT,
    projectLead INT,
    defaultAssignee INT,
    startDate DATE,
    endDate DATE,
    status VARCHAR(50),
    avatar VARCHAR(255)
) AUTO_INCREMENT = 1;

CREATE TABLE tickets (
    ticketId INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    priority VARCHAR(50),
    estimatedDate DATE,
    reporter INT,
    type VARCHAR(50),
    relatedTickets TEXT,
    attachments TEXT,
    projectId INT,
    status ENUM('To do', 'Progress', 'In testing', 'Review', 'Done')
) AUTO_INCREMENT = 1;

CREATE TABLE ticketAssignees (
    assigneeId INT AUTO_INCREMENT PRIMARY KEY,
    ticketId INT,
    AssigneeName VARCHAR(255) NOT NULL,
    FOREIGN KEY (ticketId) REFERENCES Tickets(ticketId)
) AUTO_INCREMENT = 1;

INSERT INTO notices (date, description) VALUES ('2023-12-24', 'Christmas eve');
INSERT INTO notices (date, description) VALUES ('2023-12-25', 'Christmas Day');
INSERT INTO notices (date, description) VALUES ('2023-12-26', 'Boxing day');

INSERT INTO projects (projectName, `key`, projectLead, startDate, status)
VALUES ('Titan', 'TT', 'Jessica Bells', '2023-07-21', 'Progress');
INSERT INTO projects (projectName, `key`, projectLead, startDate, status)
VALUES ('Personhood', 'PH', 'Jessica Bells', '2023-07-23', 'Progress');

INSERT INTO users (firstName, lastName, fullName, email, companyName, contactNumber, password)
VALUES ('Jessica', 'Bells', 'Jessica Bells', 'hf@flinders.com', 'Armour Technology', '610435189378', '$2y$10$tT/F5Wv5LnM9bVaGTHgq2.xv85YCXKGHSHfRjdGGfpWSBXPqGd3T.');
