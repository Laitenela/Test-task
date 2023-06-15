<?php
class Controller
{
  protected function presentation($data)
  {
    extract($data);
    include 'app/views/template.php';
  }

  protected function middleware_check_query($query, $param)
  {
    $redirect  = false;
    $redirect |= !preg_match('/' . $param . '=\d*/', $query);
    $redirect |= ((int)explode('=', $query)[1] === 0);

    $redirect && Route::redirect();
  }

  protected function middleware_check_exist($data)
  {
    !$data    && Route::redirect();
  }
}