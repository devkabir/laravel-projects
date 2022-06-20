# Paginate vs Datatable render time comparison

## Installation
- Clone this repo
- then 
```shell
composer install
cp .env.example .env
subl .env
```
- Edit .env with db credentials
- then
```shell
php artisan migrate
php artisan db:seed # Be advised: It will start seeding 100000 user with 3000 task per user
php artisan key:generate
```
## Some screenshots

### Paginated User
<img src="./paginateduser.png" alt="Paginated User Table" />

### User Datatable
<img src="./userdatatable.png" alt="User Datatable" />

### Paginated Task
<img src="./paginatedtask.png" alt="Paginated Task Table" />

### Task Datatable
<img src="./taskdatatable.png" alt="Task Datatable" />
