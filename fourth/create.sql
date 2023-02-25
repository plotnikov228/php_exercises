CREATE TABLE Спортсмены (
id INT NOT NULL IDENTITY(1,1),
ФИО nvarchar(255) NOT NULL,
[e-mail] nvarchar(200) NOT NULL,
телефон INT NOT NULL,
[дата рождения] DATE NOT NULL,
возраст INT NOT NULL,
[номер паспорта] INT NOT NULL,
[среднее место на соревнованиях] INT NOT NULL,
биография text NOT NULL,
видеопризентация nvarchar(1000) NOT NULL,
);