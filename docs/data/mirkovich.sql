create database b6ppsafpkfdnwawk5lx9;
use b6ppsafpkfdnwawk5lx9;

create database MirkoIUnidadDB;
use MirkoIUnidadDB;

create table alumnos(
DNI char(8) not null primary key,
nombres varchar(50) not null,
apellidos varchar(50) not null
)
;
create table cursos(
idCurso int not null auto_increment primary key,
nombreCurso varchar(50) not null,
dia varchar(9) not null,
horaEntrada time,
horaSalida time,
docente varchar(100)
)
;
create table notas(
idNota int not null auto_increment primary key,
DNI char(8) not null,
idCurso int not null,
nota double not null
)
;
#RELACIONES
alter table notas add constraint fk_Alumno_Notas
foreign key(DNI)
references alumnos(DNI) on delete cascade on update cascade
;
alter table notas add constraint fk_Curso_Notas
foreign key(idCurso)
references cursos(idCurso) on delete cascade on update cascade
;

#LLENADO DE DATOS

INSERT INTO alumnos Values
	(32885823,"Nombres Probando","Apellido probando"),
    (74128448,"Melio Josue", "Diaz Diaz")
;


INSERT INTO cursos(`nombreCurso`, `dia`, `horaEntrada`, `horaSalida`, `docente`)Values
	("Aplicaciones Distribuidas I","Lunes",
					'08:00',
                    '10:00',
                    "Mirko Ronceros Manriquez"),
    ("Arquitectura de Software","Viernes",
					"08:00",
                    "10:00",
                    "Dayan ...")
;

INSERT INTO notas(`DNI`, `idCurso`, `nota`) Values
	(32885823,1,14),
    (32885823,2,15),
    (74128448,1, 16),
    (74128448,2, 15)
;
SELECT * FROM alumnos WHERE DNI="VALIDALO";
select * from alumnos;
select * from cursos;
select * from notas;

select 
	idNota,
    cursos.nombreCurso,
    concat(alumnos.nombres," ",alumnos.apellidos) as "nombreAlumno",
    nota
from notas
inner join alumnos on notas.DNI = alumnos.DNI
inner join cursos on notas.idCurso = cursos.idCurso;

