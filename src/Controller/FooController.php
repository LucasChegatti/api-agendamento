<?php

namespace App\Controller;

use Rest\Controller\RestController;

/**
 * Foo Controller
 *
 */
class FooController extends RestController
{

    /**
     * bar method
     *
     * @return Response|void
     */
    public function bar($id)
    {
        $foo = $this->Foo->get($id);
        
        // $bar = [
        //     'falanu' => [
        //         'dhikanu',
        //         'tamburo'
        //     ]
        // ];

        $this->set(compact('foo'));
    }
}