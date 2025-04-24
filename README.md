# Space Tourism App: Vue 3 + Laravel 12

## Frontend (Vue)
Located in `/frontend/`

## Backend (Laravel)
Located in `/backend/`

## Development Setup
- `cd frontend && npm install && npm run dev`
- `cd backend && composer install && php artisan serve && php artisan migrate:refresh --seed`

## API documentation
The Scribe documentation is available at /docs

## API Test environment
API routes <a href="https://.postman.co/workspace/My-Workspace~63061748-d366-4d69-802a-441f399ddd0f/collection/41126608-63560c4d-0fb8-4f03-baaa-e4ae5115ee9c?action=share&creator=41126608&active-environment=41126608-0d00dd1a-06c7-40e6-b448-a10ed59e74d2">can be tested with Postman</a>

## Future improvements
- Refactoring create & edit forms: using one SFC file for each, with props and general functions
- Implementing tests
- Better form validation
- Improved error handling
- Notification system
- Dashboard showing stats about travels