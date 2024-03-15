<?php

namespace App\Routes;


/**
 * @OA\Post(
 *      path="/api/login",
 *      summary="Autentica um usuário",
 *      description="Realiza a autenticação do usuário através do email e senha e retorna um token de acesso.",
 *      operationId="loginUser",
 *      tags={"login"},
 *      @OA\RequestBody(
 *          description="Credenciais do usuário",
 *          required=true,
 *          @OA\JsonContent(
 *              required={"email","password"},
 *              @OA\Property(property="email", type="string", example="test@example.com"),
 *              @OA\Property(property="password", type="string", example="password")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Autenticação bem-sucedida",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="token", type="string", example="1|sB4sTOOYUgWNhuIJmcxO5JcF7py0stn6cLxjaJH122d84e50")
 *          )
 *      ),
 *      @OA\Response(
 *          response=400,
 *          description="Dados inválidos"
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Não autorizado - Credenciais inválidas ou expiradas"
 *      )
 *  )
 * /
 *
 */


class LoginRoute
{

}
