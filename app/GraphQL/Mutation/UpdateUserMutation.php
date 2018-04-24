<?php

namespace App\GraphQL\Mutation;

use App\User;
use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class UpdateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateUserMutation',
        'description' => 'Atualizar um usuário'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'id' =>[
                'type'          => Type::nonNull(Type::int()),
                'description'   => 'Código do usuário',
            ],
            'name' =>[
                'type'          => Type::string(),
                'description'   => 'Nome do usuário',
            ],
            'email' =>[
                'type'          => Type::string(),
                'description'   => 'E-mail do usuário',
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
         User::findOrFail($args['id'])->update(array_except($args,'id'));
         return User::find($args['id']);
    }
}
