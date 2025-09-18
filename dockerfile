# Gunakan image resmi PHP 8.2 dengan Apache
FROM php:8.2-apache

# 1. Instal dependensi sistem yang dibutuhkan sebelum menginstal ekstensi PHP.
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    && rm -rf /var/lib/apt/lists/*

# 2. Instal ekstensi PHP yang dibutuhkan.
RUN docker-php-ext-install pdo pdo_sqlite

# 3. Salin semua file proyek ke dalam folder web server di dalam container
COPY . /var/www/html/

# 4. PERBAIKAN FINAL: Berikan izin tulis (write) kepada server web (www-data)
#    pada folder database dan semua file di dalamnya.
#    'chown' mengubah pemilik, 'chmod' mengubah izin. '775' memberikan izin tulis.
RUN chown -R www-data:www-data /var/www/html/database && \
    chmod -R 775 /var/www/html/database

# 5. Buat skrip yang akan berjalan saat container pertama kali dijalankan
RUN echo '#!/bin/sh' > /usr/local/bin/entrypoint.sh && \
    echo 'php /var/www/html/init.php' >> /usr/local/bin/entrypoint.sh && \
    echo 'apache2-foreground' >> /usr/local/bin/entrypoint.sh && \
    chmod +x /usr/local/bin/entrypoint.sh

# Atur skrip tersebut sebagai perintah utama saat container dijalankan
CMD ["entrypoint.sh"]