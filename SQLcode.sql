/* cancellazioni preventive per caricamenti multipli in caso di errore */

drop table if exists utenti cascade;
drop table if exists corsi cascade;
drop table if exists lezioni cascade;
drop table if exists appunti cascade;

/* definizione delle tabelle senza chiavi esterne */
create table utenti ( 
    username text not null,
    password text not null,
    primary key (username) 
);

create table corsi (
    nome text not null,
    primary key (nome) 
);	

create table lezioni (
    id serial not null,
    corso text not null,
    data date not null, 
    argomento text not null,
    primary key(id),
);

create table appunti (
	id serial not null,
	data timestamp not null default current_timestamp,
	idlezione integer not null,
	autore text,
	primary key (id), 
);


/* definizione delle chiavi esterne */
alter table lezioni
add foreign key (corso) references corsi; 

alter table appunti
add foreign key (autore) references utenti 
    on delete set null;

alter table appunti
add foreign key (idlezione) references lezioni; 

/* esempio di vista */
drop view if exists lista_corsi cascade;

create view lista_corsi as
    select nome
    from corsi
    order by nome;