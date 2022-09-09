#Tests en Laravel

##Instalación
Verificar si tenemos instalados lo siguiente programas:
1. Node JS.
2. Xampp
3. Composer

##Trabajando con phpUnit
1. Creamos un nuevo proyecto de Larave, en la dirección donde queramos guardar el proyecto,  y lo llamamos TestLaravel.
2. Nos dirigimos al Visual Studio Code (VSC).
3. Dentro de ese proyecto ya creado, abrimos la terminal integrada de VSC.
4. Codificamos el siguiente comando:
./vendor/bin/phpUnit
Y aparecerá lo siguiente:

O también, se puede utilizar el siguiente comando:
php artisan test
Y se generará esto:

##El primer test
1. Abrimos la terminal de VSC y codificamos el siguiente comando:
php artisan make:test UserTest.

2. Nos dirigimos a la carpeta de tests, entramos a la carpeta de Features, y vericamos si sí se creo correctamente el nuevo test.
3. Ejecutamos el test con el comando php artisan test
4. En la primera variable llamada $response, cambiamos el url por /test , el cual no se ha definido, por lo que saldrá un mensaje de error al poner otra vez el comando php artisan test.

## Creando pruebas unitarias
1. Para crear una prueba unitaria, se utiliza el comando php artisan make:test UserTest --unit.
2. Verificamos, dentro de la carpeta Unit, que el nuevo test, UserTest, se haya creado dentro de esa carpeta, pero aún así, si ejecutamos el test, seguimos con el error.
3. Nos dirigimos a la carpeta Features, y al archivo UserTest.php, y borramos el url /test, y volvemos a ejecutar el test, y ya no saldrá con el error.
4. Procedemos a crear otras pruebas no tan sencillas, utilizando el comando composer require laravel/ui, luego utilizamos otro comando, el cual es php artisan ui react --auth, y ejecutamos el comando npm install && npm run dev.
5. Después, procedemos a crear una base de datos, en la terminal, colocamos el comando mysql, y después, escribimos el comando para crear la base de datos, el cual es create database laravel_testin (lo puedes llamar como quieras), y para salir del mysql, colocamos exit en la terminal.
6. Nos dirigimos al archivo llamado .env, y verificamos que el nombre de la base de datos esté escrito en la sección de DB_DATABASE.
7. Procedemos a migrar nuestras migraciones, con el comando php artisan migrate.
8. Nos dirigimos a la carpeta Unit, y entramos al archivo UserTest, y eliminamos el public function predeterminado.
9. Luego, codificamos el siguiente código:
		public function test_login_form(){
       		 $response = $this->get('/login');

        		$response->assertStatus(200);
  	  }

10. Con el código anterior, recibiremos un mensaje de error, porque estamos usando un método indefinido, y es porque Laravel no reconoce el TestCase, así que eliminamos el caso de prueba predeterminado, y codificamos lo siguiente:
`use Tests/TestCase`
Y volvemos a ejecutar el test.

11. Luego, procedemos a validar el inicio de sesión, así que justo debajo de nuestro formulario de prueba de inicio se sesión, codificamos el siguiente código:

		public function test_user_duplication(){
				$user1 = User::make([
					'name' => 'Stiven Cano',
					'email' => 'saguirre785@misena.edu.co'
				]);

				$user2 = User::make([
					'name' => 'Mauricio Cardona',
					'email' => 'lmangel36@misena.edu.co'
				]);

				$this->assertTrue($user1->name != $user2->name);
    	}
