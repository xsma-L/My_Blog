<?php

namespace App\Http\Controllers;

use App\User;
use App\billet;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BilletController extends Controller
{

    public function nouveau()
    {
        return view('billets');
    }

    public function poste(Request $request)
    {
        $title = $request->input('titre');
        $tags = $request->input('tags');
        $content = $request->input('contenu');
        
        if($title == NULL && $tags == NULL && $content == NULL){

            return redirect()->route('publication_billet');
        }else{
            $id = Auth::id();

            $database = new billet;

            $database->user_id = $id;

            $database->title = $title;

            $database->content = $content;

            $database->tags = $tags;

            $database->save();

            return redirect()->route('show_billets');
        }
    }

    public function show()
    {
        $user = Auth::user();

        $id = Auth::id();

        $users = billet::paginate(3);

        return view('show', compact('users'));
    }

    public function update_form($id){

        $post = billet::find($id);

        $id = Auth::id();

        return view('show_update', ['post' => $post, 'id_user' => $id]);   
    }

    public function add_update(Request $request){

            $title = $request->input('titre');
            $tags = $request->input('tags');
            $content = $request->input('contenu');
            $id = $request->input('Id');
            
            $database = billet::find($id);

            if($request->input() != NULL){

                if($title != NULL){
                    $database->title = $title;
                }
                if($tags != NULL){
                    $database->tags = $tags;
                }
                if($content != NULL){
                    $database->content = $content;
                }

            $database->save();

            return redirect()->route('update_billets', $id);
        }
    }

    public function delete_post($id, $user_id){

        $id_connected = Auth::id();
        
        if($id_connected == $user_id){

            $post = billet::find($id);
    
            $post->delete();
            
        }else{
            echo "non";
        }

        return redirect()->route('show_billets');
    }

    public function comment_post($id){

        $billet = billet::find($id);
        
        $comments = billet::find($id)->comments;

        return view('show_comments', ["post" => $billet,"comments" => $comments]);

        
    }

    public function add_comment(Request $request){

        echo "non<br>";

        $comments = $request->input('commentaire');
        
        $id_post = $request->input('Id');
        
        $id = Auth::id();

        
        if($comments != NULL){

            echo "oui";
            
            $save_comment = new Comment;

            $save_comment->post_id = $id_post;

            $save_comment->user_id = $id;

            $save_comment->comment_content = $comments;

            $save_comment->save();
        }

        return redirect()->route('comment_billets', $id_post);
    }

    public function admin_show(){
        
        
        $last_user = User::orderBy('id', 'desc')->take(10)->paginate(3);
        
        return view('admin', compact('last_user'));
    }

    public function blocked_user(Request $request){
        
        $id = $request->input('Id'); 

        $user = User::find($id);
        
        $user->blocked = 1;

        $user->save();

        return redirect()->route('admin_user');
        }

    public function unlocked_user(Request $request){

        $id = $request->input('Id'); 

        $user = User::find($id);
        
        $user->blocked = 0;

        $user->save();

        return redirect()->route('admin_user');
    }

    public function last_billets_show(){

        $last_billet = billet::orderBy('id', 'desc')->take(10)->paginate(3);
        
        return view('admin_2', compact('last_billet'));
    }

    public function delete_billet(Request $request){
        
        $id = $request->input('Id'); 

        $billet = billet::find($id);

        $comments = billet::find($id)->comments;
        
        foreach ($comments as $value){
            $value->delete();
        }
        
        $billet->delete();

        return redirect()->route('admin_billets');
    }

    public function last_comments_show(){

        $last_comments = Comment::orderBy('id', 'desc')->take(10)->paginate(3);
        
        return view('admin_3', compact('last_comments'));
    }

    public function delete_comment(Request $request){
        
        $id = $request->input('Id'); 

        $comment = Comment::find($id);
                
        $comment->delete();

        return redirect()->route('admin_comments');
    }
}
