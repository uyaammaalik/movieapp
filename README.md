# Movie App
Movie app application developed by a youtuber Andre Madarang (https://www.youtube.com/playlist?list=PLEhEHUEU3x5pYTjZze3fhYMB4Nl_WOHI4), with Laravel v7 and Tailwind CSS v1.2.0. I am following his work and developing the movie app with Laravel v10 and Tailwind CSS v3.3.2.

## To run

### Create an API Token for movies
Go to the https://developer.themoviedb.org/reference/intro/getting-started and create your own API token by creating an account

### Clone the repository
```
https://github.com/uyaammaalik/movieapp.git
```

### Copy and rename .env.example file to .env file
```
cd movieapp
cp .env.example .env
```
### Setting up the API Token
In the .env file provide TMDB_TOKEN=<your API token>.

### Install necessary dependencies
```
composer install
```

### Generate application key
```
php artisan key:generate
```

### Install Tailwind CSS dependencies
```
npm install -D tailwindcss postcss autoprefixer
```

### Install Livewiere
```
composer require livewire/livewire
```

### Compile Assets
```
npm run dev
```

### Run deployment server
```
php artisan serve
```
