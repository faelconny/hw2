<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Post extends Model
    {
        protected $fillable = [
            'user_id',
            'content'
        ];

        public function user()
        {
            return $this->belongsTo("App\Models\User");
        }

        public function likes()
        {
            return $this->belongsToMany("App\Models\User", "likes");
        }
    }

?>