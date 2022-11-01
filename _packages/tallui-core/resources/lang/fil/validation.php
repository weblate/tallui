<?php

declare(strict_types=1);

return [
    'accepted'             => 'Dapat na tanggapin ang :attribute.',
    'accepted_if'          => 'The :attribute must be accepted when :other is :value.',
    'active_url'           => 'Hindi valid na URL ang :attribute.',
    'after'                => 'Ang :attribute ay dapat na isang petsa pagkatapos ng :date.',
    'after_or_equal'       => 'Ang :attribute ay dapat na isang petsa na pagkatapos o katumbas ng :date.',
    'alpha'                => 'Mga titik lang dapat ang nilalaman ng :attribute.',
    'alpha_dash'           => 'Mag titik, numero, gitlling at underscore lang dapat ang nilalaman ng :attribute.',
    'alpha_num'            => 'Mag titik, numero, gitlling at underscore lang dapat ang nilalaman ng :attribute.',
    'array'                => 'Dapat na isang array ang :attribute.',
    'before'               => 'Ang :attribute ay dapat na isang petsa bago ang :date.',
    'before_or_equal'      => 'Ang :attribute ay dapat na isang petsa bago ang o katumbas ng :date.',
    'between'              => [
        'array'   => 'Ang :attribute ay dapat na nasa pagitan ng :min at :max (na) item.',
        'file'    => 'Ang :attribute ay dapat na nasa pagitan ng :min at :max (na) kilobyte.',
        'numeric' => 'Ang :attribute ay dapat na nasa pagitan ng :min at :max.',
        'string'  => 'Ang :attribute ay dapat na nasa pagitan ng :min at :max (na) character.',
    ],
    'boolean'              => 'Dapat na true o false ang field na :attribute.',
    'confirmed'            => 'Hindi tumutugma ang pagkumpirma ng :attribute.',
    'current_password'     => 'The password is incorrect.',
    'date'                 => 'Hindi valid na petsa ang :attribute.',
    'date_equals'          => 'Ang :attribute ay dapat na isang petsa na katumbas ng :date.',
    'date_format'          => 'Hindi tumutugma ang :attribute sa format na :format.',
    'declined'             => 'The :attribute must be declined.',
    'declined_if'          => 'The :attribute must be declined when :other is :value.',
    'different'            => 'Dapat na magkaiba ang :attribute at :other.',
    'digits'               => 'Ang :attribute ay dapat na :digits (na) digits',
    'digits_between'       => 'Ang :attribute ay dapat na nasa pagitan ng :min at :max (na) digit.',
    'dimensions'           => 'May mga hindi valid na dimensyon ng larawan ang :attribute.',
    'distinct'             => 'May duplicate na value ang field na :attribute.',
    'doesnt_end_with'      => 'The :attribute may not end with one of the following: :values.',
    'doesnt_start_with'    => 'The :attribute may not start with one of the following: :values.',
    'email'                => 'Dapat na valid na email address ang :attribute.',
    'ends_with'            => 'The :attribute must end with one of the following: :values.',
    'enum'                 => 'The selected :attribute is invalid.',
    'exists'               => 'Hindi valid ang piniling :attribute.',
    'file'                 => 'Dapat na isang file ang :attribute.',
    'filled'               => 'Dapat na may value ang field na :attribute.',
    'gt'                   => [
        'array'   => 'Ang :attribute ay dapat na mayroong mahigit sa :value (na) item.',
        'file'    => 'Ang :attribute ay dapat na mas malaki sa :value (na) kilobyte.',
        'numeric' => 'Ang :attribute ay dapat na mas malaki sa :value.',
        'string'  => 'Ang :attribute ay dapat na mas marami sa :value (na) character.',
    ],
    'gte'                  => [
        'array'   => 'Ang :attribute ay dapat na mayroong :value (na) item o higit pa.',
        'file'    => 'Ang :attribute ay dapat na mas malaki sa o katumbas ng :value (na) kilobyte.',
        'numeric' => 'Ang :attribute ay dapat na mas malaki sa o katumbas ng :value.',
        'string'  => 'Ang :attribute ay dapat na mas marami sa o katumbas ng :value (na) character.',
    ],
    'image'                => 'Dapat na isang larawan ang :attribute.',
    'in'                   => 'Hindi valid ang piniling :attribute.',
    'in_array'             => 'Hindi umiiral ang field na :attribute sa :other.',
    'integer'              => 'Dapat na isang integer ang :attribute.',
    'ip'                   => 'Dapat na valid na IP address ang :attribute.',
    'ipv4'                 => 'Dapat na valid na IPv4 address ang :attribute.',
    'ipv6'                 => 'Dapat na IPv6 address ang :attribute.',
    'json'                 => 'Dapat na valid na JSON string ang :attribute.',
    'lt'                   => [
        'array'   => 'Ang :attribute ay dapat na may mas bababa sa :value (na) item.',
        'file'    => 'Ang :attribute ay dapat na mas mababa sa :value (na) kilobyte.',
        'numeric' => 'Ang :attribute ay dapat na mas mababa sa :value.',
        'string'  => 'Ang :attribute ay dapat na mas mababa sa :value (na) character.',
    ],
    'lte'                  => [
        'array'   => 'Hindi dapat magkaroon ang :attribute ng higit sa :value (na) item.',
        'file'    => 'Ang :attribute ay dapat na mas mababa sa o katumbas ng :value (na) kilobyte.',
        'numeric' => 'Ang :attribute ay dapat na mas mababa sa o katumbas ng :value.',
        'string'  => 'Ang :attribute ay dapat na mas mababa sa o katumbas ng :value (na) character.',
    ],
    'mac_address'          => 'The :attribute must be a valid MAC address.',
    'max'                  => [
        'array'   => 'Hindi dapat magkaroon ang :attribute ng mahigit sa :max (na) item.',
        'file'    => 'Ang :attribute ay hindi dapat mas malaki sa :max (na) kilobyte.',
        'numeric' => 'Ang :attribute ay hindi dapat mas malaki sa :max.',
        'string'  => 'Ang :attribute ay hindi dapat mas malaki sa :max (na) character.',
    ],
    'max_digits'           => 'The :attribute must not have more than :max digits.',
    'mimes'                => 'Ang :attribute ay dapat na isang file na may uri na: :values.',
    'mimetypes'            => 'Ang :attribute ay dapat na file na may uri na: :values.',
    'min'                  => [
        'array'   => 'Ang :attribute ay dapat na may hindi bababa sa :min (na) item.',
        'file'    => 'Ang :attribute ay dapat na hindi bababa sa :min (na) kilobyte.',
        'numeric' => 'Ang :attribute ay dapat na hindi bababa sa :min.',
        'string'  => 'Ang :attribute ay dapat na hindi bababa sa :min (na) character.',
    ],
    'min_digits'           => 'The :attribute must have at least :min digits.',
    'multiple_of'          => 'The :attribute must be a multiple of :value.',
    'not_in'               => 'Hindi valid ang piniling :attribute.',
    'not_regex'            => 'Hindi valid ang format na :attribute.',
    'numeric'              => 'Dapat na numero ang :attribute.',
    'password'             => [
        'letters'       => 'The :attribute must contain at least one letter.',
        'mixed'         => 'The :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers'       => 'The :attribute must contain at least one number.',
        'symbols'       => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present'              => 'Dapat na mayroon ng field na :attribute.',
    'prohibited'           => 'The :attribute field is prohibited.',
    'prohibited_if'        => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless'    => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits'            => 'The :attribute field prohibits :other from being present.',
    'regex'                => 'Hindi valid ang format na :attribute.',
    'required'             => 'Kinakailangan ang field na :attribute.',
    'required_array_keys'  => 'The :attribute field must contain entries for: :values.',
    'required_if'          => 'Kinakailangan ang field na :attribute kapag ang :other ay :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless'      => 'Kinakailangan ang field na :attribute maliban kung ang :other ay nasa :values.',
    'required_with'        => 'Kinakailangan ang field na :attribute kapag mayroong :values.',
    'required_with_all'    => 'Kinakailangan ang field na :attribute kapag mayroong :values.',
    'required_without'     => 'Kinakailangan ang field na :attribute kapag wala ang anuman sa :values.',
    'required_without_all' => 'Kinakailangan ang field na :attribute kapag wala ang anuman sa :values.',
    'same'                 => 'Dapat na magtugma ang :attribute at :other.',
    'size'                 => [
        'array'   => 'Dapat na maglaman ang :attribute ng :size (na) item.',
        'file'    => 'Ang :attribute ay dapat na :size (na) kilobyte.',
        'numeric' => 'Ang :attribute ay dapat na :size.',
        'string'  => 'Ang :attribute ay dapat na :size (na) character.',
    ],
    'starts_with'          => 'Dapat na magsimula ang :attribute sa isa sa sumusunod: :values',
    'string'               => 'Dapat na isang string ang :attribute.',
    'timezone'             => 'Dapat na valid na timezone ang :attribute.',
    'unique'               => 'Ginagamit na ang :attribute.',
    'uploaded'             => 'Hindi na-upload ang :attribute.',
    'url'                  => 'Hindi valid ang format na :attribute.',
    'uuid'                 => 'Dapat na valid na UUID ang :attribute.',
    'attributes'           => [
        'address'                  => 'address',
        'age'                      => 'age',
        'amount'                   => 'amount',
        'area'                     => 'area',
        'available'                => 'available',
        'birthday'                 => 'birthday',
        'body'                     => 'body',
        'city'                     => 'city',
        'content'                  => 'content',
        'country'                  => 'country',
        'created_at'               => 'created at',
        'creator'                  => 'creator',
        'current_password'         => 'current password',
        'date'                     => 'date',
        'date_of_birth'            => 'date of birth',
        'day'                      => 'day',
        'deleted_at'               => 'deleted at',
        'description'              => 'description',
        'district'                 => 'district',
        'duration'                 => 'duration',
        'email'                    => 'email',
        'excerpt'                  => 'excerpt',
        'filter'                   => 'filter',
        'first_name'               => 'first name',
        'gender'                   => 'gender',
        'group'                    => 'group',
        'hour'                     => 'hour',
        'image'                    => 'image',
        'last_name'                => 'last name',
        'lesson'                   => 'lesson',
        'line_address_1'           => 'line address 1',
        'line_address_2'           => 'line address 2',
        'message'                  => 'message',
        'middle_name'              => 'middle name',
        'minute'                   => 'minute',
        'mobile'                   => 'mobile',
        'month'                    => 'month',
        'name'                     => 'name',
        'national_code'            => 'national code',
        'number'                   => 'number',
        'password'                 => 'password',
        'password_confirmation'    => 'password confirmation',
        'phone'                    => 'phone',
        'photo'                    => 'photo',
        'postal_code'              => 'postal code',
        'price'                    => 'price',
        'province'                 => 'province',
        'recaptcha_response_field' => 'recaptcha response field',
        'remember'                 => 'remember',
        'restored_at'              => 'restored at',
        'result_text_under_image'  => 'result text under image',
        'role'                     => 'role',
        'second'                   => 'second',
        'sex'                      => 'sex',
        'short_text'               => 'short text',
        'size'                     => 'size',
        'state'                    => 'state',
        'street'                   => 'street',
        'student'                  => 'student',
        'subject'                  => 'subject',
        'teacher'                  => 'teacher',
        'terms'                    => 'terms',
        'test_description'         => 'test description',
        'test_locale'              => 'test locale',
        'test_name'                => 'test name',
        'text'                     => 'text',
        'time'                     => 'time',
        'title'                    => 'title',
        'updated_at'               => 'updated at',
        'username'                 => 'username',
        'year'                     => 'year',
    ],
];
