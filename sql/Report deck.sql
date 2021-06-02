create database ReportDeck;

use ReportDeck;

-- Cria a tabela cidadão com seus respectivos campos;
Create table Cidadao(
    CPF char(11) not null,
	ID int not null,
	Genero varchar(9) not null,
	Tema boolean, 
	Nascimento date not null,
    Nome_completo varchar(200) not null,
    Telefone varchar(11),
    Senha varchar(50)  not null,
	RG char(11)  not null,
    Email varchar(200) not null,
    primary key(CPF, ID));

-- Cria a tabela administrador com seus respectivos campos;    
Create table Administrador(
    Codigo int not null,
	NomeUsuarioADM varchar(50)  not null,
    Senha varchar(50)  not null,
    NomeCompleto varchar(200)  not null,
    Endereco varchar(200)  not null,
    RG char(11)  not null,
    CPF char(11) not null,
    Telefone char(11)  not null,
    Email varchar(200) not null,
    primary key(Codigo, NomeUsuarioADM));

-- Cria a tabela crimes com seus respectivos campos
create table Crimes(
	id int primary key,
    Nome varchar(50),
    Nivel char(1)
);

-- Cria a tabela ocorrência com seus respectivos campos
create table Ocorrencia(
	Codigo int auto_increment,
    Crime int not null,
    Titulo varchar(100) not null,
    DescricaoCrime text, 
    enderecoOcorrencia varchar(300),
    DataOcorrencia date,
    HoraOcorrenciaApx time,
    Imagem mediumblob,
    ImagemAprovada boolean,
    OcorrenciaAprovada boolean,
    cidadao char(11) not null,
    primary key(Codigo),
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

-- Cria a tabela atualização com seus respectivos campos;
create table Atualizacao(
	Codigo int primary key,
    CodOcorrencia int,
    Titulo varchar(50),
    Conteudo text,
    cidadao char(11) not null,
-- vincula as atualizações com a ocorrência e o cidadão que postou a ocorrência e a atualização
    foreign key(cidadao) references Cidadao(CPF),
    foreign key(CodOcorrencia) references Ocorrencia(Codigo)
);

alter table Ocorrencia auto_increment=01;
alter table GrauProximidadeCrime auto_increment=01;

insert into GrauProximidadeCrime (descricaograu) values
('Eu fui a vítima da ocorrência'),
('Eu presenciei a ocorrência'),
('Eu soube da ocorrência'),
('Eu conheço a vítima da ocorrência');

INSERT INTO `Crimes` (`id`, `Nome`, `Nivel`) VALUES
(1, 'Assalto', '1'),
(2, 'Sequestro', '2'),
(3, 'Homicidio', '3'),
(4, 'Estupro', '3'),
(5, 'Arrastão', '2'),
(6, 'Trafico', '3');




