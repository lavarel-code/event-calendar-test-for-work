<?php
/**
 * Created by PhpStorm.
 * User: cheremhovo
 * Date: 13.03.18
 * Time: 18:15
 */

namespace App\Providers;


use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserServiceProvider
 * @package App\Providers
 */
class UserServiceProvider
{
    /**
     * @param User $model
     * @param UserRequest $request
     * @return User
     * @throws \Throwable
     */
    public function update(User $model, UserRequest $request): User
    {
        $model->edit($request->post('email'), $request->post('name'));
        if ($request->has('name')) {
            $model->password = Hash::make($request->get('password'));
        }
        $model->saveOrFail();
        return $model;
    }
}