<?php

    namespace App\Models;

    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens;

    class User extends Authenticatable
    {
        protected $fillable = [
            'name',
            'surname',
            'email',
            'password',
            'username'
        ];
        
        protected $hidden = [
            'password'
        ];

        public function favourites()
        {
            return $this->belongsToMany("App\Models\Movie", "favourites");
        }

        public function posts()
        {
            return $this->hasMany("App\Models\Post");
        }

        public function likes()
        {
            return $this->belongsToMany("App\Models\Post", "likes");
        }
    }

?>