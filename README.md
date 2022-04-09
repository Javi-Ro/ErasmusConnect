# ErasmusConnect

Enlace al tablero [Trello](https://trello.com/b/TOL6RU01/1b)

# REVIEWERS 
## [FRONTEND]
```
RAUL --> MADANI

MADANI --> JAVI

JAVI --> ROSA

ROSA --> RAUL
```
## [BACKEND]
``` 
ILYAN --> ADRI

ADRI --> MARIO

MARIO --> ILYAN

```

### ¿Como empezar a trabajar?

Clonamos el respositorio desde la terminal con:

```
git clone https://github.com/Javi-Ro/ErasmusConnect.git
```

Como la rama `develop` está asignada por defecto en el repositorio que tenemos local tendrá el siguiente formato:
```
$ cd ErasmusConnect/
$ ls
gitflow.md README.md
$ git branch
* develop
```
Es recomendable crear la rama master pero no obligatorio ya que de momento no vamos a trabajar con ella
```
$ git checkout -b master
$ git checkout develop (Volvemos a develop porque es donde trabajaremos y saldran el resto de ramas)
```
¡Ya está!

### ¿Automated Kanban?

Es una opción de automatización que ofrece Github simple de usar y de configurar

El tablero [TAES] se compone de 4 tablas To Do, In Progress, In Pull Request y Done

A la hora de trabajar crearemos issues que si le asignamos el proyecto TAES se colocarán automáticamente en la columna `To Do`

Cuando empezemos a implementar una issue tendremos que mover manualmente la tarjeta correspondiente de `To Do` a `In Progress`

Cuando se realice el merge de una rama a develop y el Pull Request este **enlazado** con una issue entonces la tarjeta del tablero se moverá automáticamente a la columna de `Done`
