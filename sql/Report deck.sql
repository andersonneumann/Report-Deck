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
	Codigo int primary key,
    Titulo varchar(100) not null,
    Crime int not null,
    grauDoCrime int not null,
    DescricaoCrime text,
    Observacao text,
    enderecoOcorrencia varchar(300),
    DataOcorrencia date,
    HoraOcorrenciaApx time,
    cidadao char(11) not null,
-- vincula os campos da tabela ocorrência como chave estrangeira de outras tabelas;
    foreign key(Crime) references Crimes(id),
    foreign key(cidadao) references Cidadao(CPF)
);

-- Cria a tabela imagem com seus respectivos campos;
create table imagem(
	codigo int primary key,
    codOcorrencia int not null,
    statusImagem Boolean not null,
    Imagem mediumblob,
-- vincula as imagens com a ocorrência que pertence;
    foreign key(codOcorrencia) references Ocorrencia(codigo)
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

