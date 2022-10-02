/*
    Enhancement 2:
    Write SQL statements to accomplish the following tasks. Each task should be performed using a single query per task:
*/

-- Task #1: Insert the following new client to the clients table: Tony, Stark, tony@starkent.com, Iam1ronM@n, "I am the real Ironman"
INSERT INTO clients (
        clientFirstName,
        clientLastName,
        clientEmail,
        clientPassword,
        comment
    )
Values (
        "Tony",
        "Stark",
        "tony@starkent.com",
        "Iam1ronM@n",
        "I am the real Ironman"
    );

-- Task #2: Modify the Tony Stark record to change the clientLevel to 3.
UPDATE clients
SET clientLevel = 3
WHERE clientId = 1;

-- Task #3: Modify the "GM Hummer" record to read "spacious interior" rather than "small interior" using a single query.
UPDATE inventory
SET invDescription = replace(invDescription, "small", "spacious")
WHERE invId = 12;

-- Task #4: Use an inner join to select the invModel field from the inventory table and the classificationName field from the carclassification table for inventory items that belong to the "SUV" category.
SELECT invModel, classificationName
FROM inventory
INNER JOIN carclassification ON inventory.classificationId = carclassification.classificationId
WHERE carclassification.classificationName = 'SUV';

-- Task #5: Delete the Jeep Wrangler from the database.
DELETE FROM inventory
WHERE invId = 1;

-- Task #6: Update all records in the Inventory table to add "/phpmotors" to the beginning of the file path in the invImage and invThumbnail columns using a single query.
UPDATE inventory
SET invImage = CONCAT('/phpmotors', invImage),
    invThumbnail = CONCAT('/phpmotors', invThumbnail);

/*
    BONUS: Create table "clients"
*/

CREATE TABLE clients (
    clientId INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    clientFirstName VARCHAR(15) NOT NULL,
    clientLastName VARCHAR(25) NOT NULL,
    clientEmail VARCHAR(40) NOT NULL,
    clientPassword VARCHAR(255) NOT NULL,
    clientLevel ENUM("1", "2", "3") NOT NULL DEFAULT '1',
    comment TEXT NULL,
    PRIMARY KEY (clientId)
);
