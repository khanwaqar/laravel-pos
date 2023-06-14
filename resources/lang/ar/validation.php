<?php

return [

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

    'accepted'             => 'يجب قبول السمة:.',
    'active_url'           => 'السمة: ليست عنوان URL صالحًا.',
    'after'                => 'يجب أن تكون السمة تاريخًا بعد: التاريخ.',
    'alpha'                => 'لا يجوز أن تحتوي السمة: إلا على أحرف.',
    'alpha_dash'           => 'لا يجوز أن تحتوي السمة: إلا على أحرف وأرقام وشرطات.',
    'alpha_num'            => 'لا يجوز أن تحتوي السمة: إلا على أحرف وأرقام.',
    'array'                => 'يجب أن تكون السمة مصفوفة.',
    'before'               => 'يجب أن تكون السمة تاريخًا قبل: التاريخ.',
    'between'              => [
        'numeric' => 'يجب أن تكون السمة: بين: min و: max.',
        'file'    => 'يجب أن تكون السمة: بين: min و: max كيلوبايت.',
        'string'  => 'يجب أن تكون السمة: بين: min و: max من الأحرف.',
        'array'   => 'يجب أن تحتوي السمة: على ما بين: min و: max من العناصر.',
    ],
    'boolean'              => 'يجب أن يكون حقل السمة: صح أو خطأ.',
    'confirmed'            => 'تأكيد السمة غير مطابق.',
    'date'                 => 'السمة: ليست تاريخًا صالحًا.',
    'date_format'          => 'السمة: لا تطابق التنسيق: format.',
    'different'            => 'يجب أن يكون: السمة و: الآخر مختلفين.',
    'digits'               => 'يجب أن تكون السمة: أرقامًا.',
    'digits_between'       => 'يجب أن تكون السمة: بين: min و: max أرقام.',
    'dimensions'           => 'السمة لها أبعاد صورة غير صالحة.',
    'distinct'             => 'يحتوي حقل السمة على قيمة مكررة.',
    'email'                => 'يجب أن تكون السمة: عنوان بريد إلكتروني صالحًا.',
    'exists'               => 'السمة المحددة: غير صالحة.',
    'file'                 => 'يجب أن تكون السمة: ملفًا.',
    'filled'               => ': حقل السمة مطلوب.',
    'image'                => 'يجب أن تكون السمة صورة.',
    'in'                   => 'السمة المحددة: غير صالحة.',
    'in_array'             => 'حقل السمة: غير موجود في: أخرى.',
    'integer'              => 'يجب أن تكون السمة عددًا صحيحًا.',
    'ip'                   => 'يجب أن تكون السمة: عنوان IP صالحًا.',
    'json'                 => 'يجب أن تكون السمة: سلسلة JSON صالحة.',
    'max'                  => [
        'numeric' => 'لا يجوز أن تكون السمة: أكبر من: max.',
        'file'    => 'لا يجوز أن تكون السمة: أكبر من: أقصى كيلوبايت.',
        'string'  => 'يجب ألا تكون السمة: أكبر من: الحد الأقصى من الأحرف.',
        'array'   => 'لا يجوز أن تحتوي السمة: على أكثر من:  العناصر.max',
    ],
    'mimes'                => 'يجب أن تكون السمة: ملفًا من النوع: القيم.',
    'mimetypes'            => 'يجب أن تكون السمة: ملفًا من النوع: القيم.',
    'min'                  => [
        'numeric' => 'يجب أن تكون سمة: على الأقل: min.',
        'file'    => 'يجب أن تكون السمة: على الأقل: دقيقة كيلوبايت.',
        'string'  => 'يجب ألا تقل السمة: عن: min حرفًا.',
        'array'   => 'يجب أن تحتوي السمة على ما لا يقل عن: الحد الأدنى من العناصر.',
    ],
    'not_in'               => 'السمة المحددة: غير صالحة.',
    'numeric'              => 'يجب أن تكون السمة رقمًا.',
    'present'              => 'يجب أن يكون حقل السمة موجودًا.',
    'regex'                => 'تنسيق السمة: غير صالح.',
    'required'             => ': حقل السمة مطلوب.',
    'required_if'          => 'يكون حقل السمة مطلوبًا عندما: الآخر هو: القيمة.',
    'required_unless'      => 'حقل السمة مطلوب إلا إذا كان الآخر في: قيم.',
    'required_with'        => 'يكون حقل السمة مطلوبًا عندما تكون: القيم موجودة.',
    'required_with_all'    => 'يكون حقل السمة مطلوبًا عندما تكون: القيم موجودة.',
    'required_without'     => 'يكون حقل السمة مطلوبًا عندما: القيم غير موجودة.',
    'required_without_all' => 'يكون حقل السمة مطلوبًا في حالة عدم وجود أي من: القيم.',
    'same'                 => 'يجب أن يتطابق السمة: و: الآخر.',
    'size'                 => [
        'numeric' => 'يجب أن تكون السمة: الحجم.',
        'file'    => 'يجب أن تكون السمة: الحجم كيلوبايت.',
        'string'  => 'يجب أن تكون السمة: أحرف الحجم.',
        'array'   => 'يجب أن تحتوي السمة: على عناصر الحجم.',
    ],
    'string'               => 'يجب أن تكون السمة: سلسلة.',
    'timezone'             => 'يجب أن تكون السمة: منطقة صالحة.',
    'unique'               => 'تم استخدام السمة: بالفعل.',
    'uploaded'             => 'فشل تحميل السمة:.',
    'url'                  => 'تنسيق السمة: غير صالح.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],
    'gt' => [
        'numeric'=>'يجب أن تكون القيمة أكبر من 0'
    ]

];
