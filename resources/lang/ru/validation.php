<?php

return [
    'accepted' => 'Вы должны принять :attribute.',
    'active_url' => 'Данное поле содержит недопустимый URL.',
    'after' => 'Данное поле должно содержать дату после :date.',
    'after_or_equal' => 'Данное поле должно содержать дату после или равную :date.',
    'alpha' => 'Данное поле может содержать только буквы.',
    'alpha_dash' => 'Данное поле может содержать только буквы, цифры и дефис.',
    'alpha_num' => 'Данное поле может содержать только буквы и цифры.',
    'array' => 'Данное поле должно быть массивом.',
    'before' => 'Данное поле должно содержать дату до :date.',
    'before_or_equal' => 'Данное поле должно содержать дату до или равную :date.',
    'between' => [
        'numeric' => 'Данное поле должно быть между :min и :max.',
        'file' => 'Размер файла в данном поле должен быть между :min и :max Килобайт(а).',
        'string' => 'Количество символов в данном поле должно быть между :min и :max.',
        'array' => 'Количество элементов в данном поле должно быть между :min и :max.',
    ],
    'boolean' => 'Данное поле должно иметь значение true или false.',
    'confirmed' => 'Данное поле не совпадает с подтверждением.',
    'date' => 'Данное поле не является датой.',
    'date_equals' => 'Данное поле должно быть датой, равной :date.',
    'date_format' => 'Данное поле не соответствует формату :format.',
    'different' => 'Данное поле и :other должны различаться.',
    'digits' => 'Длина цифрового поля должна быть :digits.',
    'digits_between' => 'Длина цифрового поля должна быть между :min и :max.',
    'dimensions' => 'Данное поле имеет недопустимые размеры изображения.',
    'distinct' => 'Данное поле имеет повторяющееся значение.',
    'email' => 'Данное поле должно быть действительным адресом электронной почты.',
    'ends_with' => 'Данное поле должно заканчиваться одним из следующих значений: :values.',
    'exists' => 'Выбранное значение для данного поле недействительно.',
    'file' => 'Данное поле должно быть файлом.',
    'filled' => 'Данное поле должно иметь значение.',
    'gt' => [
        'numeric' => 'Данное поле должно быть больше чем :value.',
        'file' => 'Размер файла в данном поле должен быть больше :value Килобайт(а).',
        'string' => 'Количество символов в данном поле должно быть больше :value.',
        'array' => 'Количество элементов в данном поле должно быть больше :value.',
    ],
    'gte' => [
        'numeric' => 'Данное поле должно быть больше или равно :value.',
        'file' => 'Размер файла в данном поле должен быть больше или равен :value Килобайт(а).',
        'string' => 'Количество символов в данном поле должно быть больше или равно :value.',
        'array' => 'Количество элементов в данном поле должно быть больше или равно :value.',
    ],
    'image' => 'Данное поле должно быть изображением.',
    'in' => 'Выбранное значение для данногго поля недействительно.',
    'in_array' => 'Данное поле не существует в :other.',
    'integer' => 'Данное поле должно быть целым числом.',
    'ip' => 'Данное поле должно быть действительным IP-адресом.',
    'ipv4' => 'Данное поле должно быть действительным IPv4-адресом.',
    'ipv6' => 'Данное поле должно быть действительным IPv6-адресом.',
    'json' => 'Данное поле должно быть JSON строкой.',
    'lt' => [
        'numeric' => 'Данное поле должно быть меньше чем :value.',
        'file' => 'Размер файла в данном поле должен быть меньше :value Килобайт(а).',
        'string' => 'Количество символов в данном поле должно быть меньше :value.',
        'array' => 'Количество элементов в данном поле должно быть меньше :value.',
    ],
    'lte' => [
        'numeric' => 'Данное полеы должно быть меньше или равно :value.',
        'file' => 'Размер файла в данном поле должен быть меньше или равен :value Килобайт(а).',
        'string' => 'Количество символов в данном поле должно быть меньше или равно :value.',
        'array' => 'Количество элементов в данном поле должно быть меньше или равно :value.',
    ],
    'max' => [
        'numeric' => 'Колличество символов в поле заполнения не может быть больше :max.',
        'file' => 'Размер файла в поле заполнения не может быть больше :max Килобайт(а).',
        'string' => 'Количество символов в поле заполнения не может превышать :max.',
        'array' => 'Количество элементов в поле заполнения не может превышать :max.',
    ],
    'mimes' => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
    'mimetypes' => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
    'min' => [
        'numeric' => 'Колличество символов в поле заполнения должно быть не менее :min.',
        'file' => 'Размер файла в поле заполнения  должен быть не менее :min Килобайт(а).',
        'string' => 'Количество символов в поле заполнения должно быть не менее :min.',
        'array' => 'Количество элементов в поле заполнения должно быть не менее :min.',
    ],
    'multiple_of' => 'Данное поле должно быть кратным :value.',
    'not_in' => 'Выбранное значение для :attribute недействительно.',
    'not_regex' => 'Данное поле имеет недопустимый формат.',
    'numeric' => 'Данное поле должно быть числом.',
    'password' => 'Неправильный пароль.',
    'present' => 'Данное поле должно быть заполнено.',
    'regex' => 'Данное поле имеет недопустимый формат.',
    'required' => 'Данное поле обязательно для заполнения.',
    'required_if' => 'Данное поле обязательно, если :other равно :value.',
    'required_unless' => 'Данное поле обязательно, если :other не равно :values.',
    'required_with' => 'Данное поле обязательно, если :values указано.',
    'required_with_all' => 'Данное поле обязательно, если :values указано.',
    'required_without' => 'Данное поле обязательно, если :values не указано.',
    'required_without_all' => 'Данное поле обязательно, если ни одно из :values не указано.',
    'same' => 'Поля :attribute и :other должны совпадать.',
    'size' => [
        'numeric' => 'Данное поле должно быть :size.',
        'file' => 'Размер файла в поле :attribute должен быть :size Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть :size.',
        'array' => 'Количество элементов в поле :attribute должно быть :size.',
    ],
    'starts_with' => 'Данное поле должно начинаться с одного из следующих значений: :values.',
    'string' => 'Данное поле должно быть строкой.',
    'timezone' => 'Данное поле должно быть действительным часовым поясом.',
    'unique' => 'Такое значение поля :attribute уже существует.',
    'uploaded' => 'Ошибка загрузки файла :attribute.',
    'url' => 'Данное поле имеет недопустимый формат.',
    'uuid' => 'Данное поле должно быть действительным UUID.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'attributes' => [
        'name' => 'Имя',
        'email' => 'Электронная почта',
        // Добавьте остальные переводы имен атрибутов
    ],
];

