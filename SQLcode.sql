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
    descrizione_corso text not null,
    primary key (nome) 
);	

create table lezioni (
    id serial not null,
    corso text not null,
    data date not null, 
    argomento text not null,
    primary key(id)
);

create table appunti (
	id serial not null,
	data timestamp not null default current_timestamp,
	idlezione integer not null,
	autore text,
    testo text not null,
	primary key (id) 
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
    

/* per creare un nuovo utente si prende la password fornita dal utente e si 
 * inserisce nel data base il risultato dell'applicazione della funzione di hash
 * crittografico md5 alla password. Usando questa funzione se uno acceda alla 
 * database NON potra' vedere le password inserite ma solo il loro hash che 
 * essendo non invertivile non permette di risalire alla password 
 */
create or replace function nuovo_utente(u text, p text) returns void as $$
    insert into utenti (username, password) values (u, md5(p));
$$ language sql;

/* funzione per aggiungere un nuovo corso */
create or replace function nuovo_corso(n text, d text) returns void as $$
    insert into corsi (nome, descrizione_corso) values (n, d);
$$ language sql;

/* funzione per aggiungere una nuova lezione */
create or replace function nuova_lezione(c text, d date, a text) returns void as $$
    insert into lezioni (corso, data, argomento) values (n, d);
$$ language sql;

/* funzione per aggiungere un nuovo appunto */
create or replace nuovo_appunto(id integer, a text, t text) returns void as $$
    insert into appunti (idlezione, autore, testo) values (id, a, t);
$$ language sql;


/* per controllare se le credenziali sono valide si applica la funzione md5 
 * alla password passata e si confronta con quella presente nel database,
 * questa funzione restituisce true se le credenziali sono valide e false 
 * altrimenti
 */
create or replace function credenziali_valide(u text, p text) returns boolean as $$
declare
    pwd text;
begin
    select password into pwd from utenti where u = username;
    if md5(p) = pwd 
        then return true;
        else return false;
    end if;
end;
$$ language plpgsql;
 
    
    
    
    
    
    
    
    
    
    