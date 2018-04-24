<?php

namespace App\GraphQL\Mutation;

use App\User;
use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class DeleteUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'DeleteUserMutation',
        'description' => 'Deletar um usuário'
    ];

    public function type()
    {
        return Type::boolean();
    }

    public function args()
    {
        return [
            'id' =>[
                'type'          => Type::nonNull(Type::int()),
                'description'   => 'Codigo do usuário',
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return User::findOrFail($args['id'])->delete();
    }
}
