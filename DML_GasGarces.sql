Tabla Estatus

INSERT INTO Estatus (Tipo) VALUES ("Disponible"), ("Ocupado"), ("Pendiente"), ("Realizado"), ("Cancelado");

Tabla Pipa

INSERT INTO Pipa (Matricula,Id_Estatus,CapacidadMax,CapacidadMin,GasDisponible )
VALUES ("PRUEBA",1,3700,150,0);
	
		
Tabla Municipio

INSERT INTO Municipio (Nombre)
VALUES ("Zinacantepec"),("Toluca"),("Metepec");
		
Tabla CodigoPost

INSERT INTO CodigoPost(Codigo,Id_Municipio)
VALUES 
(51350,1),
(51354,1),
(51355,1),
(51356,1),
(51357,1),
(51360,1),
(51364,1),
(51366,1),
(51367,1),
(51370,1),
(51373,1),
(51374,1),
(51375,1),
(51380,1),
(51383,1),
(51384,1),
(51385,1),
(51386,1),
(51390,1),
(51393,1),
(50000,2),
(50010,2),
(50016,2),
(50017,2),
(50018,2),
(50019,2),
(50020,2),
(50026,2),
(50040,2),
(50050,2),
(50060,2),
(50070,2),
(50071,2),
(50075,2),
(50080,2),
(50090,2),
(50100,2),
(50103,2),
(50110,2),
(50115,2),
(50120,2),
(50122,2),
(50123,2),
(50130,2),
(50140,2),
(50150,2),
(50160,2),
(50168,2),
(50170,2),
(50180,2),
(50190,2),
(50200,2),
(50205,2),
(50206,2),
(50209,2),
(50210,2),
(50214,2),
(50220,2),
(50223,2),
(50225,2),
(50226,2),
(50227,2),
(50228,2),
(50230,2),
(50233,2),
(50235,2),
(50236,2),
(50240,2),
(50245,2),
(50246,2),
(50250,2),
(50253,2),
(50254,2),
(50255,2),
(50256,2),
(50257,2),
(50258,2),
(50260,2),
(50263,2),
(50264,2),
(50265,2),
(50266,2),
(50270,2),
(50273,2),
(50274,2),
(50280,2),
(50283,2),
(50284,2),
(50285,2),
(50286,2),
(50290,2),
(50293,2),
(50294,2),
(50295,2),
(52140,3),
(52143,3),
(52144,3),
(52145,3),
(52146,3),
(52147,3),
(52148,3),
(52149,3),
(52150,3),
(52154,3),
(52155,3),
(52156,3),
(52157,3),
(52158,3),
(52159,3),
(52160,3),
(52161,3),
(52164,3),
(52165,3),
(52166,3),
(52167,3),
(52168,3),
(52169,3),
(52170,3),
(52172,3),
(52175,3),
(52176,3),
(52177,3),
(52178,3),
(52179,3)
;

Tabla Colonia

