CREATE TABLE IF NOT EXISTS sitios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL,
    descricao TEXT CHARACTER SET utf8mb4 NOT NULL
);

CREATE TABLE IF NOT EXISTS anomalias (
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
('TE-076-BR', 'A Maquina', 'Seguro', 'Um dispositivo mecanico capaz de refinar objetos.', 'Acesso restrito apenas a pessoal autorizado.', 'scp914.png', 3),
('SO-077-BR', 'O Velho', 'Keter', 'Uma entidade que pode viver para sempre.', 'Caso haja atitude hostis, conversar e elogiar os desenhos de sua sobrinha.', 'scp106.jpeg', 2),
('BI-078-BR', 'Os gêmeos', 'Euclídeo', 'Dois irmãos idênticos que compartilham pensamentos e sensações, capazes de qualquer coisa quando juntos.', 'Separar os gêmeos caso apresentem comportamento hostil.', 'scp049.jpeg', 1),
('IN-080-BR', 'O Computador Antigo', 'Euclídeo', 'Um computador com inteligencia artificial hostil.', 'Manter desconectado e em uma cela segura.', 'scp079.png', 2);