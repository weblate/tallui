<?php

declare(strict_types=1);

return [
    'accepted' => 'Вы павінны прыняць :attribute.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'Поле :attribute утрымлівае несапраўдны URL.',
    'after' => 'У полі :attribute павінна быць дата пасля :date.',
    'after_or_equal' => ':Attribute павінна быць датай пасля або роўнай :date.',
    'alpha' => 'Поле :attribute можа мець толькі літары.',
    'alpha_dash' => 'Поле :attribute можа мець толькі літары, лічбы і злучок.',
    'alpha_num' => 'Поле :attribute можа мець толькі літары і лічбы.',
    'array' => 'Поле :attribute павінна быць масівам.',
    'before' => 'У полі :attribute павінна быць дата да :date.',
    'before_or_equal' => ':Attribute павінна быць датай да або роўнай :date.',
    'between' => [
        'array' => 'Колькасць элементаў у поле :attribute павінна быць паміж :min і :max.',
        'file' => 'Памер файла ў поле :attribute павінен быць паміж :min і :max кілабайт.',
        'numeric' => 'Поле :attribute павінна быць паміж :min і :max.',
        'string' => 'Колькасць сiмвалаў у поле :attribute павінна быць паміж :min і :max.',
    ],
    'boolean' => 'Поле :attribute павінна мець значэнне лагічнага тыпу.',
    'confirmed' => 'Поле :attribute не супадае з пацвярджэннем.',
    'current_password' => 'The password is incorrect.',
    'date' => 'Поле :attribute не з\'яўляецца датай.',
    'date_equals' => ':Attribute павінна быць датай, роўнай :date.',
    'date_format' => 'Поле :attribute не адпавядае фармату :format.',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => 'Палі :attribute і :other павінны адрознівацца.',
    'digits' => 'Даўжыня лічбавага поля :attribute павінна быць :digits.',
    'digits_between' => 'Даўжыня лічбавага поля :attribute павінна быць паміж :min і :max.',
    'dimensions' => ':Attribute мае недапушчальныя памеры малюнка.',
    'distinct' => 'Поле :attribute мае паўтаральнае значэнне.',
    'doesnt_end_with' => 'The :attribute may not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attribute may not start with one of the following: :values.',
    'email' => 'Поле :attribute павінна быць сапраўдным электронным адрасам.',
    'ends_with' => ':Attribute павінен заканчвацца адным з наступных: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'Выбранае значэнне для :attribute некарэктна.',
    'file' => ':Attribute павінен быць файлам.',
    'filled' => 'Поле :attribute абавязкова для запаўнення.',
    'gt' => [
        'array' => 'The :attribute must have more than :value items.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'numeric' => 'The :attribute must be greater than :value.',
        'string' => 'The :attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The :attribute must have :value items or more.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
    ],
    'image' => 'Поле :attribute павінна быць малюнкам.',
    'in' => 'Выбранае значэнне для :attribute памылкова.',
    'in_array' => 'Поле :attribute не існуе ў :other.',
    'integer' => 'Поле :attribute павінна быць цэлым лікам.',
    'ip' => 'Поле :attribute дпавінна быць сапраўдным IP-адрасам.',
    'ipv4' => ':Attribute павінен быць сапраўдным IPv4-адрасам.',
    'ipv6' => ':Attribute павінен быць сапраўдным IPv6-адрасам.',
    'json' => 'Поле :attribute павінна быць JSON радком.',
    'lt' => [
        'array' => 'The :attribute must have less than :value items.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'numeric' => 'The :attribute must be less than :value.',
        'string' => 'The :attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute must not have more than :value items.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'numeric' => 'The :attribute must be less than or equal :value.',
        'string' => 'The :attribute must be less than or equal :value characters.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'array' => 'Колькасць элементаў у поле :attribute не можа перавышаць :max.',
        'file' => 'Памер файла ў поле :attribute не можа быць больш :max кілабайт).',
        'numeric' => 'Поле :attribute не можа быць больш :max.',
        'string' => 'Колькасць сiмвалаў у поле :attribute не можа перавышаць :max.',
    ],
    'max_digits' => 'The :attribute must not have more than :max digits.',
    'mimes' => 'Поле :attribute павінна быць файлам аднаго з наступных тыпаў: :values.',
    'mimetypes' => 'Поле :attribute павінна быць файлам аднаго з наступных тыпаў: :values.',
    'min' => [
        'array' => 'Колькасць элементаў у поле :attribute павінна быць не менш :min.',
        'file' => 'Памер файла ў полее :attribute павінен быць не менш :min кілабайт.',
        'numeric' => 'Поле :attribute павінна быць не менш :min.',
        'string' => 'Колькасць сiмвалаў у поле :attribute павінна быць не менш :min.',
    ],
    'min_digits' => 'The :attribute must have at least :min digits.',
    'multiple_of' => 'Лік :attribute павінна быць Кратна :value',
    'not_in' => 'Выбранае значэнне для :attribute памылкова.',
    'not_regex' => 'Фармат :attribute недапушчальны.',
    'numeric' => 'Поле :attribute павінна быць лікам.',
    'password' => [
        'letters' => 'The :attribute must contain at least one letter.',
        'mixed' => 'The :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute must contain at least one number.',
        'symbols' => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'Поле :attribute павінна прысутнічаць.',
    'prohibited' => 'Поле :attribute забаронена.',
    'prohibited_if' => 'Поле :attribute забаронена, калі :other роўна :value.',
    'prohibited_unless' => 'Поле :attribute забаронена, калі толькі :other не знаходзіцца ў :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'Поле :attribute мае памылковы фармат.',
    'required' => 'Поле :attribute абавязкова для запаўнення.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'Поле :attribute абавязкова для запаўнення, калі :other раўняецца :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => 'Поле :attribute абавязкова для запаўнення, калі :other не раўняецца :values.',
    'required_with' => 'Поле :attribute абавязкова для запаўнення, калі :values ўказана.',
    'required_with_all' => 'Поле :attribute абавязкова для запаўнення, калі :values ўказана.',
    'required_without' => 'Поле :attribute абавязкова для запаўнення, калі :values не ўказана.',
    'required_without_all' => 'Поле :attribute абавязкова для запаўнення, калі ні адно з :values не ўказана.',
    'same' => 'Значэнне :attribute павінна супадаць з :other.',
    'size' => [
        'array' => 'Колькасць элементаў у поле :attribute павінна быць :size.',
        'file' => 'Размер файла в поле :attribute павінен быць :size кілабайт.',
        'numeric' => 'Поле :attribute павінна быць :size.',
        'string' => 'Колькасць сiмвалаў у поле :attribute павінна быць :size.',
    ],
    'starts_with' => ':Attribute павінен пачынацца з аднаго з наступных значэнняў: :values.',
    'string' => 'Поле :attribute павінна быць радком.',
    'timezone' => 'Поле :attribute павінна быць сапраўдным гадзінным поясам.',
    'unique' => 'Такое значэнне поля :attribute ўжо існуе.',
    'uploaded' => ':Attribute не ўдалося загрузіць.',
    'url' => 'Поле :attribute мае памылковы фармат.',
    'uuid' => ':Attribute павінен быць сапраўдным UUID.',
    'attributes' => [
        'address' => 'address',
        'age' => 'age',
        'amount' => 'amount',
        'area' => 'area',
        'available' => 'available',
        'birthday' => 'birthday',
        'body' => 'body',
        'city' => 'city',
        'content' => 'content',
        'country' => 'country',
        'created_at' => 'created at',
        'creator' => 'creator',
        'current_password' => 'current password',
        'date' => 'date',
        'date_of_birth' => 'date of birth',
        'day' => 'day',
        'deleted_at' => 'deleted at',
        'description' => 'description',
        'district' => 'district',
        'duration' => 'duration',
        'email' => 'email',
        'excerpt' => 'excerpt',
        'filter' => 'filter',
        'first_name' => 'first name',
        'gender' => 'gender',
        'group' => 'group',
        'hour' => 'hour',
        'image' => 'image',
        'last_name' => 'last name',
        'lesson' => 'lesson',
        'line_address_1' => 'line address 1',
        'line_address_2' => 'line address 2',
        'message' => 'message',
        'middle_name' => 'middle name',
        'minute' => 'minute',
        'mobile' => 'mobile',
        'month' => 'month',
        'name' => 'name',
        'national_code' => 'national code',
        'number' => 'number',
        'password' => 'password',
        'password_confirmation' => 'password confirmation',
        'phone' => 'phone',
        'photo' => 'photo',
        'postal_code' => 'postal code',
        'price' => 'price',
        'province' => 'province',
        'recaptcha_response_field' => 'recaptcha response field',
        'remember' => 'remember',
        'restored_at' => 'restored at',
        'result_text_under_image' => 'result text under image',
        'role' => 'role',
        'second' => 'second',
        'sex' => 'sex',
        'short_text' => 'short text',
        'size' => 'size',
        'state' => 'state',
        'street' => 'street',
        'student' => 'student',
        'subject' => 'subject',
        'teacher' => 'teacher',
        'terms' => 'terms',
        'test_description' => 'test description',
        'test_locale' => 'test locale',
        'test_name' => 'test name',
        'text' => 'text',
        'time' => 'time',
        'title' => 'title',
        'updated_at' => 'updated at',
        'username' => 'username',
        'year' => 'year',
    ],
];
