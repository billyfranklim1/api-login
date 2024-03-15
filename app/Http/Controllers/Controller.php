<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Login API",
 *      description="Documentação da API de login",
 *      @OA\Contact(
 *          email="billyfranklim@gmail.com"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 *
 * @OA\Server(
 *        url="http://0.0.0.0:80",
 *        description="Ambiente de desenvolvimento do projeto localmente"
 *  ),
 *
 * @OA\PathItem(
 *       path="/app"
 *   ),
 *
 * @OA\OpenApi(
 *       x={
 *           "tagGroups"={
 *               {"name"="LOGIN", "tags"={"login"}},
 *           }
 *       },
 *   )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
