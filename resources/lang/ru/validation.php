<?php

/*
|--------------------------------------------------------------------------
| Validation Language Lines
|--------------------------------------------------------------------------
|
| The following language lines contain the default error messages used by
| the validator class. Some of these rules have multiple versions such
| as the size rules. Feel free to tweak each of these messages here.
|
*/

return [
    'accepted' => 'Вы должны принять :attribute.',
    'active_url' => 'Поле :attribute содержит недействительный URL.',
    'after' => 'В поле :attribute должна быть дата больше :date.',
    'after_or_equal' => 'В поле :attribute должна быть дата больше или равняться :date.',
    'alpha' => 'Поле :attribute может содержать только буквы.',
    'alpha_dash' => 'Поле :attribute может содержать только буквы, цифры, дефис и нижнее подчеркивание.',
    'alpha_num' => 'Поле :attribute может содержать только буквы и цифры.',
    'array' => 'Поле :attribute должно быть массивом.',
    'attached' => 'Поле :attribute уже прикреплено.',
    'before' => 'В поле :attribute должна быть дата раньше :date.',
    'before_or_equal' => 'В поле :attribute должна быть дата раньше или равняться :date.',
    'between' => [
        'array' => 'Количество элементов в поле :attribute должно быть между :min и :max.',
        'file' => 'Размер файла в поле :attribute должен быть между :min и :max Килобайт(а).',
        'numeric' => 'Поле :attribute должно быть между :min и :max.',
        'string' => 'Количество символов в поле :attribute должно быть между :min и :max.',
    ],
    'boolean' => 'Поле :attribute должно иметь значение логического типа.',
    'confirmed' => 'Поле :attribute не совпадает с подтверждением.',
    'date' => 'Поле :attribute не является датой.',
    'date_equals' => 'Поле :attribute должно быть датой равной :date.',
    'date_format' => 'Поле :attribute не соответствует формату :format.',
    'different' => 'Поля :attribute и :other должны различаться.',
    'digits' => 'Длина цифрового поля :attribute должна быть :digits.',
    'digits_between' => 'Длина цифрового поля :attribute должна быть между :min и :max.',
    'dimensions' => 'Поле :attribute имеет недопустимые размеры изображения.',
    'distinct' => 'Поле :attribute содержит повторяющееся значение.',
    'email' => 'Поле :attribute должно быть действительным электронным адресом.',
    'ends_with' => 'Поле :attribute должно заканчиваться одним из следующих значений: :values',
    'exists' => 'Выбранное значение для :attribute некорректно.',
    'file' => 'Поле :attribute должно быть файлом.',
    'filled' => 'Поле :attribute обязательно для заполнения.',
    'gt' => [
        'array' => 'Количество элементов в поле :attribute должно быть больше :value.',
        'file' => 'Размер файла в поле :attribute должен быть больше :value Килобайт(а).',
        'numeric' => 'Поле :attribute должно быть больше :value.',
        'string' => 'Количество символов в поле :attribute должно быть больше :value.',
    ],
    'gte' => [
        'array' => 'Количество элементов в поле :attribute должно быть :value или больше.',
        'file' => 'Размер файла в поле :attribute должен быть :value Килобайт(а) или больше.',
        'numeric' => 'Поле :attribute должно быть :value или больше.',
        'string' => 'Количество символов в поле :attribute должно быть :value или больше.',
    ],
    'image' => 'Поле :attribute должно быть изображением.',
    'in' => 'Выбранное значение для :attribute ошибочно.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => 'Поле :attribute должно быть целым числом.',
    'ip' => 'Поле :attribute должно быть действительным IP-адресом.',
    'ipv4' => 'Поле :attribute должно быть действительным IPv4-адресом.',
    'ipv6' => 'Поле :attribute должно быть действительным IPv6-адресом.',
    'json' => 'Поле :attribute должно быть JSON строкой.',
    'lt' => [
        'array' => 'Количество элементов в поле :attribute должно быть меньше :value.',
        'file' => 'Размер файла в поле :attribute должен быть меньше :value Килобайт(а).',
        'numeric' => 'Поле :attribute должно быть меньше :value.',
        'string' => 'Количество символов в поле :attribute должно быть меньше :value.',
    ],
    'lte' => [
        'array' => 'Количество элементов в поле :attribute должно быть :value или меньше.',
        'file' => 'Размер файла в поле :attribute должен быть :value Килобайт(а) или меньше.',
        'numeric' => 'Поле :attribute должно быть :value или меньше.',
        'string' => 'Количество символов в поле :attribute должно быть :value или меньше.',
    ],
    'max' => [
        'array' => 'Количество элементов в поле :attribute не может превышать :max.',
        'file' => 'Размер файла в поле :attribute не может быть больше :max Килобайт(а).',
        'numeric' => 'Поле :attribute не может быть больше :max.',
        'string' => 'Количество символов в поле :attribute не может превышать :max.',
    ],
    'mimes' => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
    'mimetypes' => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
    'min' => [
        'array' => 'Количество элементов в поле :attribute должно быть не меньше :min.',
        'file' => 'Размер файла в поле :attribute должен быть не меньше :min Килобайт(а).',
        'numeric' => 'Поле :attribute должно быть не меньше :min.',
        'string' => 'Количество символов в поле :attribute должно быть не меньше :min.',
    ],
    'multiple_of' => 'Значение поля :attribute должно быть кратным :value',
    'not_in' => 'Выбранное значение для :attribute ошибочно.',
    'not_regex' => 'Выбранный формат для :attribute ошибочный.',
    'numeric' => 'Поле :attribute должно быть числом.',
    'password' => 'Неверный пароль.',
    'present' => 'Поле :attribute должно присутствовать.',
    'prohibited' => 'Поле :attribute запрещено.',
    'prohibited_if' => 'Поле :attribute запрещено, когда :other равно :value.',
    'prohibited_unless' => 'Поле :attribute запрещено, если :other не входит в :values.',
    'regex' => 'Поле :attribute имеет ошибочный формат.',
    'relatable' => 'Поле :attribute не может быть связано с этим ресурсом.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_if' => 'Поле :attribute обязательно для заполнения, когда :other равно :value.',
    'required_unless' => 'Поле :attribute обязательно для заполнения, когда :other не равно :values.',
    'required_with' => 'Поле :attribute обязательно для заполнения, когда :values указано.',
    'required_with_all' => 'Поле :attribute обязательно для заполнения, когда :values указано.',
    'required_without' => 'Поле :attribute обязательно для заполнения, когда :values не указано.',
    'required_without_all' => 'Поле :attribute обязательно для заполнения, когда ни одно из :values не указано.',
    'same' => 'Значения полей :attribute и :other должны совпадать.',
    'size' => [
        'array' => 'Количество элементов в поле :attribute должно быть равным :size.',
        'file' => 'Размер файла в поле :attribute должен быть равен :size Килобайт(а).',
        'numeric' => 'Поле :attribute должно быть равным :size.',
        'string' => 'Количество символов в поле :attribute должно быть равным :size.',
    ],
    'starts_with' => 'Поле :attribute должно начинаться из одного из следующих значений: :values',
    'string' => 'Поле :attribute должно быть строкой.',
    'timezone' => 'Поле :attribute должно быть действительным часовым поясом.',
    'unique' => 'Такое значение поля :attribute уже существует.',
    'uploaded' => 'Загрузка поля :attribute не удалась.',
    'url' => 'Поле :attribute имеет ошибочный формат URL.',
    'uuid' => 'Поле :attribute должно быть корректным UUID.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'attributes' => [
        'address' => 'Адрес',
        'age' => 'Возраст',
        'available' => 'Доступно',
        'city' => 'Город',
        'content' => 'Контент',
        'country' => 'Страна',
        'current_password' => 'Текущий пароль',
        'date' => 'Дата',
        'day' => 'День',
        'description' => 'Описание',
        'email' => 'E-Mail адрес',
        'excerpt' => 'Выдержка',
        'first_name' => 'Имя',
        'gender' => 'Пол',
        'hour' => 'Час',
        'last_name' => 'Фамилия',
        'minute' => 'Минута',
        'mobile' => 'Моб. номер',
        'month' => 'Месяц',
        'name' => 'Имя',
        'password' => 'Пароль',
        'password_confirmation' => 'Подтверждение пароля',
        'phone' => 'Телефон',
        'second' => 'Секунда',
        'sex' => 'Пол',
        'size' => 'Размер',
        'time' => 'Время',
        'title' => 'Наименование',
        'username' => 'Никнейм',
        'year' => 'Год',


        'title.ru' => 'заголовок (ru)',
        'title.en' => 'заголовок (en)',
        'title.uz' => 'заголовок (uz)',
        'description.ru' => 'описание (ru)',
        'description.en' => 'описание (en)',
        'description.uz' => 'описание (uz)',
        'about_title.ru' => 'заголовок (ru)',
        'about_title.en' => 'заголовок (en)',
        'about_title.uz' => 'заголовок (uz)',
        'about_description.ru' => 'описание (ru)',
        'about_description.en' => 'описание (en)',
        'about_description.uz' => 'описание (uz)',
        'about.image' => 'изображение',
        'contacts.social_media.*.url' => 'социальные медиа',
        'position' => 'позиция',
        'image' => 'изображение',
        'list.*.ru.title' => 'заголовок (ru)',
        'list.*.en.title' => 'заголовок (en)',
        'list.*.uz.title' => 'заголовок (uz)',
        'list.*.ru.description' => 'описание (ru)',
        'list.*.en.description' => 'описание (en)',
        'list.*.uz.description' => 'описание (uz)',
        'sub_title.ru' => 'подзаголовок (ru)',
        'sub_title.en' => 'подзаголовок (en)',
        'sub_title.uz' => 'подзаголовок (uz)',
        'category.ru' => 'подкатегория (ru)',
        'category.en' => 'подкатегория (en)',
        'category.uz' => 'подкатегория (uz)',
        'main.*.main_title.ru' => 'основное заголовок (ru)',
        'main.*.main_title.en' => 'основное заголовок (en)',
        'main.*.main_title.uz' => 'основное заголовок (uz)',
        'main.*.slug.ru' => 'slug (ru)',
        'main.*.slug.en' => 'slug (en)',
        'main.*.slug.uz' => 'slug (uz)',
        'main.*.client' => 'клиент',
        'main.*.year' => 'год',
        'main.*.url' => 'url',
        'main.*.category' => 'категория',
        'main.*.main_image' => 'основное изображение',
        'content.*.type' => 'тип контент',
        'content.*.title.ru' => 'заголовок (ru)',
        'content.*.title.en' => 'заголовок (en)',
        'content.*.title.uz' => 'заголовок (uz)',
        'content.*.description.ru' => 'описание (ru)',
        'content.*.description.en' => 'описание (en)',
        'content.*.description.uz' => 'описание (uz)',
        'content.*.position' => 'позиция',
        'content.*.image' => 'изображение',
        'main.*.image_title.ru' => 'заголовок изображения (ru)',
        'main.*.image_title.en' => 'заголовок изображения (en)',
        'main.*.image_title.uz' => 'заголовок изображения (uz)',
        'main.*.image' => 'изображение',
        'main.*.about_title.ru' => 'заголовок (ru)',
        'main.*.about_title.en' => 'заголовок (en)',
        'main.*.about_title.uz' => 'заголовок (uz)',
        'main.*.about_description.ru' => 'описание (ru)',
        'main.*.about_description.en' => 'описание (en)',
        'main.*.about_description.uz' => 'описание (uz)',
        'main.*.help_title.ru' => 'заголовок справки (ru)',
        'main.*.help_title.en' => 'заголовок справки (en)',
        'main.*.help_title.uz' => 'заголовок справки (uz)',
        'main.*.help_description.ru' => 'справка описание (ru)',
        'main.*.help_description.en' => 'справка описание (en)',
        'main.*.help_description.uz' => 'справка описание (uz)',
        'list.*.title.ru' => 'заголовок списка (ru)',
        'list.*.title.en' => 'заголовок списка (en)',
        'list.*.title.uz' => 'заголовок списка (uz)',
        'list.*.list.ru.*' => 'элемент списка (ru)',
        'list.*.list.en.*' => 'элемент списка (en)',
        'list.*.list.uz.*' => 'элемент списка (uz)',
        'customer.name' => 'название клиента',
        'customer.position' => 'позиция клиента',
        'customer.logo' => 'логотип клиента',
        'contacts.phone.*' => 'номер телефона',
        'contacts.email.*' => 'электронная почта',
        'contacts.address' => 'адрес',
        'contacts.address.ru' => 'адрес (ru)',
        'contacts.address.en' => 'адрес (en)',
        'contacts.address.uz' => 'адрес (uz)',
        'contacts.google_map' => 'google map',
        'social_media.*.url' => 'URL-адрес социальной сети'
    ],
];
