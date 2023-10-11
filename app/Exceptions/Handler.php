<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    protected $dontReport = [ValidationException::class];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
           $this->reportable(function(Throwable $e){
            //  var_dump($e);
            return false; //jika exceptio yang selanjutnya tidak ingin dieksekusi 
           });
           $this->renderable(function(ValidationException $exception, Request $request){
                return response("Bad Request", 400);
           });
    }
}
