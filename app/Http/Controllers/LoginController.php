<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Services\LoginService;

class LoginController extends Controller
{
    protected $loginService;

    // Route::post('/login', [LoginController::class, 'login']);
    // Route::post('/register', [LoginController::class, 'register']);
    // Route::post('/logout', [LoginController::class, 'logout']);
    // Route::post('/refresh', [LoginController::class, 'refresh']);
    // Route::post('/me', [LoginController::class, 'me']);


    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    /**
     * Login the user and return the token
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $token = $this->loginService->loginService($credentials);
        return new LoginResource($token);
    }





    // /**
    //  * Display a listing of the resource.
    //  */
    // public function index()
    // {
    //     $todos = $this->loginService->getAllTodos();
    //     return TodoResource::collection($todos);
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show($id)
    // {
    //     $todo = $this->loginService->getTodoById($id);
    //     return new TodoResource($todo);
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(StoreTodoRequest $request)
    // {
    //     $todo = $this->loginService->createTodo(
    //         $request->validated()
    //     );
    //     return new TodoResource($todo, 201);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(UpdateTodoRequest $request, $id)
    // {
    //     $updatedTodo = $this->loginService->updateTodo(
    //         $id,
    //         $request->validated()
    //     );
    //     return new TodoResource($updatedTodo);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy($id)
    // {
    //     $this->loginService->deleteTodo($id);
    //     return response()->json(null, 204);
    // }

    // /**
    //  * Mark the specified resource as completed.
    //  */
    // public function complete($id)
    // {
    //     $todo = $this->loginService->complete($id);
    //     return new TodoResource($todo);

    // }

    // /**
    //  * Mark the specified resource as incomplete.
    //  */
    // public function incomplete($id)
    // {
    //     $todo = $this->loginService->incomplete($id);
    //     return new TodoResource($todo);
    // }
}
