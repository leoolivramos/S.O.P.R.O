CREATE TABLE sitios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL,
    descricao TEXT CHARACTER SET utf8mb4 NOT NULL
);

CREATE TABLE anomalias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    designacao VARCHAR(50) CHARACTER SET utf8mb4 UNIQUE NOT NULL,
    apelido VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL,
    classe_risco VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL,
    descricao TEXT CHARACTER SET utf8mb4 NOT NULL,
    procedimentos_contencao TEXT CHARACTER SET utf8mb4 NOT NULL,
    arquivo_imagem VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL,
    id_sitio INT NOT NULL,
    FOREIGN KEY (id_sitio) REFERENCES sitios(id) ON DELETE CASCADE
);


SET NAMES 'utf8mb4';

INSERT INTO sitios (nome, descricao) VALUES
('Sítio-01', 'Instalação principal de contenção e pesquisa.'),
('Sítio-19', 'Centro de armazenamento de anomalias de alto risco.'),
('Sítio-77', 'Instalação especializada em anomalias tecnológicas.');

INSERT INTO anomalias (designacao, apelido, classe_risco, descricao, procedimentos_contencao, arquivo_imagem, id_sitio) VALUES
('UF-666-IC', 'Zezinhol', 'Apollyon', 'O único acima dos 4 cavaleiros do apocalipse.', 'Permitir interacao e monitorar comportamento, em caso de emergência procurar matéria de verão.', 'ze.PNG', 3),
('EA-074-BR', 'A Estátua', 'Euclídeo', 'Uma estatua animada que se move rapidamente quando não é observada.', 'Deve ser mantida em uma cela trancada e observada por pelo menos dois funcionarios.', 'scp173.jpg', 1),
('AQ-075-BR', 'O Reptil Indestrutivel', 'Keter', 'Uma criatura reptiliana extremamente hostil e quase impossivel de destruir.', 'Conter em tanque de acido e monitorar constantemente.', 'scp682.jpg', 2),
('TE-076-BR', 'A Maquina', 'Seguro', 'Um dispositivo mecanico capaz de refinar objetos.', 'Acesso restrito apenas a pessoal autorizado.', 'scp914.png', 3),
('SO-077-BR', 'O Velho', 'Keter', 'Uma entidade que pode atravessar paredes e causar corrosao.', 'Manter em uma cela especial revestida e monitorar constantemente.', 'scp106.jpg', 2),
('BI-078-BR', 'O Doutor da Peste', 'Euclídeo', 'Uma entidade humanoide que acredita ser um medico da peste.', 'Manter em uma cela trancada e evitar contato direto.', 'scp049.jpg', 1),
('FA-079-BR', 'Pilulas de Cura', 'Seguro', 'Um conjunto de pilulas que podem curar qualquer doenca.', 'Armazenar em local seguro e monitorar uso.', 'scp500.jpg', 3),
('IN-080-BR', 'O Computador Antigo', 'Euclídeo', 'Um computador com inteligencia artificial hostil.', 'Manter desconectado e em uma cela segura.', 'scp079.png', 2);