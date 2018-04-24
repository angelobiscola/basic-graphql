<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class UserType extends BaseType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'Usuario'
    ];

    public function fields()
    {
        return [
            'id' =>[
                'type'          => Type::nonNull(Type::int()),
                'description'   => 'Código unico do usuário'
            ],
            'name' =>[
                'type'          => Type::nonNull(Type::string()),
                'description'   => 'Nome do usuário'
            ],
            'email' =>[
                'type'          => Type::nonNull(Type::string()),
                'description'   => 'E-mail do usuário'
            ],
            'created_at' =>[
                'type'          => Type::string(),
                'description'   => 'Data criação do usuário.'
            ],
            'update_at' =>[
                'type'          => Type::string(),
                'description'   => 'Data ultima atualização do usuário.'
            ]
        ];
    }
}
