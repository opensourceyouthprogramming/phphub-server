<?php

namespace App\Http\ApiControllers;

use App\Repositories\TopicRepositoryInterface;
use App\User;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * @var TopicRepositoryInterface
     */
    private $repository;

    /**
     * TopicController constructor.
     *
     * @param TopicRepositoryInterface $repository
     */
    public function __construct(TopicRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->addIncludable('user', ['name'], User::$includable, 'user_id');
        $this->repository->addIncludable('last_reply_user', ['name', 'avatar'], User::$includable, 'last_reply_user_id');

        return $this->repository
            ->autoWith()
            ->autoWithRootColumns([
                'id', 'title', 'is_excellent', 'reply_count', 'updated_at',
            ])
            ->paginate(15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}