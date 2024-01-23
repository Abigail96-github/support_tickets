#!/bin/bash

echo "mysql root password:"
read rootpass
echo "Please enter the password to be used for the new user used to access the 'supportTickets' database:"
read laravel_support_tickets_user_pass

if [[ $rootpass ]]; then
    # create db
    # create user
    mysql -uroot -p$rootpass <<EOF
CREATE DATABASE supportTickets;
CREATE USER laravel_support_tickets@localhost IDENTIFIED BY '$laravel_support_tickets_user_pass';
GRANT ALL PRIVILEGES ON supportTickets.* TO 'laravel_support_tickets'@'localhost';
FLUSH PRIVILEGES;
EOF

echo "The 'supportTickets' database has been created along with its user 'laravel_support_tickets'"

fi