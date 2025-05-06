# Space Tourism App: Vue 3 + Laravel 12

## Frontend (Vue)
Located in `/frontend/`

## Backend (Laravel)
Located in `/backend/`

## Development Setup
- `cd frontend && npm install && npm run dev`
- `cd backend && composer install && php artisan serve && php artisan migrate:refresh --seed`

## API documentation
The Scribe documentation is available at localhost:8000/docs

## API Test environment
API routes can be tested with Postman

## Future improvements
- Refactoring create & edit forms: using one SFC file for each, with props and general functions
- Implementing tests
- Better form validation
- Improved error handling
- Notification system
- Dashboard showing stats about travels