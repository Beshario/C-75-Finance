<?php
/*********************************
 * opencon file
 *
 * CSCI S-75
 * Project 1
 * Beshari Jamal
 *
 * a file is summoned whenever an open connection is needed
 *********************************/

    $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE;
    $dbh = new PDO($dsn, DB_USER, DB_PASSWORD);
   