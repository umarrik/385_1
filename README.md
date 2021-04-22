# 385_1


sudo apt update
sudo apt install nginx

sudo ufw allow 'Nginx HTTP'

sudo ufw enable
systemctl status nginx

http://localhost

sudo apt install mysql-server
sudo apt install php-fpm php-mysql



CREATE DATABASE messages;
USE messages;
CREATE TABLE messages ( id INT NOT NULL AUTO_INCREMENT, message VARCHAR(40), created DATETIME, PRIMARY KEY (id));
