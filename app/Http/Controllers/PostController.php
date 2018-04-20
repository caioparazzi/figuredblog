<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Client as Mongo;
use MongoDB\BSON\ObjectId as Mid;
use Illuminate\Support\Facades\Auth as Logged;
use App\Http\Controllers\MainController as MainController;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Logged::check()) 
        {
            return redirect('login');
        }
        return view('create');
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
        $collection = (new MainController)->connectMongo();

        $title = $request->get('title');
        $subtitle = $request->get('subtitle');
        $body = $request->get('postbody');
        $author = Logged::user()->name;
        $date = date('Y-m-d');
        $post = [
            "title"=> $title,
            "subtitle"=> $subtitle,
            "body"=> $body,
            "author" => $author,
            "date" => $date
        ];

        $collection->insertOne($post);

        return redirect('admin');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collection = (new MainController)->connectMongo();
        $post = $collection->findOne(["_id" => new Mid($id)]);
        return view('post', ["post"=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = (new MainController)->connectMongo();

        $post = $collection->findOne(["_id" => new Mid($id)]);
        return view('edit', ["post"=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $collection = (new MainController)->connectMongo();
        $title = $request->get('title');
        $subtitle = $request->get('subtitle');
        $body = $request->get('postbody');
        $author = Logged::user()->name;
        $date = date('Y-m-d');
        $post = [
            "title"=> $title,
            "subtitle"=> $subtitle,
            "body"=> $body,
            "author" => $author,
            "date" => $date
        ];
        $collection->updateOne(
            ['_id' =>  new Mid($id)],
            ['$set'=>$post]
        );
        $updatedPost = $collection->findOne(["_id" => new Mid($id)]);
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collection = (new MainController)->connectMongo();

        $collection->deleteOne( ["_id" => new Mid($id)] );

        //return view('admin');
    }

}
