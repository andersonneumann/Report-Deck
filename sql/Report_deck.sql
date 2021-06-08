create database ReportDeck;

use ReportDeck;

-- Cria a tabela cidadão com seus respectivos campos;
Create table Cidadao(
    CPF char(11) not null,
	ID int not null,
	Genero varchar(20) not null,
	Tema boolean,
	Nascimento date not null,
    Nome_completo varchar(200) not null,
    Telefone varchar(11),
    Senha varchar(50)  not null,
	RG char(11)  not null,
    Email varchar(200) not null,
    primary key(CPF, ID));

-- Cria a tabela crimes com seus respectivos campos
create table Crimes(
	id int primary key,
    Nome varchar(50),
    Nivel char(1)
);

create table GrauProximidadeCrime(
	id int not null,
    descricaoGrau varchar(200),
    primary key(id)
);

-- Cria a tabela ocorrência com seus respectivos campos
create table Ocorrencia(
	Codigo int auto_increment,
    Titulo varchar(100) not null,
    Crime int not null,
    grauDoCrime int not null,
    DescricaoCrime text,
    Observacao text,
    enderecoOcorrencia varchar(300),
    Imagem mediumblob,
    ImagemAprovada boolean,
    DataOcorrencia date,
    HoraOcorrenciaApx time,
    apvGenero boolean,
    apvIdade boolean,
    cidadao char(11) not null,
    ocorrenciaAprovada int,
    primary key(Codigo),
-- vincula os campos da tabela ocorrência como chave estrangeira de outras tabelas;
    foreign key(Crime) references Crimes(id),
    foreign key(grauDoCrime) references GrauProximidadeCrime(id),
    foreign key(cidadao) references Cidadao(CPF)
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

INSERT INTO `Crimes` (`id`, `Nome`, `Nivel`) VALUES
(1, 'Assalto', '1'),
(2, 'Sequestro', '2'),
(3, 'Homicidio', '3'),
(4, 'Estupro', '4'),
(5, 'Arrastão', '2'),
(6, 'Trafico de Drogas', '3');

insert into GrauProximidadeCrime (id,descricaograu) values
(1, 'Eu fui a vítima da ocorrência'),
(2, 'Eu presenciei a ocorrência'),
(3, 'Eu soube da ocorrência'),
(4, 'Eu conheço a vítima da ocorrência');
