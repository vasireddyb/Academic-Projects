INSERT INTO `healthcare`.`employee`
(`EMPLOYEE_ID`,
`FIRST_NAME`,
`LAST_NAME`)
VALUES
(1,
'praneeth',
'reddy');
INSERT INTO `healthcare`.`user_account`
(`USER_ID`,
`PASSWORD`,
`ROLE`,
`STATUS`,
`USER_NAME`,
`employee_EMPLOYEE_ID`)
VALUES
('1',
'admin',
'ADMIN',
'true',
'admin',
1
);

