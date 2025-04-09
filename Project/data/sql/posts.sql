INSERT INTO
    user (
        username,
        email,
        user_password,
        full_name,
        avatar_url,
        bio,
        user_role
    )
VALUES
    (
        'elonmusk',
        'elon@tesla.com',
        'elonmusk',
        'Илон Маск',
        'images/elon.jpg',
        'Предприниматель, инженер, изобретатель. Основатель SpaceX, Tesla, Neuralink и The Boring Company.',
        'user'
    );

INSERT INTO
    post (
        title, 
        image_url, 
        content, 
        created_by
    )
VALUES
    (
        'Успешный запуск Starship! Новый этап в освоении космоса',
        'images/starship.jpg',
        'Сегодня мы совершили исторический запуск Starship - самой мощной ракеты в истории человечества. 
        
        Основные достижения этого запуска:
        - Первый полностью успешный полет системы Starship/Super Heavy
        - Достигнута орбитальная скорость
        - Успешное разделение ступеней
        - Демонстрация возможности многоразового использования
        
        Это огромный шаг на пути к нашей главной цели - сделать человечество межпланетным видом. 
        Следующая цель - тестовый полет с посадкой на Марс в 2026 году.
        
        Благодарю всю команду SpaceX за невероятную работу! 
        Будущее наступает быстрее, чем кажется.
        
        #MarsOrBust #SpaceX #Starship',
        1
    );

INSERT INTO
    user (
        username,
        email,
        user_password,
        full_name,
        avatar_url,
        bio,
        user_role
    )
VALUES
    (
        'vanyadenisov',
        'vanyadenisov@gmail.com',
        'qwerty123',
        'Ваня Денисов',
        'images/avatar.png',
        'Привет! Я системный аналитик в ACME :) Тут моя жизнь только для самых классных!',
        'user'
    );

INSERT INTO
    post ( 
        image_url, 
        content, 
        created_by
    )
VALUES
    (
        'images/post_photo.png', 
        'Так красиво сегодня на улице! Настоящая зима)) Вспоминается Бродский: «Поздно ночью, в уснувшей долине, на самом дне, в гор...»',
        2
    );