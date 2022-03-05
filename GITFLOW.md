# Flujo de trabajo GitFlow + Trello


[_[TRELLO]_](https://trello.com/b/TOL6RU01/1b)

1. **Seleccionar** una tarjeta de la columna `Backlog 1` o `Backlog 2` 
   1. Pulsar en `Unirse`
   2. **Mover** la tarjeta a la columna `To Do` o directamente a `In Progress`


[_[GITHUB]_](https://github.com/rbm61/ErasmusConnect)

2. Crear un **issue** con el mismo nombre que la tarjeta seleccionada previamente en Trello

   1. Asignar al issue una etiqueta (_label_) con el mismo nombre (o uno descriptivo)
   2. Asignarte **a ti mismo** a la issue
   3. Añadir la issue al proyecto TAES

3. Crear una rama con un nombre descriptivo **A PARTIR** de develop siguiendo los siguientes pasos:

Nos movemos a develop (en caso de no estar ya ahí)
```
git checkout develop
```
Actualizamos nuestro repositorio local
```
git pull
```
Creamos una nueva rama y nos movemos a ella
```
git checkout -b nueva-rama
```
Realizamos un push para crear también la rama en Github
```
git push
```
4. En el proyecto TAES mover la tarjeta (que se ha colocado sola en `To Do`) a `In Progress`
4. Trabajar en esa rama sobre la funcionalidad escogida
   1. Nada de implementar cosas de otras funcionalidades
   2. Si es algo que **no está especificado** en Trello entonces se tendrá que comunicar al equipo y rear una tarjeta en trello y realizar todos los pasos correspondientes empezando por el paso 1.

5. Una vez terminada la funcionalidad.
   1. Realizar un **Pull Request** para hacer un merge con develop
   2. Asignarte como responsable del Pull Request
   3. Asignar a uno o más reviewers que serán los encargados de dar el visto bueno a los nuevos cambios.
   4. Cuando creas un pull request te permite **escribir un comentario**, lo que se va a hacer ahora es `enlazar un Pull Request con un issue`. Hay que tener claro que cada issue tiene un ID, bien pues en dicho comentario **se escribirá lo siguiente**: `Closes #ID` de esta forma cuando se fusione la rama con develop se cerrará la issue gracias al Automated Kanban.

6. Una vez se haya dado visto bueno al Pull Request, **DESPUÉS** de realizar el merge a develop seguimos los siguientes pasos:

Cambiamos de rama a develop
```
git checkout develop
```
Actualizamos el respositorio local
```
git pull
```
Eliminamos la rama en la que hemos estado trabajando localmente (Cuando se ha completado el merge desde Github nos da la opción de eliminarla pero solo elimina la rama del repositorio remoto)
```
git branch -d nueva-rama
```
Eliminamos las referencias a rama remota (optativo pero recomendable)
```
git remote prune origin
```

[_[TRELLO]_](https://trello.com/b/TOL6RU01/1b)


7. Mover la tarjeta que hemos movido antes a `In Progress` a `Done`

# Aclaraciones

* El tablero del proyecto TAES está **automatizado**, lo único que tendremos que hacer manualmente será mover la tarjeta (que se añade sola) de `To Do` a `In Progress`
* Esto es una forma de trabajar, no hay que seguir todos los pasos al pie de la letra, como el tema de asignar nombres o cuando abrir el Pull Request
  * Un Pull Request se puede abrir desde el primer commit en una rama que no sea develop.
  * En caso de abrir un Pull Request antes de acabar la funcionalidad la parte de asignar un Reviewer se omite hasta que no esté acabada.
  * Github notifica sobre los cambios en un pull request si hay un reviewer asignado.

* Si se os olvida mover la tarjeta en algún caso puntual no es un problema, se suele más de forma informativa.
  * Lo que si que **no se puede hacer** es implementar una funcionalidad y que no estes asignado a esta.

* Si en algún momento alguien tiene problemas implementando algo o necesita ayuda, se puede hacer, no dejamos de ser un equipo
  * La **única condición** es que el responsable del issue sea el que luego solicite el Pull Request y haga el merge, nunca un tercero.