INSERT INTO Colonia(Nombre,Id_Codigo)
VALUES 
("Pueblo San Miguel Zinacantepec", 1),
("Colonia La Joya", 2),
("Barrio De San Miguel", 2),
("Barrio Del Calvario", 2),
("Fraccionamiento La Esperanza", 2),
("Fraccionamiento Nevado Plus I", 2),
("Fraccionamiento Nevado Plus II", 2),
("Barrio Cerro del Murciélago", 2),
("Colonia Las Ánimas", 2),
("Fraccionamiento La Aurora II", 2),
("Fraccionamiento La Aurora I", 2),
("Fraccionamiento Residencial Zinacantepec", 2),
("Fraccionamiento 29 de Octubre", 2),
("Fraccionamiento Los Maestros", 2),
("Barrio San Miguel", 2),
("Fraccionamiento Vista Nevado 1", 2),
("Fraccionamiento San Valentín", 3),
("Ranchería El Capón (Puerta del Llano)", 3),
("Ranchería Santa Martha", 3),
("Barrio Zimbrones", 3),
("Colonia Las Culturas", 3),
("Colonia Emiliano Zapata", 3),
("Exhacienda San Jorge", 3),
("Colonia La Cruz", 3),
("Fraccionamiento Residencial La Victoria", 3),
("Colonia Rinconada de Tecaxic", 3),
("Fraccionamiento Zamarrero", 3),
("Pueblo San Lorenzo Cuautenco", 3),
("Pueblo San Luis Mextepec", 3),
("Fraccionamiento Rancho San Nicolás", 3),
("Fraccionamiento Bosques Residencial", 3),
("Fraccionamiento Ojuelos", 3),
("Colonia La Virgen", 3),
("Colonia La Joya", 3),
("Fraccionamiento El Porvenir", 3),
("Fraccionamiento La Loma", 3),
("Fraccionamiento Casa Grande", 3),
("Fraccionamiento Privadas de la Hacienda", 3),
("Colonia Nueva Serratón", 3),
("Colonia Zimbron", 3),
("Colonia Vista Hermosa", 3),
("Barrio De la Veracruz", 4),
("Residencial San Gregorio", 4),
("Colonia Irma Patricia Galindo de Rez", 4),
("Colonia Deportiva", 4),
("Colonia Lindavista", 4),
("Colonia San Matías Transfiguración", 5),
("Colonia El Testerazo", 5),
("Colonia Ricardo Flores Magón", 5),
("Fraccionamiento Hacienda San José Barbabosa", 5),
("Colonia El Potrero Barbabosa", 5),
("Fraccionamiento Paraje la Puerta de Barbabosa", 5),
("Fraccionamiento Villas de Guadalupe", 5),
("Fraccionamiento Vista Nevado Plus", 5),
("Pueblo Santa María del Monte", 6),
("Barrio El Cóporo", 7),
("Barrio El Curtidor", 7),
("Barrio San Miguel Hojas Anchas", 7),
("Barrio San Bartolo del Llano (San Isidro)", 8),
("Barrio San Bartolo el Viejo", 8),
("Pueblo San Cristóbal Tecolit", 9),
("Pueblo Loma de San Francisco", 9),
("Barrio De México", 9),
("Fraccionamiento Bosques del Nevado", 10),
("Pueblo San Juan de las Huertas", 10),
("Pueblo Santa Cruz Cuauhtenco", 10),
("Colonia Morelos", 10),
("Colonia Dos de Marzo", 10),
("Barrio Recibitas (El Remolino)", 11),
("Pueblo Ojo de Agua", 12),
("Pueblo Tejalpa", 13),
("Colonia Benito Juárez", 13),
("Pueblo San Antonio Acahualco", 14),
("Colonia Cuauhtémoc", 15),
("Colonia Progreso", 15),
("Pueblo San Pedro Tejalpa", 15),
("Pueblo El Contadero de Matamoros (San José)", 16),
("Barrio Ciendabajo (Hacienda de Abajo)", 17),
("Colonia La Cañada (Cañada Grande)", 18),
("Colonia La Herradura", 18),
("Pueblo La Puerta del Monte", 19),
("Pueblo Buenavista", 19),
("Pueblo Loma Alta", 20),
("Pueblo Raíces", 20),
("Pueblo La Peñuela", 20),
("Colonia Toluca de Lerdo Centro", 21),
("Colonia Celanese", 22),
("Colonia Club Jardín", 22),
("Colonia Guadalupe", 22),
("Colonia La Cruz Comalco", 22),
("Colonia La Magdalena", 22),
("Fraccionamiento Los Girasoles", 22),
("Fraccionamiento Los Girasoles II", 22),
("Fraccionamiento Los Girasoles III", 22),
("Fraccionamiento Los Girasoles IV", 22),
("Colonia San Lorenzo Tepaltitlán Centro", 22),
("Barrio Tlacopa", 22),
("Colonia Universidad", 22),
("Barrio San Angelín", 22),
("Fraccionamiento Galaxias de San Lorenzo", 22),
("Colonia El Tejocote", 22),
("Colonia El Balcón", 22),
("Fraccionamiento Los Girasoles I", 22),
("Colonia San Juan de la Cruz", 22),
("Fraccionamiento Hacienda San Agustín", 22),
("Barrio La Loma", 22),
("Barrio Del Panteón", 22),
("Fraccionamiento Villas Tepaltitlán", 22),
("Fraccionamiento Gran Morada", 22),
("Unidad habitacional Jardines de la Crespa", 23),
("Zona industrial Parque industrial San Antonio", 23),
("Barrio De la Crespa", 23),
("Fraccionamiento Las Brisas", 24),
("Colonia Rincón de San Lorenzo", 24),
("Fraccionamiento Las Flores", 25),
("Colonia San Antonio", 25),
("Barrio El Mogote", 25),
("Colonia San Rafael", 26),
("Barrio El Charco", 26),
("Fraccionamiento Bosques de la Mora", 27),
("Colonia Los Ángeles", 27),
("Fraccionamiento Los Frailes", 27),
("Colonia Rancho la Mora", 27),
("Fraccionamiento Rinconada de la Mora", 27),
("Pueblo Santiago Miltepec", 27),
("Colonia 3 Caminos", 27),
("Fraccionamiento Valle de Santiago Residencial", 27),
("Colonia Carlos Hank González", 28),
("Barrio La Retama", 29),
("Barrio La Teresona", 29),
("Colonia Unión", 29),
("Barrio San Luis Obispo", 29),
("Barrio San Miguel Apinahuizco", 29),
("Colonia Sector Popular", 29),
("Colonia Sor Juana Inés de la Cruz", 29),
("Colonia Electricistas Locales", 29),
("Barrio El Cóporo", 30),
("Barrio Santa Bárbara", 30),
("Barrio Zopilocalco Sur", 30),
("Barrio Zopilocalco Norte", 30),
("Colonia Doctores", 31),
("Fraccionamiento Lomas Altas", 31),
("Colonia Niños Héroes (Pensiones)", 31),
("Colonia San Juan Buenavista", 31),
("Barrio Huitzila", 31),
("Colonia Independencia", 32),
("Colonia Meteoro", 32),
("Fraccionamiento Villas Fontana I", 32),
("Fraccionamiento Villas Fontana II", 32),
("Unidad habitacional Fidel Velázquez", 32),
("Colonia Reforma y Ferrocarriles Nacionales", 32),
("Zona industrial Toluca", 33),
("Fraccionamiento Las Torres", 34),
("Colonia Científicos", 34),
("Barrio La Merced (Alameda)", 35),
("Barrio San Bernardino", 35),
("Colonia 5 de Mayo", 36),
("Barrio Santa Clara", 36),
("Colonia Bosques de San Mateo", 37),
("Colonia 14 de Diciembre", 37),
("Fraccionamiento El Trigo", 37),
("Colonia La Joya", 37),
("Fraccionamiento La Ribera I", 37),
("Fraccionamiento La Ribera II", 37),
("Fraccionamiento La Ribera III", 37),
("Fraccionamiento La Ribera IV", 37),
("Colonia Miguel Hidalgo (Corralitos)", 37),
("Colonia Niños Héroes", 37),
("Colonia Nueva Oxtotitlán", 37),
("Fraccionamiento Parque de San Mateo", 37),
("Colonia Parques Nacionales", 37),
("Colonia Protinbos", 37),
("Colonia Rincón del Parque", 37),
("Colonia San Mateo Oxtotitlán", 37),
("Fraccionamiento Ex-Hacienda San Jorge", 37),
("Fraccionamiento Lomas de San Mateo", 37),
("Barrio Tlayaca", 38),
("Barrio Tlanepantla", 38),
("Barrio Atotonilco", 38),
("Colonia Cultural", 39),
("Colonia Del Deporte", 39),
("Colonia Guadalupe San Buenaventura", 39),
("Fraccionamiento Plazas de San Buenaventura", 39),
("Colonia San Buenaventura", 39),
("Colonia Vicente Guerrero", 39),
("Fraccionamiento Villas de San Buenaventura", 39),
("Fraccionamiento Real del Bosque", 39),
("Colonia Loma Bonita", 40),
("Colonia Ciprés", 41),
("Colonia Federal (Adolfo López Mateos)", 41),
("Colonia Granjas", 41),
("Colonia Morelos 1a Sección", 41),
("Colonia Morelos 2a Secc", 41),
("Fraccionamiento Residencial Colón", 41),
("Zona federal Zona Militar", 42),
("Fraccionamiento Nuevo San Antonio", 43),
("Colonia Providencia", 44),
("Colonia Los Reyes", 44),
("Barrio San Miguel Totocuitlapilco", 44),
("Barrio La Florida", 44),
("Barrio Santa Cruz", 44),
("Colonia San Pablo Autopan", 44),
("Colonia Barrio Norte", 44),
("Colonia Cuauhtémoc", 44),
("Colonia el Seminario", 44),
("Barrio San Pablo Autopan Centro", 44),
("Colonia San Felipe Tlalmimilolpan", 44),
("Fraccionamiento San Isidro", 44),
("Colonia Los Sauces", 44),
("Fraccionamiento San Isidro (Ampliación)", 44),
("Colonia Santa Elena", 45),
("Fraccionamiento Cipreses", 45),
("Colonia El Vergel", 45),
("Colonia San Pedro Totoltepec", 45),
("Colonia AGRÍCOLA", 46),
("Fraccionamiento Real de San Agustín", 47),
("Colonia San Agustín Buenavista", 47),
("Colonia Buenavista", 47),
("Colonia la Herradura", 47),
("Fraccionamiento Villas de Santa María", 47),
("Fraccionamiento Villas de la Hacienda", 47),
("Barrio San Cristóbal Huichochitlán", 48),
("Barrio San Pedro Totoltepec", 49),
("Fraccionamiento Las Torres II", 50),
("Fraccionamiento Misiones", 50),
("Colonia Moderna", 50),
("Fraccionamiento Villas de la Hacienda II", 50),
("Colonia Atlacomulco", 51),
("Fraccionamiento los Héroes", 51),
("Fraccionamiento Rancho San Juan", 52),
("Colonia Rincón de los Pájaros", 53),
("Colonia El Carmen", 53),
("Colonia San Andrés Cuexcontitlán", 53),
("Fraccionamiento San Andrés Cuexcontitlán", 53),
("Colonia la Capilla", 54),
("Fraccionamiento San José", 55),
("Fraccionamiento los Pinos", 55),
("Colonia Santa Clara", 56),
("Fraccionamiento el Calvario", 57),
("Colonia Buena Vista", 58),
("Colonia Nueva Oxtotitlán 2a Sección", 59),
("Colonia El Ranchito", 60),
("Fraccionamiento San Jerónimo", 61),
("Colonia La Asunción", 61),
("Fraccionamiento los Sauces", 62),
("Colonia Llano Grande", 63),
("Colonia San Buenaventura 3a Sección", 64),
("Fraccionamiento Real de San Buenaventura", 65),
("Colonia la Tlacopa", 66),
("Colonia la Escuela", 67),
("Colonia San Juan de las Huertas", 68),
("Colonia 15 de Agosto", 68),
("Colonia San Cayetano Morelos", 69),
("Colonia el Rosario", 70),
("Colonia la Esperanza", 71),
("Colonia San Pablo", 72),
("Colonia la Magdalena", 73),
("Colonia el Cerrillo Vista Hermosa", 74),
("Colonia la Carolina", 75),
("Fraccionamiento La Cima", 76),
("Colonia el Tepalcate", 77),
("Colonia el Conde", 78),
("Colonia San Mateo Otzacatipan", 79),
("Colonia los Fresnos", 80),
("Fraccionamiento San Andrés", 81),
("Colonia Lomas de San Andrés", 82),
("Colonia Loma de los Lirios", 83),
("Colonia Lomas de Rosas", 84),
("Fraccionamiento la Era", 85),
("Colonia el Cipres", 86),
("Colonia Izcalli IPIEM", 87),
("Colonia Parque Industrial Lerma", 88),
("Colonia Santiago Occipaco", 89),
("Colonia el Vergel II", 90),
("Fraccionamiento San Luis Obispo", 91),
("Colonia las Águilas", 92),
("Colonia Tierra Grande", 93),
("Colonia el Cipres II", 94),
("Fraccionamiento Residencial Campestre Metepec", 95),
("Fraccionamiento Casa del Pedregal", 95),
("Condominio El Campanario", 95),
("Condominio Guerrero", 95),
("Fraccionamiento La Herradura III", 95),
("Fraccionamiento La Parroquia", 95),
("Fraccionamiento Los Morillos", 95),
("Condominio Los Santos", 95),
("Condominio Los Sauces II", 95),
("Unidad habitacional Mayorazgo", 95),
("Colonia Metepec Centro", 95),
("Condominio Puerta de Hierro", 95),
("Condominio San Agustín", 95),
("Pueblo San Lorenzo Coacalco (San Lorenzo)", 95),
("Barrio San Mateo", 95),
("Barrio San Miguel", 95),
("Barrio Santa Cruz", 95),
("Fraccionamiento Santa Teresa", 95),
("Fraccionamiento Villas Amozoc", 95),
("Barrio Espíritu Santo", 95),
("Barrio Santiaguito", 95),
("Barrio Coaxustenco", 95),
("Condominio Villas del Sol", 95),
("Conjunto habitacional Urbano Bonanza", 95),
("Fraccionamiento Quintas las Manzanas", 95),
("Fraccionamiento Villa Romana", 95),
("Condominio Maple", 95),
("Fraccionamiento Rincón Viejo", 95),
("Fraccionamiento La Asunción", 96),
("Pueblo San Miguel Totocuitlapilco", 96),
("Fraccionamiento Condado del Valle", 97),
("Colonia Agrícola Álvaro Obregón", 97),
("Fraccionamiento Residencial Foresta", 97),
("Pueblo San Lucas Tunco", 98),
("Pueblo San Sebastián", 99),
("Pueblo San Gaspar Tlahuelilpan", 100),
("Fraccionamiento Hacienda San Antonio", 101),
("Fraccionamiento Finca Real", 101),
("Condominio Los Sauces", 101),
("Colonia Lázaro Cárdenas", 101),
("Colonia Llano Grande (El Salitre)", 101),
("Fraccionamiento Los Álamos", 102),
("Unidad habitacional Andrés Molina Enríquez", 102),
("Fraccionamiento La Virgen", 103),
("Condominio Las Mitras", 103),
("Condominio Lomas de San Isidro", 103),
("Condominio Los Robles", 103),
("Fraccionamiento Paseo San Isidro 400", 103),
("Fraccionamiento Rinconada de San Isidro", 103),
("Fraccionamiento San Isidro Residencial", 103),
("Colonia San José La Pilita", 103),
("Condominio Valle del Cristal", 103),
("Fraccionamiento Villas San Agustín", 103),
("Condominio Los Vitrales", 103),
("Condominio Villas Magdalena", 103),
("Fraccionamiento Villas Dante", 103),
("Fraccionamiento Magnolias", 103),
("Fraccionamiento El Manantial", 104),
("Fraccionamiento Residencial Balmoral", 104),
("Fraccionamiento Casa Real", 104),
("Condominio Solar", 104),
("Condominio Herradura I", 104),
("Fraccionamiento Residencial Alborada", 104),
("Condominio La Joya", 104),
("Condominio San Ángel", 104),
("Fraccionamiento Villa Dorada", 104),
("Fraccionamiento Chapultepec I", 104),
("Fraccionamiento Villas Esperanza", 104),
("Fraccionamiento Villas II Residencial", 104),
("Fraccionamiento Villas III", 104),
("Fraccionamiento Villas Kent Secc Sauces", 104),
("Colonia Casa Magna", 104),
("Fraccionamiento El Castaño", 104),
("Condominio La Antigua", 104),
("Condominio Loma Real", 104),
("Fraccionamiento Misión Viejo", 104),
("Condominio Arboledas I", 105),
("Fraccionamiento Los Cedros", 105),
("Condominio Estefanía", 105),
("Condominio Real de Arcos", 105),
("Condominio Las Águilas", 106),
("Fraccionamiento Los Girasoles", 106),
("Fraccionamiento Virreyes Residencial", 106),
("Condominio El Portón I", 107),
("Residencial Hípico", 107),
("Condominio Villas Metepec", 107),
("Colonia Ex-Hacienda de Purísima", 107),
("Colonia El Hipico", 107),
("Colonia El Rodeo", 108),
("Fraccionamiento Las Haciendas", 108),
("Condominio Los Fresnos", 108),
("Condominio Plazuelas de San Francisco", 108),
("Condominio Rincón de San Gabriel", 108),
("Fraccionamiento Rinconada San Carlos", 108),
("Pueblo San Francisco Coaxusco", 108),
("Fraccionamiento San Marino", 108),
("Fraccionamiento Residencial Country Club", 109),
("Fraccionamiento Fortanet", 109),
("Fraccionamiento La Joya", 109),
("Fraccionamiento San Carlos", 109),
("Condominio San Gabriel", 109),
("Colonia El Arenal", 110),
("Pueblo San Bartolomé Tlaltelulco", 110),
("Barrio Santiaguito", 110),
("Colonia Las Jaras", 110),
("Pueblo Santa María Magdalena Ocotitlán", 111),
("Pueblo San Jorge Pueblo Nuevo", 112),
("Colonia Unión", 112),
("Fraccionamiento Casa del Valle", 112),
("Fraccionamiento Residencial Las Palmas", 112),
("Fraccionamiento Las Margaritas", 113),
("Unidad habitacional Agripín García Estrada", 113),
("Barrio Santa Cruz Ocotitlán", 113),
("Colonia Dr. Jorge Jiménez Cantú", 114),
("Colonia La Michoacana", 114),
("Colonia Luisa Isabel Campos de Jiménez Cantú", 114),
("Condominio Bosques San Juan", 115),
("Unidad habitacional Isidro Fabela", 115),
("Fraccionamiento Jesús Jiménez Gallardo", 115),
("Fraccionamiento Residencial Las Américas", 115),
("Condominio El Ciprés", 115),
("Condominio Villas San Gregorio", 115),
("Condominio Estoril", 115),
("Condominio Juan Fernández Albarrán", 115),
("Colonia Municipal", 116),
("Condominio Solidaridad de los Electricistas", 116),
("Fraccionamiento Villas Alteza", 116),
("Fraccionamiento Juan Fernández Albarrán", 117),
("Condominio Las Glorias", 117),
("Condominio El Nogal", 117),
("Colonia Purísima", 117),
("Fraccionamiento Real de San Javier", 117),
("Fraccionamiento Xinantécatl", 117),
("Condominio Valle de San Javier", 117),
("Colonia Electricistas", 117),
("Condominio El Carmen", 118),
("Fraccionamiento Real de San Jerónimo", 118),
("Condominio Real San José", 118),
("Condominio San Jerónimo", 118),
("Pueblo San Jerónimo Chicahualco", 118),
("Condominio Rinconada San Jerónimo", 118),
("Fraccionamiento La Noria", 118),
("Condominio Los Arboles I", 118),
("Condominio Los Arboles II", 118),
("Fraccionamiento Alsacia", 118),
("Condominio Aquitania", 118),
("Condominio Residencial San Salvador", 118),
("Fraccionamiento Explanada del Parque", 118),
("Condominio Villas Kent Sección Guadalupe", 118),
("Condominio ISSEMYM la Providencia", 118),
("Condominio Azaleas", 118),
("Condominio Azaleas I y II", 118),
("Fraccionamiento Lorena", 118),
("Condominio Los Sauces", 118),
("Condominio Normandía", 118),
("Fraccionamiento La Asunción", 119),
("Condominio El Pueblito", 119),
("Fraccionamiento Rancho San Lucas", 119),
("Condominio Rinconada San Luis", 119),
("Pueblo San Salvador Tizatlalli", 119),
("Condominio Sur de La Hacienda", 119),
("Unidad habitacional Esperanza López Mateos", 119),
("Condominio Villas Kent Sección el Nevado", 119),
("Condominio Villas Santa Teresa", 119),
("Condominio Villas Tizatlalli", 119),
("Colonia Agrícola Francisco I. Madero", 119),
("Colonia Bellavista", 119),
("Condominio Santa Cecilia", 119),
("Condominio Estrella", 119),
("Condominio Galápagos", 119),
("Fraccionamiento Real de Azaleas III", 119),
("Condominio San Antonio", 119),
("Fraccionamiento Santa María Regla", 119),
("Condominio Hábitat Metepec", 119),
("Condominio Quintas de San Jerónimo", 119),
("Colonia Árbol de la Vida", 119),
("Condominio Paseo Santa Elena", 119),
("Condominio Santa Rita", 119),
("Condominio Villa los Arrayanes I", 119),
("Condominio Villa los Arrayanes II", 119),
("Condominio Villas Country", 119),
("Condominio San Miguel", 119),
("Condominio El Pirul", 119),
("Condominio La Capilla", 119),
("Condominio Los Cisnes", 119),
("Condominio Real de Azaleas I", 119),
("Condominio Rinconada Mexicana", 119),
("Fraccionamiento Palma Real", 119),
("Fraccionamiento Rinconada la Concordia", 119),
("Fraccionamiento Altavista", 119),
("Fraccionamiento Haciendas de Guadalupe", 119),
("Colonia Casa Blanca", 120),
("Condominio Los Arcos", 120),
("Condominio Renacimiento", 120),
("Residencial Casa Blanca", 120),
("Colonia La Campesina", 120),
("Fraccionamiento Izcalli Cuauhtémoc I", 121),
("Fraccionamiento Izcalli Cuauhtémoc II", 121),
("Fraccionamiento Izcalli Cuauhtémoc III", 121),
("Fraccionamiento Izcalli Cuauhtémoc IV", 121),
("Fraccionamiento Izcalli Cuauhtémoc V", 121),
("Fraccionamiento Izcalli Cuauhtémoc VI", 121),
("Fraccionamiento Las Marinas", 121),
("Fraccionamiento Rincón Colonial", 121),
("Condominio Paseo San Francisco", 121),
("Fraccionamiento Rancho San Francisco", 121),
("Colonia Bosques de Metepec", 121),
("Condominio Campestre del Valle", 122),
("Fraccionamiento Citlalli", 122),
("Colonia La Hortaliza", 122),
("Colonia La Providencia", 122),
("Unidad habitacional Lázaro Cárdenas", 122),
("Fraccionamiento Rancho la Providencia", 122),
("Fraccionamiento Residencial La Gavia", 122),
("Colonia El Alcázar", 122),
("Fraccionamiento Campestre del Virrey", 123),
("Fraccionamiento Las Viandas", 123),
("Condominio Villas Campestre de Metepec", 123),
("Condominio Arboledas II", 124),
("Fraccionamiento Los Pilares", 124),
("Colonia Pilares", 124),
("Unidad habitacional Tollocan II", 124),
("Colonia INDECO", 124),
("Condominio Arcos I y II", 124),
("Condominio Diamante", 124),
("Condominio El Ensueño", 124);


