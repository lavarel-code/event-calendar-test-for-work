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
     * @param $request
     * @return Event
     */
    public function update(int $id, EventRequest $request): Event
    {
        $event = Event::find($id);
        $event->edit(
            $request->post('title'),
            $request->date(),
            $request->post('repeatBy')
        );
        $event->saveOrFail();
        return $event;
    }
}