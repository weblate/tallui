<?php

declare(strict_types=1);

return [
    'accepted' => ':Attribute સ્વીકૃત હોવું જોઈએ.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => ':Attribute માન્ય URL નથી.',
    'after' => ':Attribute પછી તારીખ હોવી જોઈએ :તારીખ.',
    'after_or_equal' => ':Attribute પછી તારીખ કે સમાંતર હોવું જોઈએ :તારીખ.',
    'alpha' => ':Attribute માત્ર અક્ષરોનો જ સમાવેશ કરી શકે.',
    'alpha_dash' => ':Attribute માત્ર અક્ષરો, આંકડાઓ, ડેશ અને ની નીચે લીટીનો જ સમાવેશ કરી શકે.',
    'alpha_num' => ':Attribute માત્ર અક્ષરો તથા આંકડાઓનો જ સમાવેશ કરી શકે.',
    'array' => ':Attribute ગોઠવણીમાં હોવું જોઈએ.',
    'before' => ':Attribute પહેલાં તારીખ હોવી જોઈએ :તારીખ.',
    'before_or_equal' => ':Attribute પહેલાં તારીખ કે સમાંતર હોવું જોઈએ :તારીખ.',
    'between' => [
        'array' => ':Attribute ની વચ્ચે હોવું જોઈએ :min અને :max વસ્તુઓ.',
        'file' => ':Attribute ની વચ્ચે હોવું જોઈએ :min અને :max કિલોબાઇટ્સ.',
        'numeric' => ':Attribute ની વચ્ચે હોવું જોઈએ :min અને :max.',
        'string' => ':Attribute ની વચ્ચે હોવું જોઈએ :min અને :max અક્ષરો.',
    ],
    'boolean' => ':Attribute પ્રવૃત્તિ ક્ષેત્ર ખરું કે ખોટું હોવું જોઈએ.',
    'confirmed' => ':Attribute પુષ્ટિકરણ બંધબેસતું નથી.',
    'current_password' => 'The password is incorrect.',
    'date' => ':Attribute માન્ય તારીખ નથી.',
    'date_equals' => ':Attribute સમાંતર તારીખ હોવી જોઈએ :તારીખ.',
    'date_format' => ':Attribute ગોઠવણ સાથે બંધબેસતું નથી :ગોઠવણ.',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => ':Attribute અને :other અલગ હોવું જોઈએ.',
    'digits' => ':Attribute હોવું જોઈએ  :digits અંક.',
    'digits_between' => ':Attribute વચ્ચે હોવું જોઈએ :min અને :max અંક.',
    'dimensions' => ':Attribute છબીનું પરિમાણ અમાન્ય છે.',
    'distinct' => ':Attribute પ્રવૃત્તિ ક્ષેત્રનું નકલી મૂલ્ય છે.',
    'doesnt_end_with' => 'The :attribute may not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attribute may not start with one of the following: :values.',
    'email' => ':Attribute માન્ય ઈમેઈલ એડ્રેસ હોવું જોઈએ.',
    'ends_with' => ':Attribute નીચેમાંથી એક પ્રમાણે પૂરું થતું હોવું જોઈએ :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'પસંદ કરાયેલ :attribute અમાન્ય છે.',
    'file' => ':Attribute એક ફાઈલ હોવી જોઈએ.',
    'filled' => ':Attribute પ્રવૃત્તિ ક્ષેત્રનું મૂલ્ય હોવું જોઈએ.',
    'gt' => [
        'array' => ':Attribute ના કરતાં વિશેષ :value વસ્તુઓ.',
        'file' => ':Attribute થી વિશેષ હોવું જોઈએ :value કિલો બાઇટ્સ.',
        'numeric' => ':Attribute થી વિશેષ હોવું જોઈએ :value.',
        'string' => ':Attribute થી વિશેષ હોવું જોઈએ :value મૂલ્ય અક્ષરો.',
    ],
    'gte' => [
        'array' => ':Attribute હોવું જોઈએ :value વસ્તુઓ કે વિશેષ.',
        'file' => ':Attribute થી વિશેષ અથવા સમાંતર હોવું જોઈએ :value કિલો બાઇટ્સ.',
        'numeric' => ':Attribute થી વિશેષ અથવા સમાંતર હોવું જોઈએ :value.',
        'string' => ':Attribute થી વિશેષ અથવા સમાંતર હોવું જોઈએ :value મૂલ્ય અક્ષરો.',
    ],
    'image' => ':Attribute છબી હોવી જોઈએ.',
    'in' => ':Attribute અમાન્ય છે.',
    'in_array' => ':Attribute માં પ્રવૃત્તિ ક્ષેત્ર અસ્તિત્વ ધરાવતું નથી :other.',
    'integer' => ':Attribute પૂર્ણ સંખ્યા હોવી જોઈએ.',
    'ip' => ':Attribute માન્ય IP address હોવું જોઈએ.',
    'ipv4' => ':Attribute માન્ય IPv4 address હોવું જોઈએ.',
    'ipv6' => ':Attribute માન્ય IPv6 address હોવું જોઈએ.',
    'json' => ':Attribute માન્ય JSON શબ્દમાળા હોવી જોઈએ.',
    'lt' => [
        'array' => ':Attribute ઓછું હોવું જોઈએ :value વસ્તુઓ.',
        'file' => ':Attribute ઓછું હોવું જોઈએ :value કિલો બાઇટ્સ.',
        'numeric' => ':Attribute ઓછું હોવું જોઈએ :value.',
        'string' => ':Attribute ઓછું હોવું જોઈએ :value અક્ષરો.',
    ],
    'lte' => [
        'array' => ':Attribute ના કરતા વધુ ન હોવું જોઈએ :value વસ્તુઓ.',
        'file' => ':Attribute ઓછું કે સમાંતર હોવું જોઈએ :value કિલો બાઇટ્સ.',
        'numeric' => ':Attribute ઓછું કે સમાંતર હોવું જોઈએ :value.',
        'string' => ':Attribute ઓછું કે સમાંતર હોવું જોઈએ :value અક્ષરો.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'array' => ':Attribute ના કરતાં વધુ ન હોઈ શકે :max વસ્તુઓ.',
        'file' => ':Attribute મોટું ન હોઈ શકે :max કિલો બાઇટ્સ.',
        'numeric' => ':Attribute મોટું ન હોઈ શકે :max.',
        'string' => ':Attribute મોટું ન હોઈ શકે :max અક્ષરો.',
    ],
    'max_digits' => 'The :attribute must not have more than :max digits.',
    'mimes' => ':Attribute પ્રકારની ફાઈલ હોવી જોઈએ :values.',
    'mimetypes' => ':Attribute પ્રકારની ફાઈલ હોવી જોઈએ :values.',
    'min' => [
        'array' => ':Attribute  હોવું જ જોઈએ :min વસ્તુઓ.',
        'file' => ':Attribute ઓછામાં ઓછું હોવું જોઈએ :min કિલો બાઇટ્સ.',
        'numeric' => ':Attribute ઓછામાં ઓછું હોવું જોઈએ :min.',
        'string' => ':Attribute ઓછામાં ઓછું હોવું જોઈએ :min અક્ષરો.',
    ],
    'min_digits' => 'The :attribute must have at least :min digits.',
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'પસંદ કરાયેલ :attribute અમાન્ય છે.',
    'not_regex' => ':Attribute અમાન્ય ગોઠવણ છે.',
    'numeric' => ':Attribute આંક હોવો જોઈએ.',
    'password' => [
        'letters' => 'The :attribute must contain at least one letter.',
        'mixed' => 'The :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute must contain at least one number.',
        'symbols' => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => ':Attribute પ્રવૃત્તિ ક્ષેત્ર હાજર હોવું જોઈએ.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => ':Attribute અમાન્ય ગોઠવણ છે.',
    'required' => ':Attribute પ્રવૃત્તિ ક્ષેત્ર આવશ્યક છે.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => ':Attribute પ્રવૃત્તિ ક્ષેત્ર આવશ્યક છે જ્યારે :other છે :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => ':Attribute પ્રવૃત્તિ ક્ષેત્ર આવશ્યક છે સિવાય :other માં છે :values.',
    'required_with' => ':Attribute પ્રવૃત્તિ ક્ષેત્ર આવશ્યક છે જ્યારે :values હાજર હોય.',
    'required_with_all' => ':Attribute પ્રવૃત્તિ ક્ષેત્ર આવશ્યક છે જ્યારે :values હાજર હોય.',
    'required_without' => ':Attribute પ્રવૃત્તિ ક્ષેત્ર આવશ્યક છે જ્યારે :values હાજર ન હોય.',
    'required_without_all' => ':Attribute પ્રવૃત્તિ ક્ષેત્ર આવશ્યક છે જ્યારે કશું પણ :values હાજર હોય.',
    'same' => ':Attribute અને :other બંધબેસતું હોવું જોઈએ.',
    'size' => [
        'array' => ':Attribute સમાવેશ કરતું હોવું જોઈએ : કદ વસ્તુઓ.',
        'file' => ':Attribute હોવું જોઈએ :size કિલો બાઇટ્સ.',
        'numeric' => ':Attribute હોવું જોઈએ :કદ.',
        'string' => ':Attribute હોવું જોઈએ :size અક્ષરો.',
    ],
    'starts_with' => ':Attribute નીચેમાંથી કોઈએક વડે શરૂ થતું હોવું જોઈએ :values.',
    'string' => ':Attribute શબ્દમાળા હોવી જોઈએ.',
    'timezone' => ':Attribute  માન્ય પરિક્ષેત્ર હોવું જોઈએ.',
    'unique' => ':Attribute પહેલેથી લઈ લેવામાં આવેલ છે.',
    'uploaded' => ':Attribute અપલોડ થવામાં નિષ્ફળ.',
    'url' => ':Attribute ગોઠવણ અમાન્ય છે.',
    'uuid' => ':Attribute માન્ય UUID હોવું જોઈએ.',
    'attributes' => [
        'address' => 'એડ્રેસ',
        'age' => 'વય',
        'amount' => 'amount',
        'area' => 'area',
        'available' => 'ઉપલબ્ધ',
        'birthday' => 'birthday',
        'body' => 'મુખ્ય ભાગ',
        'city' => 'શહેર',
        'content' => 'સામગ્રી',
        'country' => 'દેશ',
        'created_at' => 'created at',
        'creator' => 'creator',
        'current_password' => 'current password',
        'date' => 'તારીખ',
        'date_of_birth' => 'date of birth',
        'day' => 'દિવસ',
        'deleted_at' => 'deleted at',
        'description' => 'વર્ણન',
        'district' => 'district',
        'duration' => 'duration',
        'email' => 'ઈમેઈલ',
        'excerpt' => 'ટૂંકસાર',
        'filter' => 'filter',
        'first_name' => 'પ્રથમ_નામ',
        'gender' => 'જાતિ',
        'group' => 'group',
        'hour' => 'કલાક',
        'image' => 'image',
        'last_name' => 'અંતિમ_નામ',
        'lesson' => 'lesson',
        'line_address_1' => 'line address 1',
        'line_address_2' => 'line address 2',
        'message' => 'સંદેશ',
        'middle_name' => 'middle name',
        'minute' => 'મિનિટ',
        'mobile' => 'મોબાઈલ',
        'month' => 'મહિનો',
        'name' => 'નામ',
        'national_code' => 'national code',
        'number' => 'number',
        'password' => 'પાસવર્ડ',
        'password_confirmation' => 'પાસવર્ડ_પુષ્ટિકરણ',
        'phone' => 'ફોન',
        'photo' => 'photo',
        'postal_code' => 'postal code',
        'price' => 'price',
        'province' => 'પ્રદેશ',
        'recaptcha_response_field' => 'recaptcha response field',
        'remember' => 'remember',
        'restored_at' => 'restored at',
        'result_text_under_image' => 'result text under image',
        'role' => 'role',
        'second' => 'સેકંડ',
        'sex' => 'જાતિ',
        'short_text' => 'short text',
        'size' => 'કદ',
        'state' => 'state',
        'street' => 'street',
        'student' => 'student',
        'subject' => 'વિષય',
        'teacher' => 'teacher',
        'terms' => 'શરતો',
        'test_description' => 'test description',
        'test_locale' => 'test locale',
        'test_name' => 'test name',
        'text' => 'લખાણ',
        'time' => 'સમય',
        'title' => 'શીર્ષક',
        'updated_at' => 'updated at',
        'username' => 'વપરાશકર્તા નામ',
        'year' => 'વર્ષ',
    ],
];
