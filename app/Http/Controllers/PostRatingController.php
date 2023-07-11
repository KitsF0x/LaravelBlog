<?php

namespace App\Http\Controllers;

use App\Models\PostRating;
use Illuminate\Http\Request;

class PostRatingController extends Controller
{
    public function store(Request $request) {
        $postRating = $this->getExistingPostRating($request->user_id, $request->post_id);
        if($postRating) {
            if($postRating->rating_value == $request->rating_value) {
                $this->destroy($request);
            }
            else {
                $this->update($request);
            }
        }
        else {
            $postRating = new PostRating();
            $postRating->fill($request->all());
            $postRating->save();
        }
        return redirect(route('posts.show', $request->post_id));
    }

    public function update(Request $request) {
        $postRating = $this->getExistingPostRating($request->user_id, $request->post_id);
        if($postRating) {
            $postRating->update($request->all());
        }
        else {
            abort(404);
        }
    }
    public function destroy(Request $request) {
        $postRating = $this->getExistingPostRating($request->user_id, $request->post_id);
        if($postRating) {
            $postRating->delete();
        }
        else {
            abort(404);
        }
    }

    private function getExistingPostRating(int $user_id, int $post_id) {
        return PostRating::where('post_id', $post_id)->where('user_id', $user_id)->first();
    }
}
