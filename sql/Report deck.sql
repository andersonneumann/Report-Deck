
create database ReportDeck;

use ReportDeck;

Create table Cidadao(
    CPF char(11) not null,
	NomeUsuario varchar(50)  not null,
    Senha varchar(50)  not null,
    RG char(11)  not null,
    Email varchar(200) not null,
    primary key(CPF, NomeUsuario));
    
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

create table Crimes(
	id int primary key,
    Nome varchar(50),
    Nivel char(1)
);

create table Ocorrencia(
	Codigo int primary key,
    Titulo varchar(100) not null,
    Crime int not null,
    DescricaoSuspeito text,
    Observacao text,
    DataOcorrencia date,
    HoraOcorrenciaApx time,
    cidadao char(11) not null,
	administradorResp int not null,
    foreign key(Crime) references Crimes(id),
    foreign key(cidadao) references Cidadao(CPF),
    foreign key(administradorResp) references Administrador(Codigo)
);

create table imagem(
	codigo int primary key,
    codOcorrencia int not null,
    statusImagem Boolean not null,
    Imagem mediumblob,
    foreign key(codOcorrencia) references Ocorrencia(codigo)
);

create table Atualizacao(
	Codigo int primary key,
    CodOcorrencia int,
    Titulo varchar(50),
    Conteudo text,
    cidadao char(11) not null,
    foreign key(cidadao) references Cidadao(CPF),
    foreign key(CodOcorrencia) references Ocorrencia(Codigo)
);

