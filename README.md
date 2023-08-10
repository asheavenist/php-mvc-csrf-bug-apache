# php-mvc
Code ini telah sedikit dimodifikasi untuk bisa dipakai dalam environment Laragon dengan syntax PHP v8.1.11.

Applikasi ini sudah di-test dengan mengakses URL:
```
/localhost/models/php-mvc-csrf-bug-apache/public/
```

Bug terjadi ketika aplikasi ini diakses via URL:
```
http://phpmvccsrf.test
```
URL ini bisa diakses setelah di-setting melalui Laragon. File 'hosts' yang ada pada <code>C:\Windows\System32\drivers\etc</code> terlibat. Juga konfigurasi extra dilakukan pada <code>F:\laragon\etc\apache2\sites-enabled</code> dengan menambah file <code>phpmvccsrf.test</code>.
