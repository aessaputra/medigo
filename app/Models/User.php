<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function product_transactions()
    {
        return $this->hasMany(ProductTransaction::class);
    }

    public function getAvatarInitialsAttribute(): string
    {
        $name = trim((string) $this->name);

        if ($name === '') {
            return 'U';
        }

        return collect(preg_split('/\s+/', $name, -1, PREG_SPLIT_NO_EMPTY))
            ->map(fn ($part) => mb_substr($part, 0, 1))
            ->take(2)
            ->implode('') ?: 'U';
    }

    public function getAvatarColorAttribute(): string
    {
        $palette = [
            '#206bc4', // blue
            '#d63939', // red
            '#f59f00', // yellow
            '#12b886', // green
            '#ae3ec9', // purple
            '#0ca678', // teal
            '#4263eb', // indigo
            '#f76707', // orange
        ];

        $key = strtolower($this->email ?: $this->name ?: 'user');
        $index = crc32($key) % count($palette);

        return $palette[$index];
    }
}
