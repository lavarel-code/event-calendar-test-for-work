<?php
/**
 * Created by PhpStorm.
 * User: cheremhovo
 * Date: 13.03.18
 * Time: 19:05
 */

namespace App\Providers;


use App\Event;
use App\Http\Requests\EventRequest;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;

/**
 * Class EventService
 * @package App\Providers
 */
class EventService
{

    /**
     * @param EventRequest $request
     * @param User $user
     * @return Event
     * @throws \Throwable
     */
    public function store(EventRequest $request, User $user): Event
    {
        $event = Event::instance(
            $request->post('title'),
            $request->date(),
            $request->post('repeatBy'),
            $user->id
        );
        $event->saveOrFail();
        return $event;
    }

    /**
     * @param int $id
     * @param EventRequest $request
     * @param User $user
     * @return Event
     * @throws AuthorizationException
     */
    public function update(int $id, EventRequest $request, User $user): Event
    {
        $event = Event::find($id);
        if (!$user->can('update', $event)) {
            throw new AuthorizationException();
        }
        $event->edit(
            $request->post('title'),
            $request->date(),
            $request->post('repeatBy')
        );
        $event->saveOrFail();
        return $event;
    }
}