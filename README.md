<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel Sanctum With Service Design Pattern To Do List Tutorial

## Laravel Sanctum Paketi ile Service Design Pattern Kullanarak To Do List Örneği

- Services klasörü altında <b>TaskService</b> bulunmaktadır. 
- <b>Sanctum</b> config düzenlemesi <b>config/sanctum.php</b> üzerinden yapılmıştır. 
- <b>Form Requestler</b>
	-	<b>Login</b> için <br>
			=> app/Http/Requests/Api/<br>
			=> app/Http/Requests/Auth/Api/

- <b>Exception</b> özelleştirmek için <b>app/Exception/Handler.php</b> de güncelleme olmuştur. 
- <b>Routelar api.php</b> içerisinde verilmiştir. 
