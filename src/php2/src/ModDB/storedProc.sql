DROP PROCEDURE IF EXISTS course.newCustomer;
DELIMITER $
CREATE PROCEDURE course.newCustomer(
    p_firstname varchar(50),
    p_lastname varchar(50))
BEGIN
    insert into customers (firstname, lastname) values (p_firstname,p_lastname);
    -- other statements ...
END
$
DELIMITER ;