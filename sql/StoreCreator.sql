CREATE or Replace DATABASE online_store;
use online_store;


create table inventory(
   product_id INT AUTO_INCREMENT,
   product_name VARCHAR(100) NOT NULL,
   product_detail VARCHAR(200) NOT NULL,
   quantity INT NOT NULL,
   price decimal NOT NULL,
   image longblob, 
   PRIMARY KEY (product_id)
);

create table orders(
   order_id INT AUTO_INCREMENT,
   customer_firstname VARCHAR(200) NOT NULL, 
   customer_lastname VARCHAR(200) NOT NULL,
   payment VARCHAR(200) NOT NULL,
   order_detail VARCHAR(200) NOT NULL,
   quantity INT NOT NULL,
   price decimal NOT NULL,
   PRIMARY KEY (order_id)
);