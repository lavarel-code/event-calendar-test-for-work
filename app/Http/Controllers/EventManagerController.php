<?php
/**
 * Created by PhpStorm.
 * User: cheremhovo
 * Date: 13.03.18
 * Time: 19:08
 */

namespace App\Http\Controllers;


use App\Event;
use App\Http\Requests\EventRequest;
use App\Providers\EventService;
use Illuminate\Http\Request;

/**
 * Class EventManagerController
 * @package App\Http\Controllers
 */
class EventManagerController extends \Illuminate\Routing\Controller
{
    /**
     * @var EventService
     */
    private $eventService;

    /**
     * EventManagerController constructor.
     * @param EventService $eventService
     */
    public function __construct(
        EventService $eventService
    )
    {
        $this->eventService = $eventService;
        $this->middleware('auth:web');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $models = Event::where(['user_id' => $request->user()->id])->get();

        return view('event/index', ['models' => $models]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('event/create');
    }

    /**
     * @param EventRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function store(EventRequest $request)
    {
        $model = $this->eventService->store($request, $request->user());
        return redirect('/events');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $model = Event::findOrFail($id);
        return view('event/show', ['model' => $model]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {

        $model = Event::findOrFail($id);
        return view('event/edit', ['model' => $model]);
    }

    /**
     * @param EventRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(EventRequest $request, int $id)
    {
        $this->eventService->update($id, $request, $request->user());
        return redirect('/events');
    }
}