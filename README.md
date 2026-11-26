# CRUD---API-Fetch-y-MySQL


 
Repositorio para la entrega de la tarea: CRUD---API-Fetch-y-MySQL y desarrollado por Vasti Legaspi y Dylan Pitti del salón 1S3122
 
 
Es un laboratorio enfocado en la implementación de peticiones asíncronas con Fetch API y un backend robusto en PHP OOP con MySQL
## Contenidos del Repositorio
 
| Archivo | Descripción |
|---|---|
| `index.html  ` | Formulario con los inputs: Código, Producto, Precio, Cantidad + las funciones
Registrar y Actualizar.|
| `registrar.php` | Recibe el POST, permite Guardar o
Modificar y retorna acciones exitosas o errores si ocurren" |
| `script.js ` | Captura clic, crea FormData, envía con fetch, procesa respuesta
con SweetAlert2|
| `Modelo/conexion.php` | Clase DB (singleton o simple) que expone insertSeguro,
updateSeguro, query.|
| `Productos.php` | Clase Producto con propiedades y métodos guardar(), editar(),
buscar(), validación |
| `Estudiante.php` | Se imprimen varios datos de los estudiantes gracias a los atributos heredados del persona.php|

# Resultados

`Cómo se ve la página cuando entramos a ella y no tenemos todavía ningún producto guardado en la DB`

<img width="1347" height="393" alt="image" src="https://github.com/user-attachments/assets/213e950e-a121-4577-aacb-429f947b931f" />

`La tabla "Producto" en donde se van a guardar los datos`

<img width="975" height="237" alt="image" src="https://github.com/user-attachments/assets/c45672af-89d8-4b48-b638-cbeca561d802" />


`Insertamos los datos y se nos devuelve un mensaje diciendo "Éxito, Producto creado"`

<img width="975" height="501" alt="image" src="https://github.com/user-attachments/assets/0499321b-cac4-4900-bec8-d349f530c484" />


`Podemos usar el botón "Editar" para cambiar los datos si necesario` 

<img width="975" height="283" alt="image" src="https://github.com/user-attachments/assets/51445867-6a1b-425c-a79a-d410081ea251" />


 `Mensaje "Éxito, Producto actualizado" al editar el producto`

<img width="910" height="560" alt="image" src="https://github.com/user-attachments/assets/c4af04d0-1fe6-4eda-98e9-cf5b63902a29" />


`Como se ve cuando hay múltiples productos. El ID va en orden descendente gracias al auto incremento implementado` 

<img width="975" height="184" alt="image" src="https://github.com/user-attachments/assets/15be0f2a-88f3-4653-b162-bb022425edd0" />


`En la barra de búsqueda se pueden buscar los productos mediante su Código o nombre de este` 

<img width="653" height="216" alt="image" src="https://github.com/user-attachments/assets/34a37253-8015-417d-9154-2be4ffa53343" />


## Tecnologías Utilizadas
 
- **PHP**
- **HTML**
- **JSON**
- ** SweetAlert2** 

##  Cómo ejecutar el proyecto
 
1. Clonar el repositorio:
```bash
   https://github.com/dylan-pitti/CRUD---API-Fetch-y-MySQL.git
```
2. Colocarlo dentro del directorio de tu servidor local (www si se usa WAMP o LAMP).
3.  Crear la DB "Producto" en PHPmyAdmin con los 5 campos que pide el proyecto
4. Iniciar Wamp o Lamp y después conectarse al servidor local mediante hhtp://127.1.1.1/Crud_Productos

