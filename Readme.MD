# Laravel Vue Single Page Application
[![GitHub issues](https://img.shields.io/github/issues/kabirkhyrul/LVSPA?style=for-the-badge)](https://github.com/kabirkhyrul/LVSPA/issues)  [![GitHub forks](https://img.shields.io/github/forks/kabirkhyrul/LVSPA?style=for-the-badge)](https://github.com/kabirkhyrul/LVSPA/network) [![GitHub stars](https://img.shields.io/github/stars/kabirkhyrul/LVSPA?style=for-the-badge)](https://github.com/kabirkhyrul/LVSPA/stargazers) [![GitHub license](https://img.shields.io/github/license/kabirkhyrul/LVSPA?style=for-the-badge)](https://github.com/kabirkhyrul/LVSPA/blob/master/LICENSE)

This is single page api using Vue.Js frontend and Laravel API backend. 

# Demo
http://kabir.infantinventory.com/LVSPA/

### Be Advised ::  This is not for commercial use
if you need commercial version of this api, please contact with developer.

# Installation
```
git clone https://github.com/kabirkhyrul/LVSPA.git
cd LVSPA
composer install
npm install && npm install vue-router vue-axios --save
```
## then copy .env.example as .env with database credential
```
php artisan key:generate && php artisan migrate
```
Note: php artisan serve won't work, use this type of url http://localhost/LVSPA/

-- Happy coding :)
