<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['username', 'email', 'password', 'profile_id'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public function getRouteKeyName(): string
    {
        return 'username';
    }

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

    /**
     * Relationships Methods
     */
    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }


    /**
     * Counts the number of active links for the user.
      * @return int
     */
    public function activeLinksCount(): int
    {
        return $this->links()->where('is_active', 1)->count();
    }

    public function inactiveLinksCount(): int
    {
        return $this->links()->where('is_active', 0)->count();
    }


}
