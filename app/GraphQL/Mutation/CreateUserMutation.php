<?php

namespace App\GraphQL\Mutation;

use App\User;
use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class CreateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreateUserMutation',
        'description' => 'Criar um usuário'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'name' =>[
                'type'          => Type::nonNull(Type::string()),
                'description'   => 'Nome do usuário',
//                'rules'         => [
//                    'unique|users'
//                ]
            ],
            'email' =>[
                'type'          => Type::nonNull(Type::string()),
                'description'   => 'E-mail do usuário',
//                'rules'         => [
//                    'unique|users'
//                ]
            ],
            'password' =>[
                'type'          => Type::nonNull(Type::string()),
                'description'   => 'Senha do usuário',
//                'rules'         => [
//                    'min4'
//                ]
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return User::create($args);
    }
}
