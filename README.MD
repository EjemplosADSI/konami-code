# Konami Code PHP!
PHP por defecto no captura el evento KeyPress nativamente para ello usaremos el siguiente repositorio:
[zenithies/php-toolkit-read-key: Detecting key press (arrow keys) in command line (console, cli) environment in PHP under Windows and Unix (github.com)](https://github.com/zenithies/php-toolkit-read-key)

 1. Tener instalado una version igual o superior a la 7 de PHP
 2. Clonar este repositorio: 
	 2. git clone https://github.com/EjemplosADSI/konami-code.git
 3. Ejecutar composer install
 4. En php.ini habilitar extension php_com_dotnet
	 4. extension=php_com_dotnet.dll
 5. Registrar Extension (Ejecutar como Administrador)
	 5. regsvr32 vendor\zenithies\php-toolkit-read-key\bin\win\ReadKey\ZenithiesCLIKeys_x64.dll
 6. Ejecutar por consola: php KonamiCode.php
 7. Para que se represente correctamente los caracteres tener instalado las https://www.nerdfonts.com/ y configuradas en la consola.