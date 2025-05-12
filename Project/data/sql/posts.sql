INSERT INTO
    user (
        name,
        avatar,
        description,
        posts
    )
VALUES
    (
        'Илон Маск',
        'elon_musk.jpg',
        'Предприниматель, инженер, изобретатель. Основатель SpaceX, Tesla, Neuralink и The Boring Company.',
        1
    );

INSERT INTO
    post ( 
        image, 
        content, 
        created_by_user_id,
        likes
    )
VALUES
    (
        'Успешный запуск Starship! Новый этап в освоении космоса',
        'starship.jpg',
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
        1,
        2016
    );

INSERT INTO
    user (
        name,
        avatar,
        description,
        posts
    )
VALUES
    (
        'vanyadenisov',
        'vanyadenisov@gmail.com',
        'qwerty123',
        'Ваня Денисов',
        'avatar.png',
        'Привет! Я системный аналитик в ACME :) Тут моя жизнь только для самых классных!',
        'user'
    );

INSERT INTO post (
    image_url,
    content,
    created_by_user_id,
    likes
) VALUES (
    'Красота зимнего дня', 
    'post_photo.png',
    'Так красиво сегодня на улице! Настоящая зима)) Вспоминается Бродский: «Поздно ночью, в уснувшей долине, на самом дне, в гор...»',
    2,
    204
);