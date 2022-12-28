INSERT INTO `categories` (`id`, `name`, `created_at`)
VALUES (1, 'Drama', '2022-11-22 21:58:09.000000'),
       (2, 'Animação', '2022-11-23 13:51:02.000000'),
       (3, 'Romance', '2022-11-29 18:25:42.000000'),
       (4, 'Comédia', '2022-12-19 15:07:54.000000');
ALTER TABLE `categories`
    AUTO_INCREMENT = 5;

INSERT INTO `comments` (`id`, `movie_id`, `writer`, `comment`, `rating`, `commented_at`)
VALUES (4, 2, 'Juliana Saran', 'Filme ótimo também', 0, '2022-11-28 21:14:43'),
       (5, 2, 'Juliana Saran', 'Filme ótimo também', 0, '2022-11-29 14:16:43'),
       (6, 1, 'Juliana Saran', 'Filme ótimo também', 0, '2022-11-29 14:16:52'),
       (7, 4, 'Juliana Saran', 'Filme baseado no livro homônimo de Erich Maria Ramarque', 0, '2022-11-29 18:24:21'),
       (8, 1, 'Thiago Cordeiro', 'Filme baseado no livro homônimo de Erich Maria Ramarque', 0, '2022-11-29 19:31:01'),
       (9, 1, 'Thiago Cordeiro', 'Filme baseado no livro homônimo de Erich Maria Ramarque', 5, '2022-12-01 15:18:00');
ALTER TABLE `comments`
    AUTO_INCREMENT = 10;

INSERT INTO `movies` (`id`, `name`, `description`, `image`, `trailer`, `launched_at`, `created_at`)
VALUES (1, 'Mulan', '', 'mulan.jpg', 'https://www.youtube.com/watch?v=1Y826kBsgSM', '1998-06-05 00:00:00.000000',
        '2022-11-22 14:48:06.000000'),
       (2, 'As Branquelas', '', '', '', '2004-08-27 00:00:00.000000', '2022-11-22 15:01:22.000000'),
       (6, 'As Branquelas',
        'os irmãos Marcus (Marlon Wayans) e Kevin Copeland (Shawn Wayans) são detetives do FBI que estão com problemas no trabalho. A última investigação da dupla foi um grande fracasso e eles estão sob a ameaça de serem demitidos. Quando um plano para sequestrar as mimadas irmãs Brittany (Maitland Ward) e Tiffany Wilson (Anne Dudek) é descoberto, o caso é entregue aos principais rivais dos irmãos Copeland, os agentes Vincent Gomez (Eddie Velez) e Jack Harper (Lochlyn Munro). Para aumentar ainda mais a humilhação da dupla, eles são escalados para escoltar as jovens mimadas do aeroporto até o local de um evento pelo qual elas esperaram por meses. Porém no trajeto um acidente de carro provoca um verdadeiro desastre: enquanto uma das irmãs arranha o nariz, a outra corta o lábio. Desesperadas, elas se recusam a ir ao evento. É quando,para salvar o emprego, Marcus e Kevin decidem por assumir as identidades das irmãs.',
        'branquelas.jpg', '', '2004-08-27 00:00:00.000000', '2022-12-01 17:45:00.000000'),
       (7, 'O Bombardeio',
        'Em 21 de março de 1945, a Força Aérea Real Britânica partiu em uma missão para bombardear a sede da Gestapo em Copenhague. O ataque teve consequências fatais, pois alguns dos homens-bomba atingiram acidentalmente uma escola e mais de 120 pessoas foram mortas, 86 das quais eram crianças.',
        'bombardeio.jpeg', '', '2022-04-18 00:00:00.000000', '2022-12-01 17:51:16.000000'),
       (9, 'Kung Fu Panda',
        'Po é um panda que trabalha na loja de macarrão da sua família e sonha em transformar-se em um mestre de kung fu. Seu sonho se torna realidade quando, inesperadamente, ele deve cumprir uma profecia antiga e estudar a arte marcial com seus ídolos, os Cinco Furiosos. Po precisa de toda a sabedoria, força e habilidade que conseguir reunir para proteger seu povo de um leopardo da neve malvado.',
        'Kungfupanda.jpg', '', '2008-07-04 00:00:00.000000', '2022-12-16 13:35:23.000000'),
       (10, 'A vida de Walter Mitty', 'CreateMovieService555', '', '555', '2022-12-20 15:10:23.000000',
        '2022-12-20 15:10:23.000000'),
       (11, 'Adeus Lênin',
        'Comunista ferrenha enfarta e entra em coma ao ver o filho em protesto contra o regime. Quando ela acorda um ano depois, o Muro de Berlim foi derrubado, mas seu filho luta para fingir que nada mudou, temendo que o choque lhe seja fatal.',
        'adeus-lenin.jpg', '', '2022-12-20 18:45:33.000000', '2022-12-20 18:45:33.000000'),
       (12, 'De repente 30',
        'Jenna Rink é uma garota que está descontente com sua própria idade. Em seu 13º aniversário, ela faz um pedido: virar adulta. O pedido milagrosamente se torna realidade e, no dia seguinte, Jenna acorda com 30 anos de idade',
        'de-repente-30.jpg', '', '2022-12-20 18:54:23.000000', '2022-12-20 18:54:23.000000');
ALTER TABLE `movies`
    AUTO_INCREMENT = 13;

INSERT INTO `movie_categories` (`movie_id`, `category_id`, `related_at`)
VALUES (1, 2, '2022-11-24 18:56:45.000000'),
       (9, 2, '2022-12-16 13:36:03.000000'),
       (6, 4, '2022-12-19 15:08:33.000000'),
       (7, 1, '2022-12-19 15:08:49.000000'),
       (12, 4, '2022-12-20 18:54:23.000000'),
       (1, 4, '2022-12-22 09:47:24.000000');
