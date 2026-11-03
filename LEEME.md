# AutoElite (PHP + base de datos)

Cuentas de usuario, anuncios con fotos, administración y notificaciones.

## Opción A: MySQL con phpMyAdmin (recomendada)
1. Copia esta carpeta a `C:\\xampp\\htdocs\\autoelite` (los archivos deben quedar directamente ahí).
2. En el Panel de XAMPP pulsa **Start** en **Apache** y en **MySQL**.
3. Abre http://localhost/phpmyadmin > pestaña **Importar** > elige `database/schema.sql` > **Importar**.
4. Abre http://localhost/autoelite/diagnostico.php (debe decir "Conexión: OK. Usuarios registrados: 1").
5. Abre http://localhost/autoelite/ y entra en **Mi cuenta**.

## Opción B: sin MySQL (archivo local)
En `api/config.php` cambia `'driver' => 'mysql'` por `'driver' => 'sqlite'`. Solo necesitas Apache. Las tablas y el administrador se crean solos en `storage/autoelite.sqlite`.

## Administrador de ejemplo
- Correo: `admin@autoelite.com`  -  Contraseña: `Demo1234` (cámbiala cuando puedas)

## Cómo funciona
- Cualquiera puede crear cuenta y publicar un auto con hasta 6 fotos (**Vende tu auto**).
- El anuncio queda "pendiente"; el administrador lo aprueba en **Mi cuenta > Revisar anuncios** y entonces aparece en el inventario con la etiqueta "Particular".
- Cada paso genera una notificación en Mi cuenta y un correo. Por defecto los correos se guardan en `storage/mail.log`; para envío real instala PHPMailer (`composer require phpmailer/phpmailer`) y pon `'driver' => 'smtp'` en `api/config.php`.

## Notas
- Abre siempre con `http://localhost/...` (no con doble clic ni Live Server).
- Cambia el número de WhatsApp en `js/config.js` y el correo del administrador en `api/config.php`.
- Puedes borrar `diagnostico.php` cuando todo funcione.
- Antes de publicar en internet: usuario y contraseña propios de MySQL (no `root` vacío), HTTPS y contraseña nueva del administrador.
