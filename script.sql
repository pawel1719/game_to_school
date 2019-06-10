CREATE DATABASE IF NOT EXISTS game DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE quiz;

CREATE TABLE IF NOT EXISTS user_ranking (
    `ID`        INT(11) NOT NULL AUTO_INCREMENT,
    `nick`      VARCHAR(25) NOT NULL,
    `results`   INT(11) NOT NULL,
    `date`      DATETIME NOT NULL,
    PRIMARY KEY(ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE IF NOT EXISTS question_to_game (
    `ID`              INT(11) NOT NULL AUTO_INCREMENT,
    `id_type`         INT(11) NOT NULL,
    `question`        VARCHAR(150) NOT NULL,
    `answer`         VARCHAR(50) NOT NULL,
    `correct_answer`  INT(5) NOT NULL DEFAULT 0,
    `wrong_answer`    INT(5) NOT NULL DEFAULT 0,
    PRIMARY KEY(ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

INSERT INTO question_to_game (`ID_type`, `question`, `annswer`, `correct_answer`, `wrong_answer`)
VALUES
    (1, 'Jaką stolicę ma Gwinea Równikowa?', 'Malabo', 0, 0),
    (1, 'Jaką stolicę ma Kamerun?', 'Jaunde', 0, 0),
    (1, 'Jaką stolicę ma Kenia?', 'Nairobi', 0, 0),
    (1, 'Jaką stolicę ma Komory?', 'Moroni', 0, 0),
    (1, 'Jaką stolicę ma Kongo?', 'Brazzaville', 0, 0),
    (1, 'Jaką stolicę ma Lesotho?', 'Maseru', 0, 0),
    (1, 'Jaką stolicę ma Liberia?', 'Monrovia', 0, 0),
    (1, 'Jaką stolicę ma Libia?', 'Trypolis', 0, 0),
    (1, 'Jaką stolicę ma Madagaskar?', 'Antananarywa', 0, 0),
    (1, 'Jaką stolicę ma Malawi?', 'Lilongwe', 0, 0),
    (1, 'Jaką stolicę ma Mali?', 'Bamako', 0, 0),
    (1, 'Jaką stolicę ma Maroko?', 'Rabat', 0, 0),
    (1, 'Jaką stolicę ma Mauretania?', 'Nawakszut', 0, 0),
    (1, 'Jaką stolicę ma Mauritius Port?', 'Louis', 0, 0),
    (1, 'Jaką stolicę ma Mozambik?', 'Maputo', 0, 0),
    (1, 'Jaką stolicę ma Namibia?', 'Windhuk', 0, 0),
    (1, 'Jaką stolicę ma Niger?', 'Niamey', 0, 0),
    (1, 'Jaką stolicę ma Nigeria?', 'Abudża', 0, 0),
    (1, 'Jaką stolicę ma Południowa Afryka?', 'Pretoria', 0, 0),
    (1, 'Jaką stolicę ma Republika Środkowoafrykańska?', 'Bangi', 0, 0),
    (1, 'Jaką stolicę ma Republika Zielonego Przylądka?', 'Praia', 0, 0),
    (1, 'Jaką stolicę ma Rwanda?', 'Kigali', 0, 0),
    (1, 'Jaką stolicę ma Senegal?', 'Dakar', 0, 0),
    (1, 'Jaką stolicę ma Seszele?', 'Victoria', 0, 0),
    (1, 'Jaką stolicę ma Sierra Leone?', 'Freetown', 0, 0),
    (1, 'Jaką stolicę ma Somalia?', 'Mogadiszu', 0, 0),
    (1, 'Jaką stolicę ma Eswatini?', 'Mbabane', 0, 0),
    (1, 'Jaką stolicę ma Sudan?', 'Chartum', 0, 0),
    (1, 'Jaką stolicę ma Sudan Południowy?', 'Dżuba', 0, 0),

    (1, 'Jaką stolicę ma Argentyna?', 'Buenos Aires', 0, 0),
    (1, 'Jaką stolicę ma Boliwia?', 'Sucre', 0, 0),
    (1, 'Jaką stolicę ma Brazylia?', 'Brasília', 0, 0),
    (1, 'Jaką stolicę ma Chile?', 'Santiago', 0, 0),
    (1, 'Jaką stolicę ma Ekwador?', 'Quito', 0, 0),
    (1, 'Jaką stolicę ma Gujana?', 'Georgetown', 0, 0),
    (1, 'Jaką stolicę ma Kolumbia?', 'Bogota', 0, 0),
    (1, 'Jaką stolicę ma Paragwaj?', 'Asunción', 0, 0),
    (1, 'Jaką stolicę ma Peru?', 'Lima', 0, 0),
    (1, 'Jaką stolicę ma Surinam?', 'Paramaribo', 0, 0),
    (1, 'Jaką stolicę ma Urugwaj?', 'Montevideo', 0, 0),
    (1, 'Jaką stolicę ma Wenezuela?', 'Caracas', 0, 0),

    (1, 'Jaką stolicę ma Antigua i Barbuda?', 'Saint John’s', 0, 0),
    (1, 'Jaką stolicę ma Bahamy?', 'Nassau', 0, 0),
    (1, 'Jaką stolicę ma Barbados?', 'Bridgetown', 0, 0),
    (1, 'Jaką stolicę ma Belize?', 'Belmopan', 0, 0),
    (1, 'Jaką stolicę ma Dominika?', 'Roseau', 0, 0),
    (1, 'Jaką stolicę ma Dominikana?', 'Santo Domingo', 0, 0),
    (1, 'Jaką stolicę ma Grenada?', 'Saint George’s', 0, 0),
    (1, 'Jaką stolicę ma Gwatemala?', 'Gwatemala', 0, 0),
    (1, 'Jaką stolicę ma Haiti?', 'Port-au-Prince', 0, 0),
    (1, 'Jaką stolicę ma Honduras?', 'Tegucigalpa', 0, 0),
    (1, 'Jaką stolicę ma Jamajka?', 'Kingston', 0, 0),
    (1, 'Jaką stolicę ma Kanada?', 'Ottawa', 0, 0),
    (1, 'Jaką stolicę ma Kostaryka?', 'San José', 0, 0),
    (1, 'Jaką stolicę ma Kuba?', 'Hawana', 0, 0),
    (1, 'Jaką stolicę ma Meksyk?', 'Meksyk', 0, 0),
    (1, 'Jaką stolicę ma Nikaragua?', 'Managua', 0, 0),
    (1, 'Jaką stolicę ma Panama?', 'Panama', 0, 0),
    (1, 'Jaką stolicę ma Saint Kitts i Nevis?', 'Basseterre', 0, 0),
    (1, 'Jaką stolicę ma Saint Lucia?', 'Castries', 0, 0),
    (1, 'Jaką stolicę ma Saint Vincent i Grenadyny?', 'Kingstown', 0, 0),
    (1, 'Jaką stolicę ma Salwador?', 'San Salvador', 0, 0),
    (1, 'Jaką stolicę ma Stany Zjednoczone?', 'Waszyngton', 0, 0),
    (1, 'Jaką stolicę ma Trynidad i Tobago?', 'Port-of-Spain', 0, 0),

    (1, 'Jaką stolicę ma Albania?', 'Tirana', 0, 0),
    (1, 'Jaką stolicę ma Andora?', 'Andora', 0, 0),
    (1, 'Jaką stolicę ma Austria?', 'Wiedeń', 0, 0),
    (1, 'Jaką stolicę ma Belgia?', 'Bruksela', 0, 0),
    (1, 'Jaką stolicę ma Białoruś?', 'Mińsk', 0, 0),
    (1, 'Jaką stolicę ma Bośnia i Hercegowina?', 'Sarajewo', 0, 0),
    (1, 'Jaką stolicę ma Bułgaria?', 'Sofia', 0, 0),
    (1, 'Jaką stolicę ma Chorwacja?', 'Zagreb', 0, 0),
    (1, 'Jaką stolicę ma Czarnogóra?', 'Podgorica', 0, 0),
    (1, 'Jaką stolicę ma Czechy?', 'Praga', 0, 0),
    (1, 'Jaką stolicę ma Dania?', 'Kopenhaga', 0, 0),
    (1, 'Jaką stolicę ma Estonia?', 'Tallinn', 0, 0),
    (1, 'Jaką stolicę ma Finlandia?', 'Helsinki', 0, 0),
    (1, 'Jaką stolicę ma Francja?', 'Paryż', 0, 0),
    (1, 'Jaką stolicę ma Grecja?', 'Ateny', 0, 0),
    (1, 'Jaką stolicę ma Hiszpania?', 'Madryt', 0, 0),
    (1, 'Jaką stolicę ma Holandia?', 'Amsterdam', 0, 0),
    (1, 'Jaką stolicę ma Irlandia?', 'Dublin', 0, 0),
    (1, 'Jaką stolicę ma Islandia?', 'Reykjavík', 0, 0),
    (1, 'Jaką stolicę ma Liechtenstein?', 'Vaduz', 0, 0),
    (1, 'Jaką stolicę ma Litwa?', 'Wilno', 0, 0),
    (1, 'Jaką stolicę ma Luksemburg?', 'Luksemburg', 0, 0),
    (1, 'Jaką stolicę ma Łotwa?', 'Ryga', 0, 0),
    (1, 'Jaką stolicę ma Macedonia Północna?', 'Skopje', 0, 0),
    (1, 'Jaką stolicę ma Malta?', 'Valletta', 0, 0),
    (1, 'Jaką stolicę ma Mołdawia?', 'Kiszyniów', 0, 0),
    (1, 'Jaką stolicę ma Monako?', 'Monako', 0, 0),
    (1, 'Jaką stolicę ma Niemcy?', 'Berlin', 0, 0),
    (1, 'Jaką stolicę ma Norwegia?', 'Oslo', 0, 0),
    (1, 'Jaką stolicę ma Polska?', 'Warszawa', 0, 0),
    (1, 'Jaką stolicę ma Portugalia?', 'Lizbona', 0, 0),
    (1, 'Jaką stolicę ma Rosja?', 'Moskwa', 0, 0),
    (1, 'Jaką stolicę ma Rumunia?', 'Bukareszt', 0, 0),
    (1, 'Jaką stolicę ma San Marino?', 'San Marino', 0, 0),
    (1, 'Jaką stolicę ma Serbia?', 'Belgrad', 0, 0),
    (1, 'Jaką stolicę ma Słowacja?', 'Bratysława', 0, 0),
    (1, 'Jaką stolicę ma Słowenia?', 'Lublana', 0, 0),
    (1, 'Jaką stolicę ma Szwajcaria?', 'Berno', 0, 0),
    (1, 'Jaką stolicę ma Szwecja?', 'Sztokholm', 0, 0),
    (1, 'Jaką stolicę ma Ukraina?', 'Kijów', 0, 0),
    (1, 'Jaką stolicę ma Watykan?', 'Watykan', 0, 0),
    (1, 'Jaką stolicę ma Węgry?', 'Budapeszt', 0, 0),
    (1, 'Jaką stolicę ma Wielka Brytania?', 'Londyn', 0, 0),
    (1, 'Jaką stolicę ma Włochy?', 'Rzym', 0, 0);