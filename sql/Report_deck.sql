create database ReportDeck;

use ReportDeck;

-- Cria a tabela cidadão com seus respectivos campos;
Create table Cidadao(
    CPF char(11) not null,
	id int not null,
	Genero varchar(9) not null,
	Nascimento date not null,
    Nome_completo varchar(200) not null,
    Telefone varchar(11),
    Senha varchar(50)  not null,
	RG char(11)  not null,
    Email varchar(200) not null,
    primary key(CPF, id)
);

-- Cria a tabela administrador com seus respectivos campos;    
Create table Administrador(
    id int not null,
	NomeUsuarioADM varchar(50)  not null,
    Senha varchar(50)  not null,
    NomeCompleto varchar(200)  not null,
    Endereco varchar(200)  not null,
    RG char(11)  not null,
    CPF char(11) not null,
    Telefone char(11)  not null,
    Email varchar(200) not null,
    primary key(id, NomeUsuarioADM)
);

-- Cria a tabela crimes com seus respectivos campos
create table Crimes(
	id int primary key,
    Nome varchar(50),
    Nivel char(1)
);

-- Cria a tabela ocorrência com seus respectivos campos
create table Ocorrencia(
	id int auto_increment,
    Crime int not null,
    Titulo varchar(100) not null,
    DescricaoCrime text,
    estado varchar(2),
    cidade varchar (100),
    bairro varchar (100), 
    enderecoOcorrencia varchar(300),
    DataOcorrencia date,
    HoraOcorrenciaApx time,
    Imagem mediumblob,
    ImagemAprovada boolean,
    apvGenero boolean,
    apvIdade boolean,
    OcorrenciaAprovada boolean,
    cidadao char(11) not null,
    primary key(id),
    -- vincula os campos da tabela ocorrência como chave estrangeira de outras tabelas;
    foreign key(Crime) references Crimes(id),
    foreign key(cidadao) references Cidadao(CPF)
);

-- Cria a tabela GrauProximidadeCrime com seus respectivos campos;
create table GrauProximidadeCrime(
	id int auto_increment,
    descricaoGrau varchar(200),
    primary key(id)
);

alter table Ocorrencia auto_increment=01;
alter table GrauProximidadeCrime auto_increment=01;

insert into GrauProximidadeCrime (descricaograu) values
('Eu fui a vítima da ocorrência'),
('Eu presenciei a ocorrência'),
('Eu soube da ocorrência'),
('Eu conheço a vítima da ocorrência');

INSERT INTO Crimes (id, Nome, Nivel) VALUES
(1, 'Assalto', '1'),
(2, 'Sequestro', '2'),
(3, 'Homicidio', '3'),
(4, 'Estupro', '3'),
(5, 'Arrastão', '2'),
(6, 'Trafico', '3');