TABLA Direccion

INSERT INTO Direccion(Nombre,Calle,Colonia,Referencia,Latitud,Longitud )
VALUES ("Tupsi","Pensador Mexicano 318",184, "Esquina de casa Gris",19.267964,-99.696637);
		
INSERT INTO Direccion(Nombre,Calle,Colonia,Referencia,Latitud,Longitud )
VALUES ("Diego","Niños Heroes 3ra Cerrada",184, "Junto de edificio amarillo",19.265407,-99.697387);
		

TABLA DatosPersonales
INSERT INTO DATOSPERSONALES (Nombre,ApellidoP,Usuario,Contrasenia,Telefono,Edad,Curp)
VALUES ("Jonathan","Montalvo","Jonathan._.MP","123",7293617331,21,"MOPJ020809HMCNRNA5");

INSERT INTO DATOSPERSONALES (Nombre,ApellidoP,Usuario,Contrasenia,Telefono,Edad,Curp)
VALUES ("Diego","Garces","Dimitry","123",724998939,21,"GAMD01126HMCRRGA4");


TABLA Usuario
INSERT INTO USUARIO (Id_Usuario,Id_Datos) VALUES (22,22);

INSERT INTO USUARIO (Id_Usario,Id_Datos) VALUES (23,23);

TABLA Usuario_Direccion

INSERT INTO Usuario_Direccion (Id_Usuario, Id_Direccion) VALUES(23,2);

TABLA Empleado
INSERT INTO EMPLEADO
(Id_Estatus, Id_Datos, Id_Direccion, Id_Pipa, RFC, HorarioInicio, HorarioFin)
VALUES(1, 22, 1, 'PRUEBA', 'GAGA920408EL6', '07:00', '17:00');

INSERT INTO Usuario_Direccion (Id_Usuario, Id_Direccion) VALUES(23,2);

TABLA Pedido
INSERT INTO PEDIDO (Id_Usuario, Id_Direccion, Id_Empleado, Id_Estatus, HorarioInicio, HorarioFin, FechaP, CantidadL)
VALUES(23, 2, 2, 3, '15:30', '16:40', '21/10/23', 1500); //Cuenta con error de fecha, formato

INSERT INTO PEDIDO (Id_Usuario, Id_Direccion, Id_Empleado, Id_Estatus, HorarioInicio, HorarioFin, FechaP, CantidadL)
VALUES(23, 2, 2, 3, '15:30', '16:40', '23/10/21', 1500);