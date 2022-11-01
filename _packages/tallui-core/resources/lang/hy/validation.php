<?php

declare(strict_types=1);

return [
    'accepted' => ':Attribute դաշտը պետք է ընդունվի։',
    'accepted_if' => 'Այս դաշտը պետք է ընդունվի երբ :other համապատասխանում է :value։',
    'active_url' => ':Attribute դաշտը վավեր URL չէ։',
    'after' => ':Attribute դաշտի ամսաթիվը պետք է լինի :date-ից հետո։',
    'after_or_equal' => ':Attribute դաշտի ամսաթիվը պետք է լինի :date կամ դրանից հետո։',
    'alpha' => ':Attribute դաշտը պետք է պարունակի միայն տառեր։',
    'alpha_dash' => ':Attribute դաշտը պետք է պարունակի միայն տառեր, թվեր, գծիկներ և ընդգծումներ։',
    'alpha_num' => ':Attribute դաշտը պետք է պարունակի միայն տառեր և թվեր։',
    'array' => ':Attribute դաշտը պետք է լինի զանգված։',
    'before' => ':Attribute դաշտի ամսաթիվը պետք է լինի :date-ից առաջ։',
    'before_or_equal' => ':Attribute դաշտի ամսաթիվը պետք է լինի :date կամ դրանից առաջ։',
    'between' => [
        'array' => ':Attribute դաշտում էլեմենտների քանակը պետք է լինի :min-ի և :max-ի միջև։',
        'file' => ':Attribute դաշտի ֆայլի չափը պետք է լինի :min և :max կիլոբայթի միջև։',
        'numeric' => ':Attribute դաշտը պետք է լինի :min և :max թվերի միջև։',
        'string' => ':Attribute դաշտը պետք է ունենա :min-ից :max նիշ։',
    ],
    'boolean' => ':Attribute դաշտի արժեքը պետք է լինի ճշմարիտ կամ կեղծ։',
    'confirmed' => ':Attribute դաշտը չի համապատասխանում հաստատմանը։',
    'current_password' => 'Այս դաշտը պարունակում է անվավեր գաղտնաբառ։',
    'date' => ':Attribute դաշտը վավեր ամսաթիվ չէ։',
    'date_equals' => ':Attribute դաշտի ամսաթիվը պետք է լինի :date։',
    'date_format' => ':Attribute դաշտը չի համապատասխանում :format ձևաչափին։',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => ':Attribute և :other դաշտերը պետք է լինեն տարբեր։',
    'digits' => ':Attribute դաշտի թվանշանների քանակը պետք է լինի :digits։',
    'digits_between' => ':Attribute դաշտի թվանշանների քանակը պետք է լինի :min-ից :max։',
    'dimensions' => ':Attribute դաշտը ունի անվավեր նկարի չափեր։',
    'distinct' => ':Attribute դաշտը ունի կրկնվող արժեք։',
    'doesnt_end_with' => 'The :attribute may not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attribute may not start with one of the following: :values.',
    'email' => ':Attribute դաշտը պետք է լինի վավերական Էլ․ հասցե։',
    'ends_with' => ':Attribute դաշտը պետք է ավարտվի հետևյալ արժեքներից մեկով․ :values։',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => ':Attribute դաշտի ընտրված արժեքն անվավեր է։',
    'file' => ':Attribute-ը պետք է լինի ֆայլ։',
    'filled' => ':Attribute դաշտը պետք է անպայման ունենա արժեք։',
    'gt' => [
        'array' => ':Attribute դաշտում էլեմենտների քանակը պետք է լինի :value-ից մեծ։',
        'file' => ':Attribute դաշտի ֆայլի չափը պետք է լինի :value կիլոբայթից մեծ։',
        'numeric' => ':Attribute դաշտը պետք է լինի :value-ից մեծ։',
        'string' => ':Attribute դաշտի նիշերի քանակը պետք է գերազանցի :value-ը։',
    ],
    'gte' => [
        'array' => ':Attribute դաշտում էլեմենտների քանակը պետք է մեծ կամ հավասար լինի :value-ից։',
        'file' => ':Attribute դաշտի ֆայլի չափը պետք է մեծ կամ հավասար լինի :value կիլոբայթից։',
        'numeric' => ':Attribute դաշտը պետք է մեծ կամ հավասար լինի :value-ից։',
        'string' => ':Attribute դաշտի նիշերի քանակը պետք է մեծ կամ հավասար լինի :value-ից։',
    ],
    'image' => ':Attribute դաշտը պետք է լինի նկար։',
    'in' => ':Attribute դաշտի ընտրված արժեքն անվավեր է։',
    'in_array' => ':Attribute դաշտը գոյություն չունի :other-ում։',
    'integer' => ':Attribute դաշտը պետք է լինի ամբողջ թիվ։',
    'ip' => ':Attribute դաշտը պետք է լինի վավեր IP հասցե.',
    'ipv4' => ':Attribute դաշտը պետք է լինի վավեր IPv4 հասցե։',
    'ipv6' => ':Attribute դաշտը պետք է լինի վավեր IPv6 հասցե։',
    'json' => ':Attribute դաշտը պետք է լինի վավեր JSON տեքստ։',
    'lt' => [
        'array' => ':Attribute դաշտում էլեմենտների քանակը պետք է փոքր լինի :value-ից։',
        'file' => ':Attribute դաշտի ֆայլի չափը պետք է փոքր լինի :value կիլոբայթից։',
        'numeric' => ':Attribute դաշտը պետք է փոքր լինի :value-ից։',
        'string' => ':Attribute դաշտը պետք է ունենա :value-ից պակաս նիշեր։',
    ],
    'lte' => [
        'array' => ':Attribute դաշտում էլեմենտների քանակը պետք է փոքր կամ հավասար լինի :value-ից։',
        'file' => ':Attribute դաշտի ֆայլի չափը պետք է փոքր կամ հավասար լինի :value կիլոբայթից։',
        'numeric' => ':Attribute դաշտը պետք է փոքր կամ հավասար լինի :value-ից։',
        'string' => ':Attribute դաշտի նիշերի քանակը պետք է փոքր կամ հավասար լինի :value-ից։',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'array' => ':Attribute դաշտում էլեմենտների քանակը չպետք է գերազանցի :max-ը։',
        'file' => ':Attribute դաշտի ֆայլի չափը չպետք է գերազանցի :max կիլոբայթը։',
        'numeric' => ':Attribute դաշտը չի կարող լինել :max-ից մեծ։',
        'string' => ':Attribute դաշտի նիշերի քանակը չի կարող լինել :max-ց մեծ։',
    ],
    'max_digits' => 'The :attribute must not have more than :max digits.',
    'mimes' => ':Attribute դաշտի ֆայլի տեսակը պետք է լինի հետևյալներից մեկը․ :values։',
    'mimetypes' => ':Attribute դաշտի ֆայլի տեսակը պետք է լինի հետևյալներից մեկը․ :values։',
    'min' => [
        'array' => ':Attribute դաշտում էլեմենտների քանակը պետք է լինի առնվազն :min։',
        'file' => ':Attribute դաշտի ֆայլի չափը պետք է լինի առնվազն :min կիլոբայթ։',
        'numeric' => ':Attribute դաշտը պետք է լինի առնվազն :min։',
        'string' => ':Attribute դաշտի նիշերի քանակը պետք է լինի առնվազն :min։',
    ],
    'min_digits' => 'The :attribute must have at least :min digits.',
    'multiple_of' => ':Attribute դաշտի արժեքը պետք է լինի բազմապատիկ :value-ին։',
    'not_in' => ':Attribute դաշտի ընտրված արժեքն անվավեր է։',
    'not_regex' => ':Attribute դաշտի ձևաչափը սխալ է։',
    'numeric' => ':Attribute դաշտը պետք է լինի թիվ։',
    'password' => [
        'letters' => 'The :attribute must contain at least one letter.',
        'mixed' => 'The :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute must contain at least one number.',
        'symbols' => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => ':Attribute դաշտը պետք է առկա լինի։',
    'prohibited' => ':Attribute դաշտը արգելված է։',
    'prohibited_if' => ':Attribute դաշտը արգելված է երբ :other դաշտի արժեքը :value է։',
    'prohibited_unless' => ':Attribute դաշտը արգելված է քանի դեռ :other դաշտի արժեքը :values միջակայքում չի։',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => ':Attribute դաշտի ձևաչափը սխալ է։',
    'required' => ':Attribute դաշտը պարտադիր է։',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => ':Attribute դաշտը պարտադիր է երբ :other-ը հավասար է :value։',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => ':Attribute դաշտը պարտադիր է քանի դեռ :other-ը հավասար չէ :values։',
    'required_with' => ':Attribute դաշտը պարտադիր է երբ :values արժեքն առկա է։',
    'required_with_all' => ':Attribute դաշտը պարտադիր է երբ :values արժեքները առկա են։',
    'required_without' => ':Attribute դաշտը պարտադիր է երբ :values արժեքը նշված չէ։',
    'required_without_all' => ':Attribute դաշտը պարտադիր է երբ :values արժեքներից ոչ մեկը նշված չեն։',
    'same' => ':Attribute և :other դաշտերը պետք է համընկնեն։',
    'size' => [
        'array' => ':Attribute դաշտը պետք է պարունակի :size էլեմենտ։',
        'file' => ':Attribute դաշտում ֆայլի չափը պետք է լինի :size կիլոբայթ։',
        'numeric' => ':Attribute դաշտը պետք է հավասար լինի :size-ի։',
        'string' => ':Attribute դաշտը պետք է ունենա :size նիշ։',
    ],
    'starts_with' => ':Attribute դաշտը պետք է սկսվի հետևյալ արժեքներից մեկով․ :values։',
    'string' => ':Attribute դաշտը պետք է լինի տեքստ։',
    'timezone' => ':Attribute դաշտը պետք է լինի վավեր ժամային գոտի։',
    'unique' => ':Attribute-ի տվյալ արժեքն արդեն գոյություն ունի։',
    'uploaded' => ':Attribute-ի վերբեռնումը ձախողվել է։',
    'url' => ':Attribute դաշտի ձևաչափը սխալ է։',
    'uuid' => ':Attribute դաշտը պետք է լինի վավեր UUID։',
    'attributes' => [
        'address' => 'հասցե',
        'age' => 'տարիք',
        'amount' => 'amount',
        'area' => 'area',
        'available' => 'առկա',
        'birthday' => 'birthday',
        'body' => 'body',
        'city' => 'քաղաք',
        'content' => 'բովանդակություն',
        'country' => 'երկիր',
        'created_at' => 'created at',
        'creator' => 'creator',
        'current_password' => 'current password',
        'date' => 'ամսաթիվ',
        'date_of_birth' => 'date of birth',
        'day' => 'օր',
        'deleted_at' => 'deleted at',
        'description' => 'նկարագրություն',
        'district' => 'district',
        'duration' => 'duration',
        'email' => 'էլ-փոստի հասցե',
        'excerpt' => 'քաղվածք',
        'filter' => 'filter',
        'first_name' => 'անուն',
        'gender' => 'սեռ',
        'group' => 'group',
        'hour' => 'ժամ',
        'image' => 'image',
        'last_name' => 'ազգանուն',
        'lesson' => 'lesson',
        'line_address_1' => 'line address 1',
        'line_address_2' => 'line address 2',
        'message' => 'message',
        'middle_name' => 'middle name',
        'minute' => 'րոպե',
        'mobile' => 'բջջ. հեռ.',
        'month' => 'ամիս',
        'name' => 'անուն',
        'national_code' => 'national code',
        'number' => 'number',
        'password' => 'գաղտնաբառ',
        'password_confirmation' => 'գաղտնաբառի հաստատում',
        'phone' => 'հեռախոսահամար',
        'photo' => 'photo',
        'postal_code' => 'postal code',
        'price' => 'price',
        'province' => 'province',
        'recaptcha_response_field' => 'recaptcha response field',
        'remember' => 'remember',
        'restored_at' => 'restored at',
        'result_text_under_image' => 'result text under image',
        'role' => 'role',
        'second' => 'վայրկյան',
        'sex' => 'սեռ',
        'short_text' => 'short text',
        'size' => 'չափ',
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
        'time' => 'ժամանակ',
        'title' => 'վերնագիր',
        'updated_at' => 'updated at',
        'username' => 'օգտանուն',
        'year' => 'տարի',
    ],
];
