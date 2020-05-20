#!/bin/bash

(cd app/ump && java -jar umple-1.25.0-9e8af9e.jar models.ump)
(cd public && php -S localhost:4000)