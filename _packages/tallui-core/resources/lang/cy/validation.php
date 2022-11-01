<?php

declare(strict_types=1);

return [
    'accepted' => 'Rhaid derbyn :attribute.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'Nid yw :attribute yn URL dilys.',
    'after' => 'Rhaid i :attribute fod yn ddyddiad sydd ar ôl :date.',
    'after_or_equal' => 'Y :attribute rhaid iddo fod yn ddyddiad ar ôl neu yn hafal i :date.',
    'alpha' => 'Dim ond llythrennau\'n unig gall :attribute gynnwys.',
    'alpha_dash' => 'Dim ond llythrennau, rhifau a dash yn unig gall :attribute gynnwys.',
    'alpha_num' => 'Dim ond llythrennau a rhifau yn unig gall :attribute gynnwys.',
    'array' => 'Rhaid i :attribute fod yn array.',
    'before' => 'Rhaid i :attribute fod yn ddyddiad sydd cyn :date.',
    'before_or_equal' => 'Y :attribute rhaid iddo fod yn ddyddiad cyn neu yn hafal i :date.',
    'between' => [
        'array' => 'Rhaid i :attribute fod rhwng :min a :max eitem.',
        'file' => 'Rhaid i :attribute fod rhwng :min a :max kilobytes.',
        'numeric' => 'Rhaid i :attribute fod rhwng :min a :max.',
        'string' => 'Rhaid i :attribute fod rhwng :min a :max nodyn.',
    ],
    'boolean' => 'Rhaid i\'r maes :attribute fod yn wir neu gau.',
    'confirmed' => 'Nid yw\'r cadarnhad :attribute yn gyfwerth.',
    'current_password' => 'The password is incorrect.',
    'date' => 'Nid yw :attribute yn ddyddiad dilys.',
    'date_equals' => 'Y :attribute rhaid dyddiad cyfartal i :date.',
    'date_format' => 'Nid yw :attribute yn y fformat :format.',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => 'Rhaid i :attribute a :other fod yn wahanol.',
    'digits' => 'Rhaid i :attribute fod yn :digits digid.',
    'digits_between' => 'Rhaid i :attribute fod rhwng :min a :max digid.',
    'dimensions' => 'Y :attribute wedi annilys ddelwedd dimensiynau.',
    'distinct' => 'Y :attribute maes wedi dyblyg gwerth.',
    'doesnt_end_with' => 'The :attribute may not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attribute may not start with one of the following: :values.',
    'email' => 'Rhaid i :attribute fod yn gyfeiriad ebost dilys.',
    'ends_with' => 'Y :attribute rhaid i ben gydag un o\'r canlynol: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'Nid yw :attribute yn ddilys.',
    'file' => ':Attribute rhaid iddo fod yn y ffeil.',
    'filled' => 'Rhaid cynnwys :attribute.',
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
    'image' => 'Rhaid i :attribute fod yn lun.',
    'in' => 'Nid yw :attribute yn ddilys.',
    'in_array' => 'Y :attribute maes nad yw\'n bodoli yn :other.',
    'integer' => 'Rhaid i :attribute fod yn integer.',
    'ip' => 'Rhaid i :attribute fod yn gyfeiriad IP dilys.',
    'ipv4' => 'Y :attribute rhaid iddo fod yn ddilys ar IPv4 cyfeiriad.',
    'ipv6' => 'Y :attribute rhaid iddo fod yn ddilys cyfeiriad IPv6.',
    'json' => 'Y :attribute rhaid iddo fod yn ddilys JSON llinyn.',
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
        'array' => 'Ni chai :attribute fod yn fwy na :max eitem.',
        'file' => 'Ni chai :attribute fod yn fwy na :max kilobytes.',
        'numeric' => 'Ni chai :attribute fod yn fwy na :max.',
        'string' => 'Ni chai :attribute fod yn fwy na :max nodyn.',
    ],
    'max_digits' => 'The :attribute must not have more than :max digits.',
    'mimes' => 'Rhaid i :attribute fod yn ffeil o\'r math: :values.',
    'mimetypes' => 'Rhaid i :attribute fod yn ffeil o\'r math: :values.',
    'min' => [
        'array' => 'Rhaid i :attribute fod o leiaf :min eitem.',
        'file' => 'Rhaid i :attribute fod o leiaf :min kilobytes.',
        'numeric' => 'Rhaid i :attribute fod o leiaf :min.',
        'string' => 'Rhaid i :attribute fod o leiaf :min nodyn.',
    ],
    'min_digits' => 'The :attribute must have at least :min digits.',
    'multiple_of' => 'Y :attribute rhaid iddo fod yn lluosrif o :value',
    'not_in' => 'Nid yw :attribute yn ddilys.',
    'not_regex' => 'Y :attribute fformat annilys.',
    'numeric' => 'Rhaid i :attribute fod yn rif.',
    'password' => [
        'letters' => 'The :attribute must contain at least one letter.',
        'mixed' => 'The :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute must contain at least one number.',
        'symbols' => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'Y :attribute maes rhaid i fod yn bresennol.',
    'prohibited' => 'Y :attribute maes yn cael ei wahardd.',
    'prohibited_if' => 'Y :attribute maes yn cael ei wahardd pan :other yn :value.',
    'prohibited_unless' => 'Y :attribute maes yn cael ei wahardd oni bai :other yn :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'Nid yw fformat :attribute yn ddilys.',
    'required' => 'Rhaid cynnwys :attribute.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'Rhaid cynnwys :attribute pan mae :other yn :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => 'Y :attribute maes yn ofynnol oni bai bod :other yn :values.',
    'required_with' => 'Rhaid cynnwys :attribute pan mae :values yn bresennol.',
    'required_with_all' => 'Rhaid cynnwys :attribute pan mae :values yn bresennol.',
    'required_without' => 'Rhaid cynnwys :attribute pan nad oes :values yn bresennol.',
    'required_without_all' => 'Rhaid cynnwys :attribute pan nad oes :values yn bresennol.',
    'same' => 'Rhaid i :attribute a :other fod yn gyfwerth.',
    'size' => [
        'array' => 'Rhaid i :attribute fod yn :size eitem.',
        'file' => 'Rhaid i :attribute fod yn :size kilobytes.',
        'numeric' => 'Rhaid i :attribute fod yn :size.',
        'string' => 'Rhaid i :attribute fod yn :size nodyn.',
    ],
    'starts_with' => 'Y :attribute rhaid dechrau gydag un o\'r canlynol: :values.',
    'string' => 'Y :attribute rhaid iddo fod yn llinyn.',
    'timezone' => 'Rhaid i :attribute fod yn timezone dilys.',
    'unique' => 'Mae :attribute eisoes yn bodoli.',
    'uploaded' => 'Y :attribute wedi methu â llwytho i fyny.',
    'url' => 'Nid yw fformat :attribute yn ddilys.',
    'uuid' => 'Y :attribute rhaid iddo fod yn ddilys UUID.',
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
