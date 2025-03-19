<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable implements CanResetPassword
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'firstname',
        'lastname',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //Relation to Recipe 
    public function Recipe():HasMany{
        return $this->hasMany(Recipe::class);
    }

    /**
     * Get all recipes created by the user
     */
    public function recipes():HasMany
    {
        return $this->hasMany(Recipe::class);
    }

    /**
     * Get all favorite recipes of the user
     */
    public function favorites():HasMany
    {
        return $this->hasMany(RecipeFavorite::class);
    }

    /**
     * Get all comments made by the user
     */
    public function comments():HasMany
    {
        return $this->hasMany(RecipeComment::class);
    }

    public function eductional():HasMany{
        return $this->hasMany(EducationalResource::class);
    }
}
