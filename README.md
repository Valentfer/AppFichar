# AppFichar
Este Repositorio solo corresponde a la parte que recoge la información que envía la aplicación de [Registro](https://github.com/Valentfer/Registro).

Scripts PHP que interactúan con una base de datos MySQL para realizar varias operaciones relacionadas con el registro de empleados. Aquí te proporciono una descripción detallada de cada sección:

1. **busqueda**: Este script se conecta a una base de datos MySQL y busca un empleado basándose en su DNI, que se obtiene de la solicitud GET. Luego, devuelve los datos del empleado en formato JSON.

2. **Entrada de mañana**: Este script se conecta a la misma base de datos y realiza dos operaciones. Primero, intenta seleccionar un registro de la tabla `accesos` basándose en el DNI y la fecha, que se obtienen de la solicitud POST. Si no encuentra ningún registro, inserta un nuevo registro con el DNI, la fecha y la hora de entrada, que también se obtienen de la solicitud POST.

3. **Entrada de tarde**: Este script se conecta a la base de datos y realiza una operación similar a la entrada de mañana, pero en lugar de insertar un nuevo registro, actualiza el campo `hora_entrada_tarde` del registro existente.

4. **Salida de mañana**: Este script se conecta a la base de datos y actualiza el campo `hora_salida` del registro existente en la tabla `accesos`.

5. **Salida de tarde**: Este script se conecta a la base de datos y actualiza el campo `hora_salida_tarde` del registro existente en la tabla `accesos`.

En resumen, estos scripts permiten registrar la hora de entrada y salida de los empleados en diferentes momentos del día, donde la aplicación [Registro](https://github.com/Valentfer/Registro) envia las peticiones.

Por favor, ten en cuenta que estos scripts no contienen ninguna validación de entrada o manejo de errores, por lo que deben modificarse para garantizar la seguridad y robustez del código.
