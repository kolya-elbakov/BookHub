<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function getReviewsForm(int $id)
    {
        $user = User::find($id);
        $userReviews = Review::where('recipient_id', $id)->with('author')->get();

        return view('reviews', ['userReviews'=>$userReviews], ['user'=>$user]);
    }

    public function getCreateReviewForm(int $id)
    {
        return view('create-review', ['userId' => $id]);
    }
    public function createReview(ReviewRequest $request, int $id)
    {
            $validated = $request->validated();

            $review = new Review();
            $review->author_id = auth()->user()->id;
            $review->recipient_id = $id;
            $review->grade = $validated['grade'];
            $review->comment = $validated['comment'];
            $review->date_review = $validated['date_review'];
            $review->save();

            return redirect('success')->with('success', 'Отзыв успешно создан');
    }
}
