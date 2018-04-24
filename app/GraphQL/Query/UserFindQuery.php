<?php

namespace App\GraphQL\Query;

use App\User;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class UserFindQuery extends Query
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'Pesquisa por Id de usuário'
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
                'description'   => 'Código unico do usuário'
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return User::find($args['id']);
    }
}
