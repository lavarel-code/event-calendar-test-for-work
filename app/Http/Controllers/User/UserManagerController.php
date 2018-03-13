<?php
/**
 * Created by PhpStorm.
 * User: cheremhovo
 * Date: 13.03.18
 * Time: 16:18
 */

namespace App\Http\Controllers\User;


use App\Http\Requests\UserRequest;
use App\Providers\UserServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
 * Class UserManagerController
 * @package App\Http\Controllers\User
 */
class UserManagerController extends Controller
{
    /**
     * @var UserServiceProvider
     */
    private $userServiceProvider;

    /**
     * UserManagerController constructor.
     * @param UserServiceProvider $userServiceProvider
     */
    public function __construct(
        UserServiceProvider $userServiceProvider
    )
    {
        $this->middleware('auth:web');
        $this->userServiceProvider = $userServiceProvider;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $model = $request->user();
        $success = $request->session()->get('success');
        return view('user/edit', ['model' => $model, 'success' => $success]);
    }


    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function update(UserRequest $request)
    {
        $this->userServiceProvider->update($request->user(), $request);
        $request->session()->flash('success', 'Success');
        return redirect('/user/edit');
    }
}