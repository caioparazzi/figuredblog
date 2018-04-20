<?php

namespace App\Http\Controllers;
use MongoDB\Client as Mongo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth as Logged;

class MainController extends Controller
{
    /**
     * Connects to MongoDB
     * 
     * \MongoDB\MongoCollection $collection
     * @return \Illuminate\Http\Response
     */
    public function connectMongo()
    {
        $collection = (new Mongo)->main->posts;
        return $collection;
    }

    /**
     * Return latest posts from database.
     *
     * @param  int  $amount
     * @param  \MongoDB\MongoCollection $collection
     * @return array
     */
    public function retrieveLatestPosts($collection, $amount = 3, $author="")
    {
        $currentPath= Route::getFacadeRoot()->current()->uri();
        
        if(($currentPath == "" || strpos("admin", $currentPath) !== false) && Logged::check()){
            $author = Logged::user()->name;
        }
        if(strpos("admin", $currentPath) !== false || strpos("search", $currentPath) !== false){
            $amount=100;
        }

        if($author==""){
            return $collection->find([],[ 'limit' => $amount ]);
        }
        else{
            return $collection->find(["author"=>$author],[ 'limit' => $amount ]);
        }
    }
}
