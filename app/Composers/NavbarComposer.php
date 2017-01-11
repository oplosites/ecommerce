<?php

namespace App\Composers;

use App\Modules\Products\Models\Products;

class NavbarComposer {

  public function compose($view)
  {
      $collections = Products::all();

      $view->with('collections', $collections);
  }

}
