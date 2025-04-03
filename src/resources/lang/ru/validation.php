<?php
return [
    'required' => ':attribute обязателен для заполнения!',
    'email' => ':attribute должен быть валидным адрессом!',
    'unique' => 'Такой :attribute уже существует!',
    'before' => ':attribute должен быть меньше сегодня!',
    'attributes' => [
        'email' => 'E-mail',
        'birthday' => 'Дата рождения',
        'name'=> 'Имя',
        'password' => 'Пароль',
        'sex' => 'Пол'
    ],
];
