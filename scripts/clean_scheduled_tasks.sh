#!/bin/bash
mysql -u social -pXXXX <<MY_QUERY
USE social
DELETE FROM scheduled WHERE created_at < SUBDATE(CURRENT_DATE, INTERVAL 1 DAY);
MY_QUERY
