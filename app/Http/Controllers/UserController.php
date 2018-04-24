<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    private $_user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->_user = $user;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try{
            return response()->json(['data' => $this->_user->all()],Response::HTTP_OK);

        }catch (\Exception $e)
        {
            return response()->json($e->getMessage(),Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try{
            $user = $this->_user->create($request->input());
            return response()->json(['data' => $user],Response::HTTP_OK);

        }catch (\Exception $e)
        {
            return response()->json($e->getMessage(),Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * @param $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($user_id)
    {
        try{
            $user = $this->_user->findOrFail($user_id);
            return response()->json(['data' => $user],Response::HTTP_OK);

        }catch (\Exception $e)
        {
            return response()->json('no results',Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * @param Request $request
     * @param $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,$user_id)
    {
        try{
            $user = $this->_user->findOrFail($user_id)->update($request->input());
            return response()->json(['data' => $user],Response::HTTP_OK);

        }catch (\Exception $e)
        {
            return response()->json($e->getMessage(),Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * @param $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($user_id)
    {
        try{
            $user = $this->_user->findOrFail($user_id)->delete();
            return response()->json(['data' => ''],Response::HTTP_OK);

        }catch (\Exception $e)
        {
            return response()->json('no results',Response::HTTP_UNAUTHORIZED);
        }
    }
}
