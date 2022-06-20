<p align="center">
<a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" height="50"></a>
<a href="https://vuejs.org" target="_blank"><img src="https://vuejs.org/images/logo.png" height="40"></a>
</p>



## About This Repository

Newest Vue.js 3 version, introduced the new Composition API. You may ask, "What Makes the Composition API Better than the Options API?". In short answare, code sharing. 

Thanks to the Composition API we never have to use Mixins again. Mixins make it hard to determine where certain parts of logic are coming from inside a component that uses them.

So this repo will show you, how to use Composition API with laravel/ vue 3 repo.

 `Checkout commit history for details`

## Installation

```console 
git clone https://github.com/kabirkhyrul/laravel-vue3-api.git
composer install
cp .env.example .env
npm install && npm run dev
```

update `.env` file

```console
php artisan key:generate
php artisan migrate --seed
```

