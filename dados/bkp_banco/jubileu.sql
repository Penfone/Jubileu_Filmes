-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Jun-2023 às 00:39
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jubileu`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `idF` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_filme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `favoritos`
--

INSERT INTO `favoritos` (`idF`, `id_user`, `id_filme`) VALUES
(3, 21, 58),
(9, 12, 42),
(10, 12, 4),
(11, 12, 64),
(12, 21, 62),
(13, 21, 64);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `diretor` varchar(255) NOT NULL,
  `nota` float NOT NULL,
  `ano` int(4) NOT NULL,
  `fe` varchar(5) NOT NULL,
  `duracao` time NOT NULL,
  `gen1` int(2) NOT NULL,
  `gen2` int(2) NOT NULL,
  `gen3` int(2) NOT NULL,
  `gen4` int(2) NOT NULL,
  `sinopse` varchar(1500) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id`, `titulo`, `diretor`, `nota`, `ano`, `fe`, `duracao`, `gen1`, `gen2`, `gen3`, `gen4`, `sinopse`, `img`) VALUES
(1, '65 ameaça pré-histórica', ' Scott Beck', 5.5, 2023, '3', '01:33:00', 1, 3, 7, 0, '65 é a história de um cruzador espacial &#34;futurista&#34; que cai em um planeta distante e apenas o capitão e uma jovem sobrevivem. À medida que os dois viajantes espaciais se orientam pelo terreno estrangeiro, é revelado que o planeta é na verdade a Terra há 65 milhões de anos - e cheio de dinossauros pré-históricos que ameaçam sua sobrevivência. As coisas ficam ainda mais complicadas quando eles descobrem que um grande asteróide, O asteróide, está em rota de colisão direta com a Terra e a dupla deve desesperadamente alcançar sua nave de fuga enquanto a extinção do mundo se aproxima rapidamente.&#13;&#10;', 'ab3608afbbe79c1db483b7310d9e316065APH.jpg'),
(2, 'Avatar 2 - O caminho da água', 'James Cameron', 7.7, 2022, '3', '03:12:00', 1, 3, 9, 0, 'Após formar uma família, Jake Sully e Ney&#39;tiri fazem de tudo para ficarem juntos. No entanto, eles devem sair de casa e explorar as regiões de Pandora quando uma antiga ameaça ressurge, e Jake deve travar uma guerra difícil contra os humanos.', '0493ecf75de386382ec66e618959b030Avatar2.jpg'),
(3, 'John Wick 4 - Baba Yaga', 'Chad Stahelski', 8.2, 2023, '5', '02:49:00', 1, 13, 15, 0, 'Com o preço por sua cabeça cada vez maior, o lendário assassino de aluguel John Wick leva sua luta contra o High Table global enquanto procura os jogadores mais poderosos do submundo, de Nova York a Paris, do Japão a Berlim.', 'a36ca769123295678d5fd63e35ca6550JW4.jpg'),
(4, 'Dungeons&#38;Dragons - Honra entre rebeldes', 'John Francis Daley', 7.6, 2023, '3', '02:14:00', 1, 3, 4, 0, 'Um ladrão e um bando de aventureiros embarcam em uma jornada épica para recuperar uma relíquia.', 'ec19ec5e4af33a27ee575b51be15d511D&D.jpg'),
(6, 'Super Mario Bros - O Filme', 'Aaron Horvath', 7.4, 2023, '1', '01:32:00', 2, 3, 4, 8, 'Mario é um encanador junto com seu irmão Luigi. Um dia, eles vão parar no reino dos cogumelos, governado pela Princesa Peach, mas ameaçado pelo rei dos Koopas, que faz de tudo para conseguir reinar em todos os lugares.', '4696cc3b34cb870a5d908574c781d14cSMB.jpg'),
(7, 'Shrek', ' Andrew Adamson', 7.9, 2001, '1', '01:30:00', 2, 3, 4, 8, 'Um ogro tem sua vida invadida por personagens de contos de fadas que acabam com a tranquilidade de seu lar. Ele faz um acordo pra resgatar uma princesa.', '7e002abbc140fa3368d5d5e75455e4b7Shrek.jpg'),
(8, 'Creed III', 'Michael B. Jordan', 6.9, 2023, '3', '01:56:00', 7, 0, 0, 0, 'Adonis Johnson, filho do campeão de boxe Apollo Creed, pede a Rocky Balboa, que está aposentado, para ser seu treinador. Rocky aceita, mas tem dúvidas se Adonis tem o coração de um verdadeiro lutador.', '62e51ceefa1388b062b57dcc86958975Creed3.jpg'),
(24, 'Pantera negra; Wakanda pra sempre', ' Ryan Coogler', 6.7, 2022, '4', '02:41:00', 1, 3, 7, 0, 'Uma sequela que explora o mundo único de Wakanda e os vários personagens introduzidos com o título de 2018.', '1a40894ad43ce7ba8a68087146d782e7PN2.jpg'),
(25, 'A elefanta do mágico', ' Wendy Rogers', 6.5, 2023, '1', '01:39:00', 2, 3, 4, 9, 'Um garoto aceita o desafio proposto por um rei: realizar três tarefas impossíveis para ganhar uma elefanta mágica e ter a chance de ir atrás de seu destino.', '3d879e58ad9f06f801d8f057e2afc435AEM.jpg'),
(26, 'Adão Negro', ' Jaume Collet-Serra', 6.3, 2022, '4', '02:05:00', 1, 3, 9, 0, 'Quase 5.000 anos após ser agraciado com os poderes onipotentes dos deuses egípcios e preso com a mesma rapidez, Adão Negro alcança a liberdade de sua tumba terrena, pronto para liberar sua justiça no mundo moderno.', '85a0119a38441de7aec43e30403261e2AN.jpg'),
(27, 'Dragon ball super: Super hero', ' Tetsuro Kodama', 7.1, 2022, '3', '01:40:00', 2, 1, 3, 0, 'O Exército da Fita Vermelha do passado de Goku voltou com dois novos andróides para desafiá-lo e seus amigos.', 'e74284b82242353e50ef6c0ae3d88b53DBSSP.jpg'),
(28, 'Shazam: Fúria dos deuses', 'David F. Sandberg', 6, 2023, '3', '02:10:00', 1, 3, 4, 0, 'Basta para o adolescente órfão Billy Batson gritar uma palavra com poderes especias que recebeu de um antigo mago, para que o jovem se transforme no super-herói adulto Shazam.', '2c2fec4592176b4767c12258da809411Shazam2.jpg'),
(29, 'Sonic 2', 'Jeff Fowler', 6.5, 2022, '2', '02:02:00', 1, 3, 4, 0, 'Dr. Robotnik retorna, desta vez com um novo parceiro, Knuckles, em busca de uma esmeralda que tem o poder de construir e destruir civilizações. Sonic se junta ao seu próprio parceiro, Tails, em uma jornada para encontrar a esmeralda antes.', 'bf4fe59591ce576644bee31c2b5c574fSonic2.jpg'),
(32, 'A culpa é das estrelas', ' Josh Boone', 7.7, 2014, '3', '02:06:00', 7, 14, 0, 0, 'Dois adolescentes com câncer iniciam uma jornada para visitar um autor recluso em Amsterdã.', '7af1cee981055eb2d0418c4e72464722acde.jpg'),
(33, 'A guerra do amanhã', ' Chris McKay', 6.5, 2021, '4', '02:18:00', 1, 3, 7, 0, 'Um homem é convocado para lutar numa guerra futura em que o destino da humanidade depende da sua capacidade de confrontar o seu passado.', '2941068778a453fd1851495b528667a9aga.jpg'),
(34, 'Annabelle', ' John R. Leonetti', 5.4, 2014, '4', '01:39:00', 12, 15, 16, 0, 'Logo depois que sua casa foi invadida por satanistas, um casal experimenta eventos estranhos ao redor de uma velha boneca.', 'ad9cd53157033656bb01e43124c58a31ana.jpg'),
(35, 'A noiva cadáver', ' Tim Burton', 7.3, 2005, '1', '01:17:00', 2, 7, 8, 0, 'Victor tem dúvidas acerca do seu iminente casamento com Victoria, casando-se acidentalmente com uma noiva já morta e conhecendo, pela mão dela, o mundo dos mortos. Mas o que começou como um equívoco pode tornar-se uma história de amor.', 'b0b42102e221c79a519cf5fa7b9a37e8anc.jpg'),
(36, 'Até o ultimo homem', ' Mel Gibson', 8.1, 2016, '5', '02:19:00', 7, 11, 0, 0, 'O médico americano da Segunda Guerra Mundial, Desmond T. Doss, se recusa a matar pessoas e se torna o primeiro homem na história dos Estados Unidos a receber a Medalha de Honra sem atirar um tiro.', '98f3afae3ad27f7085116ff8383ade83auh.jpg'),
(37, 'Brinquedo assassino', ' Tom Holland', 6.6, 1988, '1', '01:27:00', 15, 16, 0, 0, 'Uma mãe solteira dá a seu filho o boneco mais desejado para o seu aniversário, mas eles descobrirão que ele é possuído pela alma de um assassino em série.', '9b8ee5578d9d850cf099dc4a622797d8ba.jpg'),
(38, 'Bad boys para sempre', ' Adil El Arbi', 6.5, 2020, '5', '02:04:00', 1, 4, 13, 0, 'Marcus quem agora é um inspetor, e Mike, tem que se juntar quando um mercenário, cujo irmão foi capturado por eles, promete um bônus de vingança.', '3b19f97bc10128a6b42b9e94a8aabe0abbf.jpg'),
(39, 'Bastardos inglórios', 'Quentin Tarantino', 8.3, 2009, '6', '02:33:00', 3, 7, 11, 0, 'Na França ocupada pelos nazistas durante a Segunda Guerra Mundial, um plano para assassinar líderes nazistas por parte de um grupo de soldados judeus dos EUA coincide com os planos de vingança da dona de uma sala de cinema.', '99f1ec2d8f3421ab637d8f975119bb81bi.jpg'),
(40, 'Batman - A perdição chegou a Gotham', 'Sam Liu', 6, 2023, '4', '01:26:00', 2, 9, 16, 0, 'Bruce Wayne encontra o Pinguim no ártico e descobre que um culto sombrio planeja a destruição de Gotham City. Agora, ele precisa voltar para casa e vestir o manto de Batman para proteger a cidade. No entanto, o herói que acredita na ciência deve tentar manter sua sanidade ao descobrir que não está enfrentando criminosos ou loucos, mas magia antiga, demônios de fogo e deuses antigos interdimensionais.', 'aa689ff7cec16c1fe6b88a9361af66a6bpg.jpg'),
(41, 'Corações de ferro', ' David Ayer', 7.5, 2014, '5', '02:14:00', 1, 7, 11, 0, 'Um comandante idoso tem que tomar decisões difíceis para si e para sua equipe, lutando pela Alemanha em abril de 1945.', '04de3be029ac4fd0f0d42236bb9a8012cdf.jpg'),
(42, 'Clube da luta', ' David Fincher', 8.8, 1999, '6', '02:19:00', 7, 15, 0, 0, 'Um trabalhador de escritório e um fabricante de sabonetes formam um clube de luta clandestino que evolui para algo muito maior.', '584e769525a9fa37ee899326b166442dcl.jpg'),
(43, 'Como se fosse a primeira vez', ' Peter Segal', 6.8, 2004, '1', '01:39:00', 4, 7, 14, 0, 'Henry, um homem com medo de compromisso, conhece a linda Lucy, juntos se apaixonam e ele acredita que finalmente encontrou a garota dos seus sonhos, até descobrir que perdeu sua memória de curto prazo e esquece tudo o que aconteceu. cada dia.', '6db866f73919836005167ca815a07effcsfpv.jpg'),
(44, 'Enola Holmes 2', ' Harry Bradbeer', 6.7, 2022, '4', '02:09:00', 1, 3, 13, 12, 'Em seu primeiro caso oficial como detetive, Enola precisa encontrar uma menina desaparecida. Para isso, ela contará com a ajuda dos amigos e do irmão, Sherlock.', '739cdda1ac78188660336bdf3b573b1ceh2.jpg'),
(45, 'Ghost - Do outro lado da vida', ' Jerry Zucker', 7.1, 1990, '3', '02:07:00', 7, 9, 14, 0, 'Um homem é morto e seu espírito é deixado para trás. Com a ajuda de uma médium, ele tenta avisar sua amante do perigo que se aproxima.', '2b4ad272ce0232a08f806d144ea5afd0gh.jpg'),
(46, 'Glass Onion: Um Mistério Knives Out', 'Rian Johnson', 7.1, 2022, '4', '02:19:00', 4, 7, 13, 0, 'O famoso detetive do sul Benoit Blanc retorna à Grécia para seu último caso.&#13;&#10;', 'a03654ed9b7490e8c31198617a331ef9go.jpg'),
(47, 'Gemini - O Planeta Sombrio', ' Serik Beyseu', 3.4, 2022, '4', '01:38:00', 3, 10, 15, 0, 'Um thriller de ficção-científica sobre uma missão espacial enviada para terraformar um planeta distante. No entanto, a missão encontra algo desconhecido que tem o seu próprio plano para o planeta.', '5ef6e1e9fb31f2e268ee06ea39835a20gps.jpg'),
(48, 'Grease', ' Randal Kleiser', 7.2, 1978, '3', '01:50:00', 4, 14, 0, 0, 'Sandy e Danny se apaixonam no verão e se dão conta que vão a mesmo colégio mas não sabem se o amor vai sobreviver.', '9c61197f13784bd2df6e91777b559b61gr.jpg'),
(49, 'It - Capitulo 2', ' Andy Muschietti', 6.5, 2019, '5', '02:49:00', 7, 9, 16, 0, 'Vinte e sete anos após seu primeiro encontro com o aterrorizante Pennywise, o clube dos perdedores cresceu e se mudou, até que um telefonema devastador os traz de volta.', '4a03da7ef05e6e5a51d85d8523818c3dit.jpg'),
(50, 'Matrix', 'Irmãs Wachowski', 8.7, 1999, '4', '02:16:00', 1, 10, 0, 0, 'Um hacker aprende com os misteriosos rebeldes sobre a verdadeira natureza de sua realidade e seu papel na guerra contra seus controladores.', '26b62401c79fb0f3474a50436f3c8ddemat.jpg'),
(51, 'Noite infeliz', ' Tommy Wirkola', 6.7, 2022, '5', '01:32:00', 1, 4, 13, 0, 'Quando um grupo de mercenários ataca a propriedade de uma família rica, o Papai Noel deve intervir para salvar o dia (e o Natal).', '30613fa0095c4bdbebf29ac92e3130fani.jpg'),
(52, 'Nada de novo no front', ' Edward Berger', 7.8, 2022, '5', '02:28:00', 1, 7, 11, 0, 'As terríveis experiências e angústias de um jovem soldado alemão na frente ocidental durante a Primeira Guerra Mundial.', '2d72f05cd28cf81d28bb147cc023c35annnf.jpg'),
(53, 'Os 4 malfeitores', 'Timo Tjahjanto', 6.1, 2022, '5', '02:21:00', 1, 4, 13, 0, 'Conta a história de um assassino de elite que é alvo de gângsteres após poupar a vida de uma garota durante um massacre.', '1c56925d0d62edf8319ad5cfe3aeb046o4m.jpg'),
(54, 'A origem', 'Christopher Nolan', 8.8, 2010, '4', '02:28:00', 1, 3, 10, 0, 'Um ladrão que rouba segredos corporativos através da tecnologia de entrar no subconsciente recebe a tarefa inversa de plantar uma idéia na mente do diretor de uma grande empresa.', '9e33fe672425dfe60a108f25390ccfdborg.jpg'),
(55, 'O urso do pó branco', ' Elizabeth Banks', 6, 2023, '6', '01:35:00', 4, 15, 0, 0, 'Conta a história de um traficante de drogas cujo avião cai com uma carga de cocaína encontrada por um urso negro, que a come.', '6b8a60e5c80612fdb350b23e245d70cdoupb.jpg'),
(56, 'Renfield - Dando sangue pelo chefe', ' Chris McKay', 6.4, 2023, '6', '01:33:00', 4, 9, 16, 0, 'Renfield, o torturado ajudante de Drácula, é forçado a capturar presas para seu mestre e cumprir todas as suas ordens. Mas agora, após séculos de servidão, Renfield está pronto para ver se há uma vida fora da sombra de seu chefe.', '8c2bec1db381bfa521305f3ba43dc76dR.jpg'),
(57, 'O resgate do soldado Ryan', ' Steven Spielberg', 8.6, 1988, '4', '02:49:00', 7, 11, 0, 0, 'Depois de chegar a Normandía, um grupo de soldados precisam encontrar ao unico irmão vivo de tres que morreram na guerra.', '3b52825d8daca27e070df51ebfb09958rsr.jpg'),
(58, 'Scooby-doo', 'Raja Gosnell', 5.2, 2002, '1', '01:29:00', 3, 4, 8, 0, 'Depois de um rompimento terrível, a banda da Mystery Inc. é levada individualmente para um resort na ilha para investigar eventos estranhos.', '243096ecf9b83ef15172c22fe6ce3511scb.jpg'),
(59, 'Sherlock Holmes', ' Guy Ritchie', 7.6, 2009, '4', '02:18:00', 1, 3, 12, 0, 'O detective Sherlock Holmes e seu colega Watson se engajam numa batalha para lutar contra as ameaças da Inglaterra.', '4e879fafa60108e70685006f22c70a28shjpg.jpg'),
(60, 'Scott Pilgrim - Contra o mundo', ' Edgar Wright', 7.5, 2010, '3', '01:52:00', 1, 4, 8, 14, 'Scott Pilgrim deberá vencer aos sete ex namorados da sua namorada para ganhar seu coração.', '6955fd7ec9a85f2039db34d974e135a8sp.jpg'),
(61, 'Shark Side of the Moon', ' Glenn Campbell', 2.9, 2022, '5', '01:28:00', 1, 10, 16, 0, 'Décadas atrás, a URSS desenvolveu tubarões impossíveis de matar e os lançou à lua. Hoje, uma equipe de astronautas americanos enfrentará a luta de suas vidas.', '2d1d10b999c1a86244b9ad67b5743fc2ssm.jpg'),
(62, 'Trem bala', ' David Leitch', 7.3, 2022, '5', '02:27:00', 1, 4, 15, 0, 'Cinco assassinos a bordo de um trem-bala em movimento descobrem que suas missões têm algo em comum.', '4dfab573afc7e013ed276edc7a7c5ca4tb.jpg'),
(63, 'Terrifier', ' Damien Leone', 6.2, 2022, '1', '02:18:00', 16, 0, 0, 0, 'Depois de uma entidade sinistra o resuscitar, Art, o palhaço, está de volta no condado de Miles, onde busca caçar uma adolescente e seu irmão mais novo durante o Halloween.', '531ae9819c890fbe7f03e4c10a6369c6terr.jpg'),
(64, 'The Batman', 'Matt Reeves', 7.8, 2022, '4', '02:56:00', 1, 13, 7, 0, 'Após dois anos espreitando as ruas como Batman, Bruce Wayne se encontra nas profundezas mais sombrias de Gotham City. Com poucos aliados confiáveis, o vigilante solitário se estabelece como a personificação da vingança para a população.', '9fefb1724d66401e575981569b536869theB.jpg'),
(65, 'Truque de mestre', 'Louis Leterrier', 7.2, 2013, '3', '01:55:00', 13, 12, 15, 0, 'Um agente do FBI e um detetive da Interpol seguem a pista de um grupo de ilusionistas que roubam bancos durante o show e recompensam o público com o dinheiro.', '813da957928a85f7715c0dd6aea97bcatm.jpg'),
(66, 'Transformers: O Despertar das Feras', 'Steven Caple Jr.', 8.2, 2023, '3', '01:57:00', 1, 3, 10, 8, 'Nos anos 1990, Maximals, Predacons e Terrorcons se juntam à batalha entre Autobots e Decepticons.', '1cc96c64220b2efec4bd105352ea82e4todf.jpg'),
(67, 'Ursinho Pooh: Sangue e Mell', ' Rhys Frake-Waterfield', 3, 2023, '5', '01:24:00', 16, 0, 0, 0, 'Depois de serem abandonados por Christopher, que foi para a faculdade, Winnie e Piglet matam qualquer um que se atreva a se aventurar na Floresta dos Sonhos Azuis.', '50b2802da5a7157ddce711c9979ceeacupsm.jpg'),
(68, 'Um sonho de liberdade', ' Frank Darabont', 9.3, 1994, '5', '02:23:00', 7, 0, 0, 0, 'Dois homens presos se reúnem ao longo de vários anos, encontrando consolo e eventual redenção através de atos de decência comum.', 'f00b3ba999f937d34448287e716adbeausl.jpg'),
(69, 'Your name', ' Makoto Shinkai', 8.4, 2016, '1', '01:46:00', 2, 7, 9, 14, 'Dois estranhos estão ligados de uma maneira bizarra, mais quando uma conexão é formada, a distância será a única coisa que os manterá separados?', '88c93a58c09247e52a96c831f4ecfd4aavs.jpg'),
(70, 'A dama e o vagabundo', 'Hamilton Luske', 7.3, 1955, '1', '01:16:00', 2, 3, 4, 14, 'A improvável história de amor entre Dama, uma cadelinha doméstica, e Vagabundo, um cão que nasceu e viveu sempre nas ruas.', '622f910cb473ebc3c256639f41a37e93adev.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `adm` int(1) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `nome`, `email`, `senha`, `adm`, `foto`) VALUES
(2, 'Governo', 'Corrupto@AlbionOnline', '$2y$10$AFlEpb9uqFVdYOmSIhVHLO8YE0iv5EhEhezIfsd7W11yPSQpWQCfi', 0, ''),
(3, 'rato alado', 'elRataAlada@Ratao', '$2y$10$CvAaxiC24f6wy8WSTb86y.WpSci/lqZV4.sOfNj/mtYr875C.UXC.', 0, ''),
(4, 'Xaolin Matador de Porco', 'flavin_do_pneu@hotmail.com', '$2y$10$.5QgJAs8kf631FpuZvJxp.gcyHN52eSeH36uRM2iE6Fgp2/w1ZUTm', 0, 'ebf8b724c8aa3023a5c31ad0fd567a71IMG-20210701-WA0001.jpg'),
(5, 'chuva chuvosa', 'solquente@hotspot', '$2y$10$bmLWhKw9OW2friQlwHt6MuBxJ3YnrHlJIa.xLYobBV0XQbuhhtB0q', 0, ''),
(6, 'Kenner', 'chinelolovec++@aaa', '$2y$10$3TQioyimS8A/5yUUXdilLuuCWdIPr.1iJEJZipV99Vx8Vris6BdSG', 0, '0685f159e9fb28847980636a630209f5WIN_20230314_08_56_32_Pro.jpg'),
(7, 'CNPJ', 'lulupeRez@hotmail.com.gov.br.fatec.aracatuba.edu.gartic.nicolasMane.com', '$2y$10$.Ip4d1k1fPDvImiOao.KPeFzSRsa3WOEmia3boQtKpDtRv53LaVeO', 0, ''),
(9, 'Diego 1', 'digo@diego', '$2y$10$hTM2n5qHSz0QU2U34JYmKOfC3vu4dqx73hHPH3kY7RgljSs7gdD/.', 0, ''),
(10, 'Feijão', 'a@rroz', '$2y$10$IcFPJhL/s.90gMusqGWFbudD0IBXjD7Wv08ZqiFpk/FZTvOS1w2VG', 0, ''),
(11, 'Penfone', 'El_M@deira', '$2y$10$Ny8P6SXkIZWJNVYDL86Zie3v9MTFV.B9grYabAciGAYRfoQcO0..q', 0, 'd3aaacb52ae1d61ff4b6726dfbf072153x4A.jpg'),
(12, 'Mago', 'O_M@go', '$2y$10$8BrbzCApCUyNK3uqAfGZH.x3VPmRW9Jrw3Qm1tnE1TaCrQZFDnCA.', 1, '8020c3a969d8e963f685c11867f86f8edownload.jpg'),
(13, 'Nigolas', 'nicol@s.com', '$2y$10$7rmLsEnlFZnkYSC.eNA57uI9ayJBr5KvcBZ/ipHZLNPMosu.iDpHm', 0, ''),
(14, 'Diegão', 'dieg@o', '$2y$10$6IgH3hkzyefFYuR4iWQ4DutVqSkPXhFrdPzvMxcYlNvUwVsR8Hai2', 0, ''),
(15, 'Gui', 'Gui@Gui', '$2y$10$b547zRK6oYZI/czEjbUVyOTT9Oey6Gdf/AEBoru6pTEHSzTUsW4rm', 0, ''),
(17, 'Ronnie', 'ronnie@fatec', '$2y$10$CyzCSTSdUv00xpTxI7.Ec.3DOotP/g1mtY/YjwWRaiBG6CzNVbQj6', 0, ''),
(19, 'senha', 'senh@fraca', '$2y$10$bX9rBZM//3hHbl70T.xRm.nMok5UDfnzTpkwJ2lxklZ9QHEF6cCN.', 1, 'ac71b5fafc6a0cfd6b53b3b0b4743c7e480537.png'),
(21, 'Panchiro', 'p@nchiro', '$2y$10$pgxoH0pht9hRjoAEx2G4Nu/qI.VqfYs/bgvWHC2NkKpo8OqQdqkwS', 0, '452e976b25486f14dfa210b64b2eb4c87f647ecd1247c20b32a8ca64ef43f1d1.jpg'),
(22, 'Emili', 'Emili@email', '$2y$10$v9GrJY.kQykfuuRUP/wdQ.kD1abXYEaXlNsrbOg3k4bGSNRGqJgOe', 0, '../imagens/user.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`idF`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_filme` (`id_filme`);

--
-- Índices para tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `idF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`id_filme`) REFERENCES `filmes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
