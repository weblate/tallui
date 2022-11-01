<?php

declare(strict_types=1);

return [
    'accepted'             => '必須接受 :attribute。',
    'accepted_if'          => '當 :other 為 :value 時，:attribute 必須接受。',
    'active_url'           => ':Attribute 不是有效的網址。',
    'after'                => ':Attribute 必須要晚於 :date。',
    'after_or_equal'       => ':Attribute 必須要等於 :date 或更晚。',
    'alpha'                => ':Attribute 只能以字母組成。',
    'alpha_dash'           => ':Attribute 只能以字母、數字、連接線(-)及底線(_)組成。',
    'alpha_num'            => ':Attribute 只能以字母及數字組成。',
    'array'                => ':Attribute 必須為陣列。',
    'before'               => ':Attribute 必須要早於 :date。',
    'before_or_equal'      => ':Attribute 必須要等於 :date 或更早。',
    'between'              => [
        'array'   => ':Attribute: 必須有 :min - :max 個元素。',
        'file'    => ':Attribute 必須介於 :min 至 :max KB 之間。',
        'numeric' => ':Attribute 必須介於 :min 至 :max 之間。',
        'string'  => ':Attribute 必須介於 :min 至 :max 個字元之間。',
    ],
    'boolean'              => ':Attribute 必須為布林值。',
    'confirmed'            => ':Attribute 確認欄位的輸入不一致。',
    'current_password'     => '當前密碼不正確。',
    'date'                 => ':Attribute 不是有效的日期。',
    'date_equals'          => ':Attribute 必須等於 :date。',
    'date_format'          => ':Attribute 不符合 :format 的格式。',
    'declined'             => ':Attribute 必須拒絕。',
    'declined_if'          => '當 :other 為 :value 時，:attribute 必須拒絕。',
    'different'            => ':Attribute 與 :other 必須不同。',
    'digits'               => ':Attribute 必須是 :digits 位數字。',
    'digits_between'       => ':Attribute 必須介於 :min 至 :max 位數字。',
    'dimensions'           => ':Attribute 圖片尺寸不正確。',
    'distinct'             => ':Attribute 已經存在。',
    'doesnt_end_with'      => 'The :attribute may not end with one of the following: :values.',
    'doesnt_start_with'    => 'The :attribute may not start with one of the following: :values.',
    'email'                => ':Attribute 必須是有效的 E-mail。',
    'ends_with'            => ':Attribute 結尾必須包含下列之一：:values。',
    'enum'                 => ':Attribute 的值不正確。',
    'exists'               => ':Attribute 不存在。',
    'file'                 => ':Attribute 必須是有效的檔案。',
    'filled'               => ':Attribute 不能留空。',
    'gt'                   => [
        'array'   => ':Attribute 必須多於 :value 個元素。',
        'file'    => ':Attribute 必須大於 :value KB。',
        'numeric' => ':Attribute 必須大於 :value。',
        'string'  => ':Attribute 必須多於 :value 個字元。',
    ],
    'gte'                  => [
        'array'   => ':Attribute 必須多於或等於 :value 個元素。',
        'file'    => ':Attribute 必須大於或等於 :value KB。',
        'numeric' => ':Attribute 必須大於或等於 :value。',
        'string'  => ':Attribute 必須多於或等於 :value 個字元。',
    ],
    'image'                => ':Attribute 必須是一張圖片。',
    'in'                   => '所選擇的 :attribute 選項無效。',
    'in_array'             => ':Attribute 沒有在 :other 中。',
    'integer'              => ':Attribute 必須是一個整數。',
    'ip'                   => ':Attribute 必須是一個有效的 IP 位址。',
    'ipv4'                 => ':Attribute 必須是一個有效的 IPv4 位址。',
    'ipv6'                 => ':Attribute 必須是一個有效的 IPv6 位址。',
    'json'                 => ':Attribute 必須是正確的 JSON 字串。',
    'lt'                   => [
        'array'   => ':Attribute 必須少於 :value 個元素。',
        'file'    => ':Attribute 必須小於 :value KB。',
        'numeric' => ':Attribute 必須小於 :value。',
        'string'  => ':Attribute 必須少於 :value 個字元。',
    ],
    'lte'                  => [
        'array'   => ':Attribute 必須少於或等於 :value 個元素。',
        'file'    => ':Attribute 必須小於或等於 :value KB。',
        'numeric' => ':Attribute 必須小於或等於 :value。',
        'string'  => ':Attribute 必須少於或等於 :value 個字元。',
    ],
    'mac_address'          => ':Attribute 必須是一個有效的 MAC 位址。',
    'max'                  => [
        'array'   => ':Attribute 最多有 :max 個元素。',
        'file'    => ':Attribute 不能大於 :max KB。',
        'numeric' => ':Attribute 不能大於 :max。',
        'string'  => ':Attribute 不能多於 :max 個字元。',
    ],
    'max_digits'           => 'The :attribute must not have more than :max digits.',
    'mimes'                => ':Attribute 必須為 :values 的檔案。',
    'mimetypes'            => ':Attribute 必須為 :values 的檔案。',
    'min'                  => [
        'array'   => ':Attribute 至少有 :min 個元素。',
        'file'    => ':Attribute 不能小於 :min KB。',
        'numeric' => ':Attribute 不能小於 :min。',
        'string'  => ':Attribute 不能小於 :min 個字元。',
    ],
    'min_digits'           => 'The :attribute must have at least :min digits.',
    'multiple_of'          => '所選擇的 :attribute 必須為 :value 中的多個。',
    'not_in'               => '所選擇的 :attribute 選項無效。',
    'not_regex'            => ':Attribute 的格式錯誤。',
    'numeric'              => ':Attribute 必須為一個數字。',
    'password'             => [
        'letters'       => 'The :attribute must contain at least one letter.',
        'mixed'         => 'The :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers'       => 'The :attribute must contain at least one number.',
        'symbols'       => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present'              => ':Attribute 必須存在。',
    'prohibited'           => ':Attribute 字段被禁止。',
    'prohibited_if'        => '当 :other 为 :value 时，:attribute字段被禁止。',
    'prohibited_unless'    => ':Attribute 字段被禁止，除非 :other 在 :values 中。',
    'prohibits'            => ':Attribute 字段禁止包含 :other。',
    'regex'                => ':Attribute 的格式錯誤。',
    'required'             => ':Attribute 不能留空。',
    'required_array_keys'  => ':Attribute 必須包含 :values 中的一個鍵。',
    'required_if'          => '當 :other 是 :value 時 :attribute 不能留空。',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless'      => '當 :other 不是 :values 時 :attribute 不能留空。',
    'required_with'        => '當 :values 出現時 :attribute 不能留空。',
    'required_with_all'    => '當 :values 出現時 :attribute 不能為空。',
    'required_without'     => '當 :values 留空時 :attribute field 不能留空。',
    'required_without_all' => '當 :values 都不出現時 :attribute 不能留空。',
    'same'                 => ':Attribute 與 :other 必須相同。',
    'size'                 => [
        'array'   => ':Attribute 必須是 :size 個元素。',
        'file'    => ':Attribute 的大小必須是 :size KB。',
        'numeric' => ':Attribute 的大小必須是 :size。',
        'string'  => ':Attribute 必須是 :size 個字元。',
    ],
    'starts_with'          => ':Attribute 開頭必須包含下列之一：:values。',
    'string'               => ':Attribute 必須是一個字串。',
    'timezone'             => ':Attribute 必須是一個正確的時區值。',
    'unique'               => ':Attribute 已經存在。',
    'uploaded'             => ':Attribute 上傳失敗。',
    'url'                  => ':Attribute 的格式錯誤。',
    'uuid'                 => ':Attribute 必須是有效的 UUID。',
    'attributes'           => [
        'address'                  => '地址',
        'age'                      => '年齡',
        'amount'                   => 'amount',
        'area'                     => 'area',
        'available'                => '可用的',
        'birthday'                 => 'birthday',
        'body'                     => 'body',
        'city'                     => '城市',
        'content'                  => '內容',
        'country'                  => '國家',
        'created_at'               => 'created at',
        'creator'                  => 'creator',
        'current_password'         => 'current password',
        'date'                     => '日期',
        'date_of_birth'            => 'date of birth',
        'day'                      => '天',
        'deleted_at'               => 'deleted at',
        'description'              => '描述',
        'district'                 => 'district',
        'duration'                 => 'duration',
        'email'                    => 'e-mail',
        'excerpt'                  => '摘要',
        'filter'                   => 'filter',
        'first_name'               => '名',
        'gender'                   => '性別',
        'group'                    => 'group',
        'hour'                     => '時',
        'image'                    => 'image',
        'last_name'                => '姓',
        'lesson'                   => 'lesson',
        'line_address_1'           => 'line address 1',
        'line_address_2'           => 'line address 2',
        'message'                  => 'message',
        'middle_name'              => 'middle name',
        'minute'                   => '分',
        'mobile'                   => '手機',
        'month'                    => '月',
        'name'                     => '名稱',
        'national_code'            => 'national code',
        'number'                   => 'number',
        'password'                 => '密碼',
        'password_confirmation'    => '確認密碼',
        'phone'                    => '電話',
        'photo'                    => 'photo',
        'postal_code'              => 'postal code',
        'price'                    => 'price',
        'province'                 => 'province',
        'recaptcha_response_field' => 'recaptcha response field',
        'remember'                 => 'remember',
        'restored_at'              => 'restored at',
        'result_text_under_image'  => 'result text under image',
        'role'                     => 'role',
        'second'                   => '秒',
        'sex'                      => '性別',
        'short_text'               => 'short text',
        'size'                     => '大小',
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
        'time'                     => '時間',
        'title'                    => '標題',
        'updated_at'               => 'updated at',
        'username'                 => '使用者名稱',
        'year'                     => '年',
    ],
];
