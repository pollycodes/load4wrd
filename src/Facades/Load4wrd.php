<?php
namespace PollyCodes\Load4wrd\Facades;

use Illuminate\Support\Facades\Facade;

class Load4wrd extends Facade
{
  protected static function getFacadeAccessor() {
    return 'pollycodes-load4wrd';
  }
}
