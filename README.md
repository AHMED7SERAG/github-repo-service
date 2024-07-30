markdown
# GitHub Repo Service

A Laravel service to fetch and handle popular GitHub repositories.

## Requirements

- Docker
- Docker Compose

## Installation

1. Clone the repository:

`````bash 
    git clone https://github.com/your-username/github-repo-service.git
``````
    cd github-repo-service
Start the application using Docker Compose:
docker-compose up -d
Run the migrations:
docker-compose exec app php artisan migrate
Access the application:
Visit http://localhost:8000 in your browser.

``````Usage````

Endpoints
```````
  http://localhost:8000/api/repositories - Get popular repositories
 
  http://localhost:8000/api/send-report - with post Send an email report of popular repositories

Parameters
date (optional) - Filter repositories created after this date (default: 2019-01-10)
language (optional) - Filter repositories by programming language
limit (optional) - Limit the number of repositories returned (default: 10)
email (required for /send-report) - Email address to send the report to
``````
```Testing```
``````
Run unit tests:



docker-compose exec app php artisan test
````