<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //SHOW CREATE POST
    public function showAddPost()
    {
        return view('admin.blog-posts.add-post');
    }

    //SAVE CREATE POST
    public function submitAddPost()
    {
        request()->validate([
            'post_title'            => 'required',
            'post_description'      => 'required|max:300',
            'post_author'           => 'required',
            'post_date'             => 'required',
            'post_thumbnail'        => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $image = request()->file('post_thumbnail');
        $new_image = rand() . '.' . $image->extension();

        Post::create([
            'post_title'              => request('post_title'),
            'post_description'        => request('post_description'),
            'post_author'             => request('post_author'),
            'post_date'               => request('post_date'),
            'post_thumbnail'          => $new_image,
            'category_id'             => request('category_id'),
        ]);

        request('post_thumbnail')->move('uploads/posts',  $new_image);
        return redirect()->back()->with('create-message', 'Post Added');
    }

    //SHOW ALL POSTS
    public function showPost()
    {
        $posts = Post::all();
        return view('admin.blog-posts.show-posts', compact('posts'));
    }

    //SHOW UPDATE POST
    public function showEditPost($id)
    {
        $post = Post::find($id);
        return view('admin.blog-posts.edit-post', compact(['post']));
    }

    //SAVE UPDATE POST
    public function submitEditPost($id)
    {
        $post = Post::find($id);
        $old_thumbnail = request('old_thumbnail');
        $new_thumbnail = request('post_thumbnail');

        if($new_thumbnail != null)
        {
            request()->validate([
                'post_title'            => 'required',
                'post_description'      => 'required|max:300',
                'post_author'           => 'required',
                'post_date'             => 'required',
                'post_thumbnail'        => 'required|image|mimes:jpg,png,jpeg',
            ]);
            $new_post_thumbnail = rand(). '.' .  $new_thumbnail->extension();
            request('post_thumbnail')->move('uploads/posts',  $new_post_thumbnail);
            $file_path = 'uploads/posts/'. $old_thumbnail;
            unlink($file_path);
        }
        else
        {
            request()->validate([
                'post_title'            => 'required',
                'post_description'      => 'required|max:300',
                'post_author'           => 'required',
                'post_date'             => 'required',
            ]);
            $new_post_thumbnail = $old_thumbnail;
        }

        $post->update([
            'post_title'              => request('post_title'),
            'post_description'        => request('post_description'),
            'post_author'             => request('post_author'),
            'post_date'               => request('post_date'),
            'post_thumbnail'          => $new_post_thumbnail,
            'category_id'             => request('category_id'),
        ]);
        return redirect()->route('post.show')->with('update-message', 'Post Updated');
    }

     //DELETE POST
     public function deletePost($id)
     {
         $post = Post::find($id);
         $file_path = 'uploads/posts/'. $post->post_thumbnail;
         unlink($file_path);
         $post->delete();
         return redirect()->back()->with('delete-message', 'Post deleted');
     }



    // UPDATE POST STATUS
    public function updatePostStatus($id, $status)
    {
        if($id != null && $status != null)
        {
            $post = post::find($id);
            if($post != NULL)
            {
                $post->update([
                    'status' => $status,
                ]);
                return redirect()->back()->with('status-message', 'Post successfully '. $status);
            }
            else
            {
                return 'No Post Found';
            }
        }
        else
        {
            return 'Invalid Post';
        }
    }


}
