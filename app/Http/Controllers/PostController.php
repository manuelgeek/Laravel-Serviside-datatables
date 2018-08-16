<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(Post::with('user')->get())
                ->addColumn('author', function (Post $post){
                    return  ucwords($post->user->name);
                })
                ->editColumn('status', function (Post $post){
                    if ($post->status==true) {
                        return '<span class="label label-success ">Active</span>';
                    }else{
                        return '<span class="label label-danger">Inactive</span>';
                    }
                })
                ->editColumn('body', function (Post $post){
                    if (strlen(strip_tags($post->body))>50){
                        $dot = '...';
                    }else{
                        $dot = '';
                    }
                    return substr( strip_tags($post->body), 0,50).$dot;
                })
                ->addColumn('actions', function (Post $post){
                    return  '<a href="'.route("post.show",$post->id).'" class="btn btn-primary btn-xs" >Student Transactions</a>';
                })
                ->editColumn('created_at', function(Post $post) {
                    return '<td>'. Carbon::parse($post->created_at)->format('M j, Y') .'</td>
                                <td>';
                })
                ->addIndexColumn()
                ->rawColumns(['created_at','actions','status'])
                ->make(true);
        }
        return view('posts');
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
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
