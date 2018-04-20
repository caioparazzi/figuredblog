<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use MongoDB\Client as Mongo;
use Illuminate\Support\Facades\Auth as Logged;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = $this->connectMongo();
        $posts = [];

        if($collection){
            $posts = $this->retrieveLatestPosts($collection);
        }
        
        return view('index',["posts"=>$posts]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * Connect to Mongodb.
     *
     * @return \MongoDB\MongoCollection
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
        if($author==""){
            return $collection->find([],[ 'limit' => $amount ]);
        }
        else{
            return $collection->find(["author"=>$author],[ 'limit' => $amount ]);
        }
    }

    /**
     * Display more posts.
     * If author name included on request, gathers his posts
     *
     * @param string $author
     * @return \Illuminate\Http\Response
     */
    public function morePosts($author="")
    {
        $collection = $this->connectMongo();
        $posts = [];

        if($collection){
            if($author==""){
                $posts = $this->retrieveLatestPosts($collection,100);
            }
            else{
                $posts = $this->retrieveLatestPosts($collection,100,$author);
            }
        }
        
        return view('index',["posts"=>$posts]);
    }
}