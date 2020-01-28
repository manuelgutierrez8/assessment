﻿# Wordpress Assesment

# How to run this on your localhost?

- Download and configure [xampp server](https://www.apachefriends.org/) or any other server with MySQL and Apache .
- On phpMyAdmin create an empty database called 'assessment'
- Import the database from the db.sql file on the **db** folder
- Copy the repo files inside the htdocs folder
- Open your browser on http://localhost:[your apache default port]

# Online Version

[open this link](http://wpassessment.byethost9.com/)

# Test User Credentials
In case you want to check or change some configurations

- WP User: admin  
- WP Pass: Lqt&Pd&t1Ken%mf$D9

# Custom Endpoints created
## Products
**Listing**

- http://wpassessment.byethost9.com/wp-json/api/v1/products

**Featured**

- http://wpassessment.byethost9.com/wp-json/api/v1/products/featured

**Top Rated**

- http://wpassessment.byethost9.com/wp-json/api/v1/products/top-rated

**By Brand**

- http://wpassessment.byethost9.com/wp-json/api/v1/products/brand/32

## Brands 
- http://wpassessment.byethost9.com/wp-json/api/v1/brands

## Product Categories 
- http://wpassessment.byethost9.com/wp-json/api/v1/productCategories
